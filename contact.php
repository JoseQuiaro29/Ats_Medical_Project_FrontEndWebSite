<?php 
$page_title = "Contact Us | TeleConsultations";
include 'header.php'; 
?>

<style>
  /* ===== Estilos Generales ===== */
  .contact-page {
    font-family: 'Segoe UI', Arial, sans-serif;
    color: #2d3748;
    line-height: 1.6;
    background: #f8fafc;
  }

  /* ===== Sección de Encabezado ===== */
  .contact-header {
    background: linear-gradient(135deg,rgb(64, 96, 184) 0%, #2563eb 100%);
    padding: 3rem 0;
    text-align: center;
    margin-bottom: 3rem;
  }

  .contact-header h1 {
    color: white;
    font-size: 2.5rem;
    font-weight: 600;
    margin: 0;
    padding: 0 1rem;
  }

  /* ===== Contenedor Principal ===== */
  .contact-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 1.5rem 3rem;
  }

  /* ===== Sección de Contacto ===== */
  .contact-section {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2.5rem;
    background: white;
    border-radius: 12px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
    overflow: hidden;
  }

  /* Columna del Mapa */
  .map-column {
    min-height: 500px;
    position: relative;
  }

  .map-container {
    height: 100%;
    width: 100%;
    border: none;
  }

  /* Columna del Formulario */
  .form-column {
    padding: 2.5rem;
    background: #f9fafb;
  }

  .contact-info {
    margin-bottom: 2rem;
  }

  .contact-info h2 {
    color: #1e3a8a;
    font-size: 1.8rem;
    margin-top: 0;
    margin-bottom: 1rem;
  }

  .contact-info p {
    color: #4a5568;
    margin-bottom: 1.5rem;
    font-size: 1.05rem;
  }

  .address {
    font-weight: 600;
    color: #2d3748;
    font-size: 1.1rem;
    margin-bottom: 1.5rem;
    display: inline-block;
    padding: 0.8rem 1rem;
    background: #ebf8ff;
    border-radius: 6px;
  }

  /* Estilos del Formulario */
  .contact-form .form-group {
    margin-bottom: 1.5rem;
  }

  .contact-form label {
    display: block;
    margin-bottom: 0.5rem;
    font-weight: 500;
    color: #2d3748;
  }

  .contact-form input,
  .contact-form textarea {
    width: 100%;
    padding: 0.75rem 1rem;
    border: 1px solid #e2e8f0;
    border-radius: 6px;
    font-size: 1rem;
    transition: border-color 0.2s;
  }

  .contact-form input:focus,
  .contact-form textarea:focus {
    outline: none;
    border-color: #4299e1;
    box-shadow: 0 0 0 3px rgba(66, 153, 225, 0.2);
  }

  .contact-form textarea {
    min-height: 120px;
    resize: vertical;
  }

  .submit-btn {
    background: #2563eb;
    color: white;
    border: none;
    padding: 0.875rem 1.75rem;
    font-size: 1rem;
    font-weight: 500;
    border-radius: 6px;
    cursor: pointer;
    transition: background 0.2s;
    width: 100%;
  }

  .submit-btn:hover {
    background: #1e40af;
  }

  /* ===== Responsive Design ===== */
  @media (max-width: 768px) {
    .contact-header h1 {
      font-size: 2rem;
    }

    .contact-section {
      grid-template-columns: 1fr;
    }

    .map-column {
      min-height: 350px;
      order: 1;
    }

    .form-column {
      order: 2;
      padding: 1.5rem;
    }
  }

  @media (max-width: 480px) {
    .contact-header {
      padding: 2rem 0;
    }

    .contact-header h1 {
      font-size: 1.75rem;
    }

    .contact-info h2 {
      font-size: 1.5rem;
    }
  }
</style>

<!-- ===== Página de Contacto ===== -->
<div class="contact-page">
  <!-- Encabezado -->
  <section class="contact-header">
    <h1 data-i18n="contact.page_title">Contact Us</h1>
  </section>

  <!-- Contenido Principal -->
  <div class="contact-container">
    <section class="contact-section">
      <!-- Columna del Mapa -->
      <div class="map-column">
        <iframe 
          class="map-container"
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.086857726702!2d-80.20729168468157!3d25.76601598362864!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88d9b69b7e4b7b7b%3A0x4b8b8b8b8b8b8b8b!2s550%20SW%2027th%20Ave%2C%20Miami%2C%20FL%2033135%2C%20USA!5e0!3m2!1sen!2s!4v1633021234567!5m2!1sen!2s" 
          allowfullscreen="" 
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"
          title="Our Location on Google Maps">
        </iframe>
      </div>

      <!-- Columna del Formulario -->
      <div class="form-column">
        <div class="contact-info">
          <h2 data-i18n="contact.find_us">Find Us</h2>
          <p data-i18n="contact.intro_text">We'd love to hear from you! Whether you have a question about our services or want to schedule a teleconsultation, our team is ready to help.</p>
          <div class="address">
            <i class="fas fa-map-marker-alt"></i> <span data-i18n="contact.address">550 Southwest 27th Avenue, Miami, FL 33135</span>
          </div>
        </div>

        <form class="contact-form" action="send_contact.php" method="post">
          <div class="form-group">
            <label for="firstName" data-i18n="contact.first_name">First Name *</label>
            <input 
  type="text" 
  id="firstName" 
  name="firstName" 
  data-i18n-placeholder="contact.first_name_placeholder" 
  required
>
          </div>

          <div class="form-group">
            <label for="lastName" data-i18n="contact.last_name">Last Name</label>
            <input 
  type="text" 
  id="firstName" 
  name="firstName" 
  data-i18n-placeholder="contact.first_name_placeholder" 
  required
>
          </div>

          <div class="form-group">
            <label for="email" data-i18n="contact.email">Email Address *</label>
            <input 
  type="text" 
  id="firstName" 
  name="firstName" 
  data-i18n-placeholder="contact.first_name_placeholder" 
  required
>
          </div>

          <div class="form-group">
            <label for="mobile" data-i18n="contact.phone">Mobile Number</label>
            <input 
  type="text" 
  id="firstName" 
  name="firstName" 
  data-i18n-placeholder="contact.first_name_placeholder" 
  required
>
          </div>

          <div class="form-group">
            <label for="message" data-i18n="contact.message">Message *</label>
            <textarea 
              id="message" 
              name="message" 
              placeholder="" 
              required
              data-i18n-placeholder="contact.message_placeholder"
            ></textarea>
          </div>

          <button type="submit" class="submit-btn" data-i18n="contact.submit_button">Schedule Teleconsultation</button>
        </form>
      </div>
    </section>
  </div>
</div>

<?php include 'footer.php'; ?>