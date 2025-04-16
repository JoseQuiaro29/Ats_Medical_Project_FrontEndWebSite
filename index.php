<?php include 'header.php'; ?>

<!-- Estilos CSS Ultra Premium Mejorados -->
<style>
  :root {
    --primary: #2563eb;
    --primary-dark: #1e40af;
    --primary-light: #93c5fd;
    --secondary: #10b981;
    --accent: #f59e0b;
    --dark: #1f2937;
    --light: #f9fafb;
    --gray: #6b7280;
    --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    
    /* Sistema de espaciado */
    --space-xxs: 0.25rem;  /* 4px */
    --space-xs: 0.5rem;    /* 8px */
    --space-sm: 0.75rem;   /* 12px */
    --space-md: 1rem;      /* 16px */
    --space-lg: 1.5rem;    /* 24px */
    --space-xl: 2rem;      /* 32px */
    --space-xxl: 3rem;     /* 48px */
    --space-xxxl: 4rem;    /* 64px */
  }

  /* Reset y Tipografía */
  body {
    font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
    line-height: 1.6;
    color: var(--dark);
    background-color: var(--light);
    margin: 0;
    padding: 0;
  }

  /* Contenedor principal */
  .container {
    max-width: 1440px;
    margin: 0 auto;
    width: 100%;
    padding: 0 var(--space-lg);
  }

  /* Hero Section Dividida */
  .hero-split {
    display: flex;
    min-height: 70vh;
  }

  .hero-content {
    flex: 1;
    padding: var(--space-xxxl) var(--space-xxl);
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    background: white;
  }

  .hero-video {
    flex: 1;
    background: linear-gradient(45deg, var(--primary-dark), var(--primary));
    display: flex;
    align-items: center;
    justify-content: center;
    padding: var(--space-xl);
  }

  /* Estilo simplificado para el video */
  .simple-video-container {
    width: 100%;
    max-width: 800px;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
  }

  .simple-video-wrapper {
    position: relative;
    padding-bottom: 56.25%; /* 16:9 Aspect Ratio */
    height: 0;
    overflow: hidden;
  }

  .simple-video-wrapper iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border: none;
  }

  .hero-logo {
    width: 180px;
    margin-bottom: var(--space-xs);
  }

  .hero-title {
    font-size: 2rem;
    font-weight: 700;
    line-height: 1.2;
    margin-bottom: var(--space-sm);
    color: var(--dark);
  }

  .hero-subtitle {
    font-size: 1rem;
    color: var(--gray);
    margin-bottom: var(--space-lg);
    max-width: 500px;
  }

  /* Process Section - Destacada */
  .process-section {
    padding: var(--space-xxxl) var(--space-xxl);
    background: var(--light);
  }

  .section-title {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: var(--space-xxl);
    color: var(--dark);
    position: relative;
    display: inline-block;
  }

  .section-title:after {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 0;
    width: 60px;
    height: 4px;
    background: var(--accent);
    border-radius: 2px;
  }

  .process-steps {
    display: flex;
    flex-direction: column;
    gap: var(--space-xl);
    max-width: 800px;
    margin-left: auto;
  }

  .process-step {
    display: flex;
    gap: var(--space-lg);
    position: relative;
    padding-bottom: var(--space-xl);
  }

  .process-step:not(:last-child):after {
    content: '';
    position: absolute;
    left: 30px;
    top: 60px;
    height: calc(100% - 60px);
    width: 2px;
    background: var(--primary-light);
    z-index: 1;
  }

  .process-icon {
    flex-shrink: 0;
    width: 60px;
    height: 60px;
    border-radius: 50%;
    background: var(--primary);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    font-weight: 700;
    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
    z-index: 2;
  }

  .process-content {
    flex: 1;
  }

  .process-title {
    font-size: 1.5rem;
    font-weight: 600;
    color: var(--dark);
    margin-bottom: var(--space-sm);
  }

  .process-description {
    color: var(--gray);
    line-height: 1.7;
  }

  /* Specialties & CTA Section Combinada */
  .specialties-cta {
    padding: var(--space-xxxl) var(--space-xxl);
    background: white;
  }

  .specialties-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: var(--space-lg);
    margin-bottom: var(--space-xxl);
  }

  .specialty-card {
    background: white;
    border-radius: 1rem;
    overflow: hidden;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border: 1px solid #e5e7eb;
  }

  .specialty-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
  }

  .specialty-header {
    padding: var(--space-lg);
    background: var(--primary);
    color: white;
  }

  .specialty-title {
    font-size: 1.5rem;
    font-weight: 600;
    margin-bottom: var(--space-xs);
  }

  .specialty-duration {
    display: flex;
    align-items: center;
    gap: var(--space-xs);
    font-size: 0.875rem;
    opacity: 0.9;
  }

  .specialty-body {
    padding: var(--space-lg);
  }

  .specialty-description {
    color: var(--gray);
    margin-bottom: var(--space-lg);
    line-height: 1.7;
  }

  .specialty-button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    background: var(--primary);
    color: white;
    padding: var(--space-sm) var(--space-lg);
    border-radius: 0.5rem;
    font-weight: 500;
    transition: var(--transition);
    text-decoration: none;
  }

  .specialty-button:hover {
    background: var(--primary-dark);
    transform: translateY(-2px);
  }

  /* Responsive Design */
  @media (max-width: 1024px) {
    .hero-split {
      flex-direction: column;
    }
    
    .hero-content, .process-section, .specialties-cta {
      padding: var(--space-xxl) var(--space-lg);
    }
    
    .hero-title {
      font-size: 2.5rem;
    }
    
    .simple-video-container {
      width: 90%;
      margin: var(--space-xl) auto;
    }
    
    .process-steps {
      margin-left: 0;
    }
  }

  @media (max-width: 768px) {
    .hero-content {
      padding: var(--space-xl) var(--space-md);
    }
    
    .hero-title {
      font-size: 2.25rem;
    }
    
    .section-title {
      font-size: 2rem;
    }
  }

  @media (max-width: 640px) {
    .hero-title {
      font-size: 2rem;
    }
    
    .section-title {
      font-size: 1.75rem;
    }
    
    .process-step {
      flex-direction: column;
      gap: var(--space-md);
    }
    
    .process-icon {
      width: 50px;
      height: 50px;
      font-size: 1.25rem;
    }
    
    .process-step:not(:last-child):after {
      left: 25px;
      top: 50px;
      height: calc(100% - 50px);
    }
    
    .specialties-grid {
      grid-template-columns: 1fr;
    }
  }
</style>

<!-- Hero Section Dividida -->
<section class="hero-split" aria-labelledby="main-heading">
  <div class="hero-content">
    <div class="container">
      <div style="display: flex; align-items: center; margin-bottom: var(--space-md);">
        <img src="images/logoG.png" alt="TeleConsultas" class="hero-logo">
        <div style="margin-left: var(--space-md);">
          <h1 id="main-heading" class="hero-title" data-i18n="welcome">Consulta médica especializada en línea</h1>
          <p class="hero-subtitle" data-i18n="welcome_subtitle">Conecte con médicos certificados de forma rápida, segura y desde la comodidad de su hogar.</p>
        </div>
      </div>
      
      <!-- Process Section Insertada Aquí -->
      <section class="process-section" aria-labelledby="process-heading">
        <div class="container">
          <h2 id="process-heading" class="section-title" data-i18n="how_it_works">Cómo funciona</h2>
          
          <div class="process-steps">
            <!-- Paso 1 -->
            <div class="process-step">
              <div class="process-icon">1</div>
              <div class="process-content">
                <h3 class="process-title" data-i18n="step1">Elija su especialidad</h3>
                <p class="process-description" data-i18n="step1_desc">Seleccione entre nuestras especialidades médicas disponibles para atender su necesidad específica de salud.</p>
              </div>
            </div>
            
            <!-- Paso 2 -->
            <div class="process-step">
              <div class="process-icon">2</div>
              <div class="process-content">
                <h3 class="process-title" data-i18n="step2">Revise el acuerdo</h3>
                <p class="process-description" data-i18n="step2_desc">Acepte los términos de la consulta que incluyen la duración específica y condiciones del servicio.</p>
              </div>
            </div>
            
            <!-- Paso 3 -->
            <div class="process-step">
              <div class="process-icon">3</div>
              <div class="process-content">
                <h3 class="process-title" data-i18n="step3">Complete su reserva</h3>
                <p class="process-description" data-i18n="step3_desc">Seleccione su horario preferido, realice el pago seguro y complete su información médica previa.</p>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
  
  <div class="hero-video">
    <div class="simple-video-container">
      <div class="simple-video-wrapper">
        <iframe 
          src="https://www.youtube.com/embed/VIDEO_ID" 
          frameborder="0" 
          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
          allowfullscreen
          title="Video de Misión del Doctor"
          aria-label="Video explicativo del servicio">
        </iframe>
      </div>
    </div>
  </div>
</section>

<!-- Specialties Section -->
<section class="specialties-cta" aria-labelledby="specialties-heading">
  <div class="container">
    <h2 id="specialties-heading" class="section-title" data-i18n="specialties">Nuestras especialidades</h2>
    
    <div class="specialties-grid">
      <!-- Medicina Interna -->
      <div class="specialty-card">
        <div class="specialty-header">
          <h3 class="specialty-title" data-i18n="internal_med">Medicina Interna</h3>
          <div class="specialty-duration">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline>
            </svg>
            <span data-i18n="consultation_time">Consulta de 10 minutos</span>
          </div>
        </div>
        <div class="specialty-body">
          <p class="specialty-description" data-i18n="internal_med_desc">Diagnóstico y tratamiento integral para adultos. Nuestros internistas brindan atención personalizada para sus necesidades de salud general.</p>
          <a href="register.php" class="specialty-button" aria-label="Reservar consulta de Medicina Interna">
            <span data-i18n="book_now">Reservar ahora</span>
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-left: 0.5rem;">
              <path d="M5 12h14M12 5l7 7-7 7"></path>
            </svg>
          </a>
        </div>
      </div>
      
      <!-- Nefrología -->
      <div class="specialty-card">
        <div class="specialty-header" style="background: var(--secondary);">
          <h3 class="specialty-title" data-i18n="nephrology">Nefrología</h3>
          <div class="specialty-duration">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline>
            </svg>
            <span data-i18n="consultation_time">Consulta de 10 minutos</span>
          </div>
        </div>
        <div class="specialty-body">
          <p class="specialty-description" data-i18n="nephrology_desc">Atención especializada en enfermedades renales. Evaluación y manejo personalizado por nefrólogos certificados.</p>
          <a href="register.php" class="specialty-button" style="background: var(--secondary);" aria-label="Reservar consulta de Nefrología">
            <span data-i18n="book_now">Reservar ahora</span>
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-left: 0.5rem;">
              <path d="M5 12h14M12 5l7 7-7 7"></path>
            </svg>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include 'footer.php'; ?>