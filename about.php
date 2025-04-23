<?php 
// Configuración del título de la página
$page_title = "About Us | TeleConsultations";
include 'header.php'; 
?>

<style>
  /* Estilos optimizados para móvil */
  .about-page {
    font-family: 'Arial', sans-serif;
    color: #333;
    line-height: 1.6;
    max-width: 1100px;
    margin: 0 auto;
    padding: 20px 15px;
    background: white;
  }
  
  .page-header {
    text-align: center;
    margin-bottom: 30px;
  }
  
  .page-title {
    color: #2c5282;
    font-size: 1.8rem;
    margin-bottom: 12px;
    font-weight: 600;
    line-height: 1.3;
  }
  
  .page-subtitle {
    color: #4a5568;
    font-size: 1.1rem;
    max-width: 100%;
    margin: 0 auto;
    padding: 0 10px;
  }
  
  .content-grid {
    display: flex;
    flex-direction: column;
    gap: 25px;
    margin-bottom: 40px;
  }
  
  .text-block {
    padding: 15px;
    order: 1;
  }
  
  .section-title {
    color: #2c5282;
    font-size: 1.4rem;
    margin-top: 0;
    margin-bottom: 15px;
    font-weight: 600;
  }
  
  .section-text {
    font-size: 1rem;
    margin-bottom: 15px;
    color: #4a5568;
    text-align: left;
    line-height: 1.7;
  }
  
  .video-block {
    background: #f7fafc;
    border-radius: 8px;
    padding: 15px;
    order: 2;
  }
  
  .video-container {
    width: 100%;
    position: relative;
    padding-bottom: 56.25%;
    border-radius: 6px;
    overflow: hidden;
  }
  
  .video-container iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border: none;
  }
  
  .doctor-section {
    background: #f7fafc;
    border-radius: 8px;
    padding: 25px 15px;
    margin-top: 30px;
    text-align: center;
  }
  
  .doctor-card {
    background: white;
    border-radius: 8px;
    padding: 20px;
    max-width: 100%;
    margin: 0 auto;
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
  }
  
  .doctor-image {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    object-fit: cover;
    border: 3px solid #ebf8ff;
    margin-bottom: 15px;
  }
  
  .doctor-name {
    color: #2c5282;
    font-size: 1.3rem;
    margin: 0 0 5px 0;
    font-weight: 600;
  }
  
  .doctor-specialty {
    color: #3182ce;
    font-weight: 500;
    margin-bottom: 15px;
    font-size: 1rem;
  }
  
  .doctor-bio {
    color: #4a5568;
    line-height: 1.7;
    text-align: left;
    font-size: 1.2rem;
  }
  
  /* Estilos para pantallas más grandes */
  @media (min-width: 768px) {
    .about-page {
      padding: 30px 20px;
    }
    
    .content-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      flex-direction: row;
    }
    
    .text-block {
      order: initial;
      padding: 20px;
    }
    
    .video-block {
      order: initial;
    }
    
    .page-title {
      font-size: 2.2rem;
    }
    
    .page-subtitle {
      font-size: 1.4rem;
    }
    
    .section-title {
      font-size: 1.6rem;
    }
    
    .section-text {
      font-size: 1.4rem;
      text-align: justify;
    }
    
    .doctor-section {
      padding: 40px;
    }
    
    .doctor-card {
      padding: 30px;
      max-width: 600px;
    }
    
    .doctor-image {
      width: 150px;
      height: 150px;
    }
    
    .doctor-name {
      font-size: 1.5rem;
    }
  }
</style>

<div class="about-page">
  <!-- Encabezado -->
  <div class="page-header">
    <h1 class="page-title" data-i18n="about.main_title">About TeleConsultations</h1>
    <p class="page-subtitle" data-i18n="about.main_subtitle">Providing accessible healthcare through innovative telemedicine solutions</p>
  </div>
  
  <!-- Contenido principal -->
  <div class="content-grid">
    <div class="text-block">
      <h2 class="section-title" data-i18n="about.mission_title">Our Mission</h2>
      <p class="section-text" data-i18n="about.mission_text1">We are a dedicated team of healthcare professionals committed to providing high-quality medical care through our innovative telemedicine platform.</p>
      <p class="section-text" data-i18n="about.mission_text2">Our mission is to make healthcare accessible to everyone, regardless of location. With TeleConsultations, you can receive expert medical advice from the comfort of your home.</p>
      <p class="section-text" data-i18n="about.mission_text3">We combine technology with compassionate care to deliver a seamless healthcare experience that puts patients first.</p>
    </div>
    
    <div class="video-block">
      <div class="video-container">
        <iframe 
          src="https://www.youtube.com/embed/VIDEO_ID" 
          allowfullscreen
          title="About our Telemedicine Services"
          aria-label="Video about our services">
        </iframe>
      </div>
    </div>
  </div>
  
  <!-- Sección del doctor -->
  <section class="doctor-section">
    <div class="doctor-card">
      <img src="images/about/doctor.webp" alt="Dr. Manuel Garcia Estrada" class="doctor-image">
      <h3 class="doctor-name" data-i18n="about.doctor_name">Dr. Manuel Garcia Estrada</h3>
      <p class="doctor-specialty" data-i18n="about.doctor_specialty">Internal Medicine & Nephrology Specialist</p>
      
      <div class="doctor-bio">
        <p data-i18n="about.doctor_bio1">Dr. Garcia Estrada is a board-certified physician with over 15 years of experience in internal medicine and nephrology. He completed his medical training at top institutions and is dedicated to providing personalized care to each patient.</p>
        <p data-i18n="about.doctor_bio2">Specializing in chronic disease management and preventive care, Dr. Garcia Estrada brings expertise and compassion to every virtual consultation.</p>
      </div>
    </div>
  </section>
</div>

<?php include 'footer.php'; ?>