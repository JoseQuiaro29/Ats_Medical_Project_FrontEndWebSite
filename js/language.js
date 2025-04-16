// Sistema de traducción
let translations = {};

// Función para cargar traducciones
async function loadTranslations(lang) {
    try {
        const response = await fetch(`lang/${lang}.json`);
        translations = await response.json();
        applyTranslations();
        
        // Guardar preferencia
        localStorage.setItem('preferredLanguage', lang);
    } catch (error) {
        console.error('Error loading translations:', error);
    }
}

// Aplicar traducciones a los elementos con data-i18n
function applyTranslations() {
    document.querySelectorAll('[data-i18n]').forEach(el => {
        const key = el.getAttribute('data-i18n');
        if (translations[key]) {
            el.textContent = translations[key];
            
            // Para placeholders e inputs
            if (el.placeholder) {
                el.placeholder = translations[key];
            }
        }
    });
}

// Inicializar el sistema de idiomas
function initLanguageSystem(defaultLang) {
    // Verificar localStorage para preferencia de idioma
    const savedLang = localStorage.getItem('preferredLanguage') || defaultLang;
    
    // Cargar traducciones
    loadTranslations(savedLang);
    
    // Manejar clics en los botones de idioma (para SPA)
    document.querySelectorAll('.language-btn').forEach(btn => {
        btn.addEventListener('click', function(e) {
            if (this.href) {
                const lang = this.href.split('lang=')[1];
                loadTranslations(lang);
            }
        });
    });
}

// Función para obtener una traducción específica (para usar en JS)
function t(key) {
    return translations[key] || key;
}