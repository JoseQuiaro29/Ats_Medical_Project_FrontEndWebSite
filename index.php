<?php include 'header.php'; ?>

<!-- Introductory Section -->
<section class="intro-section" style="
  padding: 40px 0;                      /* Vertical padding for spacing */
  background-color: #ffffff;            /* White background for clarity */
  transition: transform 0.3s ease;      /* Smooth hover transition */
" onmouseover="this.style.transform='scale(1.02)'" onmouseout="this.style.transform='scale(1)'">
  <div class="container" style="
    display: flex;                      /* Use flexbox for layout */
    align-items: center;                /* Vertically center items */
    justify-content: center;            /* Center items horizontally */
    flex-wrap: wrap;                    /* Wrap content on smaller screens */
  ">
    <!-- Logo Column -->
    <div class="intro-logo" style="
      flex: 0 0 auto;                    /* Maintain natural width */
      text-align: center;                /* Center the logo */
      margin: 10px;                      /* Spacing around logo */
      transition: transform 0.3s ease;   /* Smooth hover transition */
    " onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
      <img src="images/logoG.png" alt="Company Logo" style="
        max-width: 200px;                /* Maximum width for the logo */
        width: 100%;                     /* Responsive width */
        height: auto;                    /* Maintain aspect ratio */
      ">
    </div>
    <!-- Introductory Text Column -->
    <div class="intro-text" style="
      flex: 1 1 400px;                   /* Allow growth with a minimum width */
      margin: 10px;                      /* Spacing around text */
      text-align: left;                  /* Align text to the left */
      transition: transform 0.3s ease;   /* Smooth hover transition */
    " onmouseover="this.style.transform='scale(1.02)'" onmouseout="this.style.transform='scale(1)'">
      <h1 style="
        color: #2c3e50;                  /* Dark blue for the heading */
        font-size: 2.5rem;               /* Large heading for impact */
        margin-bottom: 20px;             /* Space below the heading */
      ">Welcome to TeleConsultations</h1>
      <p style="
        color: #666;                     /* Gray text for readability */
        font-size: 1.2rem;               /* Comfortable font size */
        line-height: 1.6;                /* Adequate line spacing */
      ">
        Experience top-quality teleconsultations with leading doctors from the comfort of your home. Our innovative platform connects you with expert medical professionals quickly and securely, ensuring personalized care at your fingertips.
      </p>
    </div>
  </div>
</section>

<!-- Carousel Section -->
<div id="homeCarousel" class="carousel slide hover:shadow-ocean-green-300" data-ride="carousel" style="
  position: relative; 
  max-height: 500px; 
  overflow: hidden;
  transition: transform 0.3s ease;
" onmouseover="this.style.transform='scale(1.02)'" onmouseout="this.style.transform='scale(1)'">
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
      <img src="images/carousel/carousel1.webp" alt="Slide 1" class="img-responsive" style="margin: 0 auto; max-height: 500px;">
    </div>
    <div class="item">
      <img src="images/carousel/carousel2.webp" alt="Slide 2" class="img-responsive" style="margin: 0 auto; max-height: 500px;">
    </div>
    <div class="item">
      <img src="images/carousel/carousel3.webp" alt="Slide 3" class="img-responsive" style="margin: 0 auto; max-height: 500px;">
    </div>
    <div class="item">
      <img src="images/carousel/carousel4.webp" alt="Slide 4" class="img-responsive" style="margin: 0 auto; max-height: 500px;">
    </div>
  </div>

  <!-- Carousel Controls -->
  <a class="left carousel-control" href="#homeCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true" style="margin-top:200px;"></span>
  </a>
  <a class="right carousel-control" href="#homeCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true" style="margin-top:200px;"></span>
  </a>
  
  <?php
  // Previously used overlay removed for a cleaner design
  ?>
</div>

<!-- Specialties Section -->
<style>
  .specialty-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease; /* Smooth scale and shadow transition */
  }
  .specialty-card:hover {
    transform: scale(1.05);          /* Slight zoom on hover */
    box-shadow: 0 6px 16px rgba(0,0,0,0.15); /* Enhanced shadow on hover */
  }
</style>
<section class="specialties hover:shadow-ocean-green-300" style="padding: 40px 0; background-color: #f5f5f5; transition: background-color 0.3s ease;" onmouseover="this.style.backgroundColor='#eaeaea'" onmouseout="this.style.backgroundColor='#f5f5f5'">
  <div class="container">
    <div class="row">
      <!-- Specialty Card 1: Internal Medicine -->
      <div class="col-md-6 text-center specialty-card" style="margin-bottom: 20px;">
        <img src="images/specialty/Internal-Medicine.webp" alt="Internal Medicine" style="width:60px; height:60px; margin-bottom:10px; transition: transform 0.3s ease;" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">
        <h4>Internal Medicine</h4>
        <p>Our experienced physicians provide comprehensive consultations in internal medicine, ensuring precise diagnosis and effective treatment for adult health concerns.</p>
        <a href="#" class="btn btn-primary btn-sm">Read more</a>
      </div>
      <!-- Specialty Card 2: Nephrology -->
      <div class="col-md-6 text-center specialty-card" style="margin-bottom: 20px;">
        <img src="images/specialty/nephrology.webp" alt="Nephrology" style="width:60px; height:60px; margin-bottom:10px; transition: transform 0.3s ease;" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">
        <h4>Nephrology</h4>
        <p>Receive expert consultations in nephrology focused on diagnosing and managing kidney conditions to help you maintain optimal renal health.</p>
        <a href="#" class="btn btn-primary btn-sm">Read more</a>
      </div>
    </div>
  </div>
</section>

<!-- Taking Care of Your Well-Being Section -->
<section class="text-center hover:shadow-ocean-green-300" style="padding: 40px 0; background-color: #f5f5f5; transition: transform 0.3s ease;" onmouseover="this.style.transform='scale(1.02)'" onmouseout="this.style.transform='scale(1)'">
  <div class="container">
    <h2>Taking Care of Your Well-Being</h2>
    <div class="row" style="margin-top: 30px; justify-content: center;">
      <!-- Well-Being Card 1: Tailored Health Plans -->
      <div class="col-md-6" style="transition: transform 0.3s ease; margin-bottom: 20px;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
        <img src="images/icon-1.png" alt="Tailored Health Plans" style="width:60px; height:60px; margin-bottom:10px;">
        <h4>Tailored Health Plans</h4>
        <p>We adapt to your unique needs by partnering with a diverse range of insurance providers, ensuring you get the coverage that fits you best.</p>
        <a href="#" class="btn btn-default">Read more</a>
      </div>
      <!-- Well-Being Card 2: Expert Medical Care -->
      <div class="col-md-6" style="transition: transform 0.3s ease; margin-bottom: 20px;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
        <img src="images/icon-2.png" alt="Expert Medical Care" style="width:60px; height:60px; margin-bottom:10px;">
        <h4>Expert Medical Care</h4>
        <p>Our board-certified specialists provide comprehensive, personalized treatment plans to ensure exceptional care and positive health outcomes for you.</p>
        <a href="#" class="btn btn-default">Read more</a>
      </div>
    </div>
  </div>
</section>

<!-- Schedule Your Online Consultation Section -->
<section class="text-center hover:shadow-ocean-green-300" style="padding: 40px 0; background-color: #f5f5f5; margin-top: 40px; transition: transform 0.3s ease;" onmouseover="this.style.transform='scale(1.02)'" onmouseout="this.style.transform='scale(1)'">
  <h2>Schedule Your Online Consultation</h2>
  <p>Connect with top medical professionals from the comfort of your home.</p>
  <a href="bookconsultation.php" class="btn btn-success btn-lg">Book a Consultation</a>
</section>

<!-- Subscription Section -->
<section class="hover:shadow-ocean-green-300" style="padding: 40px 0; background-color: #eeeeee; transition: transform 0.3s ease;" onmouseover="this.style.transform='scale(1.02)'" onmouseout="this.style.transform='scale(1)'">
  <div class="container text-center">
    <h2>Get Our Latest News</h2>
    <p>Subscribe to receive updates on our services, events, and wellness tips to help you live a healthier life.</p>
    <form class="form-inline" style="margin-top: 20px;">
      <div class="form-group">
        <label class="sr-only" for="emailAddress">Email address</label>
        <input type="email" class="form-control" id="emailAddress" placeholder="Enter your email address">
      </div>
      <button type="submit" class="btn btn-primary">Subscribe</button>
    </form>
  </div>
</section>

<?php include 'footer.php'; ?>
