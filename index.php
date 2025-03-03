<?php include 'header.php'; ?>

<!-- Carousel with specialties overlay removed -->
<div id="homeCarousel" class="carousel slide" data-ride="carousel" style="position: relative; max-height: 500px; overflow:hidden;">
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
      <img src="images/carousel/carousel1.jpg" alt="Slide 1" class="img-responsive" style="margin: 0 auto; max-height: 500px;">
    </div>
    <div class="item">
      <img src="images/carousel/carousel2.jpg" alt="Slide 2" class="img-responsive" style="margin: 0 auto; max-height: 500px;">
    </div>
    <div class="item">
      <img src="images/carousel/carousel3.jpg" alt="Slide 3" class="img-responsive" style="margin: 0 auto; max-height: 500px;">
    </div>
    <div class="item">
      <img src="images/carousel/carousel4.jpg" alt="Slide 3" class="img-responsive" style="margin: 0 auto; max-height: 500px;">
    </div>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#homeCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true" style="margin-top:200px;"></span>
  </a>
  <a class="right carousel-control" href="#homeCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true" style="margin-top:200px;"></span>
  </a>
  
  <?php
  // Old overlay (commented out):
  // <div class="overlay" style="position: absolute; bottom: 5%; left: 0; width: 100%; z-index: 100;">
  //   ... specialities cards ...
  // </div>
  ?>
</div>

<!-- New Specialties Section below the carousel -->
<style>
  .specialty-card {
    transition: transform 0.3s ease;
  }
  .specialty-card:hover {
    transform: scale(1.05);
  }
</style>
<section class="specialties" style="padding: 40px 0; background-color: #f5f5f5;">
  <div class="container">
    <div class="row">
      <div class="col-md-6 text-center specialty-card">
        <img src="images/specialty/Internal-Medicine.jpg" alt="Internal Medicine" style="width:60px; height:60px; margin-bottom:10px;">
        <h4>Internal Medicine</h4>
        <p>Dr. Manuel Garcia Estrada provides comprehensive internal medicine services, focusing on the diagnosis and treatment of adult diseases.</p>
        <a href="https://baptisthealth.net/es/doctors/manuel-garcia-estrada/869130" class="btn btn-primary btn-sm">Read more</a>
      </div>
      <div class="col-md-6 text-center specialty-card">
        <img src="images/specialty/nephrology.jpg" alt="Nephrology" style="width:60px; height:60px; margin-bottom:10px;">
        <h4>Nephrology</h4>
        <p>Dr. Manuel Garcia Estrada provides comprehensive nephrology services, focusing on the diagnosis and treatment of kidney diseases.</p>
        <a href="https://baptisthealth.net/es/doctors/manuel-garcia-estrada/869130" class="btn btn-primary btn-sm">Read more</a>
      </div>
    </div>
  </div>
</section>

<!-- Schedule your online consultation Section -->
<section class="text-center" style="padding: 40px 0; background-color: #f5f5f5; margin-top: 40px;">
  <h2>Schedule your online consultation</h2>
  <p>Get expert medical advice from the comfort of your home.</p>
  <a href="bookconsultation.php" class="btn btn-success btn-lg">Book a consultation</a>
</section>

<!-- Taking care of your well-being Section -->
<section class="text-center" style="padding: 40px 0;">
  <div class="container">
    <h2>Taking care of your well-being</h2>
    <div class="row" style="margin-top: 30px;">
      <div class="col-md-4">
        <img src="images/icon-1.png" alt="Accepted Health Plans" style="width:60px; height:60px; margin-bottom:10px;">
        <h4>Accepted Health Plans</h4>
        <p>We accept a wide range of health insurance providers to ensure comprehensive coverage for our patients.</p>
        <a href="#" class="btn btn-default">Read more</a>
      </div>
      <div class="col-md-4">
        <img src="images/icon-2.png" alt="Leaders in Specialized Medical Care" style="width:60px; height:60px; margin-bottom:10px;">
        <h4>Leaders in Specialized Medical Care</h4>
        <p>Our specialized physicians deliver exceptional care and outstanding results in their respective fields.</p>
        <a href="#" class="btn btn-default">Read more</a>
      </div>
      <div class="col-md-4">
        <img src="images/icon-3.png" alt="Medical Specialists" style="width:60px; height:60px; margin-bottom:10px;">
        <h4>Medical Specialists</h4>
        <p>Our medical specialists provide personalized treatment plans, ensuring your health and well-being.</p>
        <a href="#" class="btn btn-default">Read more</a>
      </div>
    </div>
  </div>
</section>

<!-- Subscription Section -->
<section style="padding: 40px 0; background-color: #eeeeee;">
  <div class="container text-center">
    <h2>Receive our latest news</h2>
    <p>Sign up to receive updates on our services, events, and wellness tips. Stay informed to build a healthy lifestyle.</p>
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
