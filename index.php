<?php include 'header.php'; ?>

<!-- Estilos CSS -->
<style>
  /* Introductory Section */
  .intro-section {
    padding: 40px 0;
    background-color: #ffffff;
    transition: transform 0.3s ease;
  }
  .intro-section:hover {
    transform: scale(1.02);
    background-color: rgba(51, 88, 170, 0.8); /* Resalta con el color al pasar el cursor */
    color: white;
  }
  .intro-container {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-wrap: wrap;
  }
  .intro-logo {
    flex: 0 0 auto;
    text-align: center;
    margin: 10px;
    transition: transform 0.3s ease;
  }
  .intro-logo:hover {
    transform: scale(1.05);
    
  }
  .intro-logo img {
    max-width: 200px;
    width: 100%;
    height: auto;
  }
  .intro-text {
    flex: 1 1 400px;
    margin: 10px;
    text-align: left;
    transition: transform 0.3s ease;
  }
  .intro-text:hover {
    transform: scale(1.02);
    
  }
  .intro-text h1 {
    color: #2c3e50;
    font-size: 3rem;
    margin-bottom: 20px;
  }
  .intro-text p {
    color: #2c3e50;
    font-size: 2rem;
    line-height: 2rem;
    text-align: justify;
    ont-weight: bold;
    
  }

  /* Carousel Section */
  #homeCarousel {
    position: relative;
    max-height: 500px;
    overflow: hidden;
    transition: transform 0.3s ease;
  }
  #homeCarousel:hover {
    transform: scale(1.02);
  }
  .carousel-inner .item img {
    margin: 0 auto;
    max-height: 500px;
  }
  .carousel-control span {
    margin-top: 200px;
  }

  /* Specialties Section */
  .specialties {
    padding: 40px 0;
    background-color: #f5f5f5;
    transition: background-color 0.3s ease;
  }
  .specialties:hover {
    background-color: rgba(51, 88, 170, 0.8); /* Resalta con el color al pasar el cursor */
    color: white;
  }
  .specialty-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    margin-bottom: 20px;
    text-align: center;
  }
  .specialty-card:hover {
    transform: scale(1.05);
    background-color: rgba(51, 88, 170, 0.8);
    box-shadow: 0 6px 16px rgba(0, 0, 0, 0.16);
    
  }
  .specialty-card img {
    width: 60px;
    height: 60px;
    margin-bottom: 10px;
    transition: transform 0.3s ease;
  }
  .specialty-card img:hover {
    transform: scale(1.1);
    
  }

  /* Well-Being Section */
  .wellbeing-section {
    padding: 40px 0;
   /* background-color: #f5f5f5;*/
   background-color: rgba(255, 255, 255, 0.43);
    transition: transform 0.3s ease;
    text-align: center;
  }
  .wellbeing-section:hover {
    transform: scale(1.02);
    background-color: rgba(51, 88, 170, 0.8); /* Resalta con el color al pasar el cursor */
    color: white;
  }
  .wellbeing-row {
    margin-top: 30px;
    display: flex;
    justify-content: center;
  }
  .wellbeing-card {
    transition: transform 0.3s ease;
    margin-bottom: 20px;
    text-align: center;
  }
  .wellbeing-card:hover {
    transform: scale(1.05);
  }
  .wellbeing-card img {
    width: 60px;
    height: 60px;
    margin-bottom: 10px;
  }

  /* Schedule Your Online Consultation Section */
  .consultation-section {
    padding: 40px 0;
   /* background-color: #f5f5f5;*/
   background-color: rgba(255, 255, 255, 0);
    margin-top: 40px;
    transition: transform 0.3s ease;
    text-align: center;
    margin: 0 auto;  
    max-width: 800px;
  }
  .consultation-section:hover {
    transform: scale(1.02);
    background-color: rgba(51, 88, 170, 0.8); /* Resalta con el color al pasar el cursor */
    color: white;
  }

  /* Subscription Section */
  .subscription-section {
    padding: 40px 0;
   /* background-color: #eeeeee;*/
   background-color: rgba(255, 255, 255, 0.43);
    transition: transform 0.3s ease;
  }
  .subscription-section:hover {
    transform: scale(1.02);
    background-color: rgba(51, 88, 170, 0.8); /* Resalta con el color al pasar el cursor */
    color: white;
  }

  /* Ejemplo de hover con sombra (si no está definido en otro lado) */
  .hover\:shadow-ocean-green-300:hover {
    box-shadow: 0 4px 8px rgba(0, 128, 128, 0.3);
  }
</style>

<!-- HTML -->
<!-- Introductory Section -->
<section class="intro-section" style="background-color: rgba(255, 255, 255, 0.27);">
  <div class="container intro-container">
    <!-- Logo Column -->
    <div class="intro-logo">
      <img src="images/logoG.png" alt="Company Logo">
    </div>
    <!-- Introductory Text Column -->
    <div class="intro-text">
      <h1>Welcome to TeleConsultations</h1>
      <p>
        Experience top-quality teleconsultations with leading doctors from the comfort of your home. Our innovative platform connects you with expert medical professionals quickly and securely, ensuring personalized care at your fingertips.
      </p>
    </div>
  </div>
</section>

<!-- Carousel Section -->
<div id="homeCarousel" class="carousel slide hover:shadow-ocean-green-300" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#homeCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#homeCarousel" data-slide-to="1"></li>
    <li data-target="#homeCarousel" data-slide-to="2"></li>
    <li data-target="#homeCarousel" data-slide-to="3"></li>
  </ol>

  <!-- Slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="images/carousel/carousel1.webp" alt="Slide 1" class="img-responsive">
    </div>
    <div class="item">
      <img src="images/carousel/carousel2.webp" alt="Slide 2" class="img-responsive">
    </div>
    <div class="item">
      <img src="images/carousel/carousel3.webp" alt="Slide 3" class="img-responsive">
    </div>
    <div class="item">
      <img src="images/carousel/carousel4.webp" alt="Slide 4" class="img-responsive">
    </div>
  </div>

  <!-- Carousel Controls -->
  <a class="left carousel-control" href="#homeCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
  </a>
  <a class="right carousel-control" href="#homeCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
  </a>
  
  <?php
    // Previously used overlay removed for a cleaner design
  ?>
</div>

<!-- Specialties Section -->
<section class="specialties hover:shadow-ocean-green-300" style="background-color: rgba(245, 245, 245, 0.61);">
  <div class="container">
    <div class="row">
      <!-- Specialty Card 1: Internal Medicine -->
      <div class="col-md-6 specialty-card">
        <img src="images/specialty/Internal-Medicine.webp" alt="Internal Medicine">
        <h4>Internal Medicine</h4>
        <p>Our experienced physicians provide comprehensive consultations in internal medicine, ensuring precise diagnosis and effective treatment for adult health concerns.</p>
        <a href="#" class="btn btn-primary btn-sm">Read more</a>
      </div>
      <!-- Specialty Card 2: Nephrology -->
      <div class="col-md-6 specialty-card">
        <img src="images/specialty/nephrology.webp" alt="Nephrology">
        <h4>Nephrology</h4>
        <p>Receive expert consultations in nephrology focused on diagnosing and managing kidney conditions to help you maintain optimal renal health.</p>
        <a href="#" class="btn btn-primary btn-sm">Read more</a>
      </div>
    </div>
  </div>
</section>

<!-- Taking Care of Your Well-Being Section -->
<section class="wellbeing-section hover:shadow-ocean-green-300">
  <div class="container">
    <h2>Taking Care of Your Well-Being</h2>
    <div class="row wellbeing-row">
      <!-- Well-Being Card 1: Tailored Health Plans -->
      <div class="col-md-6 wellbeing-card">
        <img src="images/icon-1.png" alt="Tailored Health Plans">
        <h4>Tailored Health Plans</h4>
        <p>We adapt to your unique needs by partnering with a diverse range of insurance providers, ensuring you get the coverage that fits you best.</p>
        <a href="#" class="btn btn-default">Read more</a>
      </div>
      <!-- Well-Being Card 2: Expert Medical Care -->
      <div class="col-md-6 wellbeing-card">
        <img src="images/icon-2.png" alt="Expert Medical Care">
        <h4>Expert Medical Care</h4>
        <p>Our board-certified specialists provide comprehensive, personalized treatment plans to ensure exceptional care and positive health outcomes for you.</p>
        <a href="#" class="btn btn-default">Read more</a>
      </div>
    </div>
  </div>
</section>

<!-- Schedule Your Online Consultation Section -->
<section class="consultation-section text-center hover:shadow-ocean-green-300">
  <h2>Schedule Your Online Consultation</h2>
  <p>Connect with top medical professionals from the comfort of your home.</p>
  <a href="bookconsultation.php" class="btn btn-success btn-lg">Book a Consultation</a>
</section>

<!-- Subscription Section -->
<section class="subscription-section hover:shadow-ocean-green-300">
  <div class="container text-center">
    <h2>Get Our Latest News</h2>
    <p>Subscribe to receive updates on our services, events, and wellness tips to help you live a healthier life.</p>
    <form class="form-inline">
      <div class="form-group">
        <label class="sr-only" for="emailAddress">Email address</label>
        <input type="email" class="form-control" id="emailAddress" placeholder="Enter your email address">
      </div>
      <button type="submit" class="btn btn-primary">Subscribe</button>
    </form>
  </div>
</section>

<?php include 'footer.php'; ?>
