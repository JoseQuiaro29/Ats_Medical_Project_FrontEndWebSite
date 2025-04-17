// Sistema de traducción
let translations = {};

// Función para cargar traducciones
async function loadTranslations(lang) {
    try {
        const response = await fetch(`lang/${lang}.json`);
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        translations = await response.json();
        applyTranslations();
        
        // Actualizar el botón activo
        document.querySelectorAll('.language-btn').forEach(btn => {
            btn.classList.remove('active');
            if (btn.textContent.trim() === lang.toUpperCase() || 
                (btn.getAttribute('href') && btn.getAttribute('href').includes(`lang=${lang}`))) {
                btn.classList.add('active');
            }
        });
        
        // Guardar preferencia
        localStorage.setItem('preferredLanguage', lang);
        
        // Actualizar el atributo lang del html
        document.documentElement.lang = lang;
        
        console.log(`Traducciones cargadas para idioma: ${lang}`);
    } catch (error) {
        console.error('Error loading translations:', error);
        // Cargar idioma por defecto (es) si hay error
        if (lang !== 'es') {
            console.log('Intentando cargar idioma por defecto (es)');
            loadTranslations('es');
        }
    }
}

// Aplicar traducciones a los elementos con data-i18n
function applyTranslations() {
    document.querySelectorAll('[data-i18n]').forEach(el => {
        const key = el.getAttribute('data-i18n');
        
        // Manejar atributos especiales como [placeholder]
        if (key.startsWith('[') && key.includes(']')) {
            const attrMatch = key.match(/^\[([^\]]+)\]/);
            if (attrMatch) {
                const attr = attrMatch[1];
                const translationKey = key.replace(/^\[[^\]]+\]/, '');
                const translation = getTranslation(translationKey);
                if (translation) {
                    el.setAttribute(attr, translation);
                }
                return;
            }
        }
        
        // Traducción normal
        const translation = getTranslation(key);
        if (translation) {
            if (el.tagName.toLowerCase() === 'input' && el.type !== 'submit' && el.type !== 'button') {
                el.value = translation;
            } else {
                el.textContent = translation;
            }
        }
    });
    
    console.log('Traducciones aplicadas');
}

// Obtener traducción anidada
function getTranslation(key) {
    if (!key) return null;
    
    const keys = key.split('.');
    let result = translations;
    
    for (const k of keys) {
        if (!result) break;
        result = result[k];
    }
    
    return typeof result === 'string' ? result : null;
}

// Inicializar el sistema de idiomas
function initLanguageSystem(defaultLang) {
    // Verificar localStorage para preferencia de idioma
    const savedLang = localStorage.getItem('preferredLanguage') || defaultLang;
    
    // Cargar traducciones
    loadTranslations(savedLang);
    
    // Manejar clics en los botones de idioma
    document.querySelectorAll('.language-btn').forEach(btn => {
        btn.addEventListener('click', function(e) {
            if (this.href) {
                const lang = this.getAttribute('href').split('lang=')[1];
                if (lang && lang !== currentLang) {
                    loadTranslations(lang);
                }
                // No prevenir el comportamiento por defecto para permitir recarga
            }
        });
    });
    
    console.log('Sistema de idiomas inicializado');
}

// Función para obtener una traducción específica (para usar en JS)
function t(key) {
    return getTranslation(key) || key;
}