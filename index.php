<?php include 'header.php'; ?>

<!-- Carousel with specialties overlay removed -->
<div id="homeCarousel" class="carousel slide" data-ride="carousel" style="position: relative; max-height: 500px; overflow:hidden; background: url('images/background/carousel-bg.jpg') no-repeat center center; background-size:cover;">
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
</div>

<!-- New Specialties Section below the carousel -->
<section class="specialties" style="padding: 40px 0; background-color: #f5f5f5;">
  <div class="container">
    <div class="row">
      <div class="col-md-6 text-center specialty-card">
        <img src="images/specialty/Internal-Medicine.jpg" alt="Internal Medicine" class="specialty-img">
        <h4>Internal Medicine</h4>
        <p>Provides comprehensive internal medicine services, focusing on the diagnosis and treatment of adult diseases.</p>
        <a href="https://baptisthealth.net/es/doctors/manuel-garcia-estrada/869130" class="btn btn-primary btn-sm">Read more</a>
      </div>
      <div class="col-md-6 text-center specialty-card">
        <img src="images/specialty/nephrology.jpg" alt="Nephrology" class="specialty-img">
        <h4>Nephrology</h4>
        <p>Provides comprehensive nephrology services, focusing on the diagnosis and treatment of kidney diseases.</p>
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
      <div class="col-md-6">
        <img src="images/icon-1.png" alt="Accepted Health Plans" class="specialty-img">
        <h4>Affordable Options</h4>
        <p>We strive to offer solutions that fit your budget. Check if your insurance is accepted for our services.</p>
        <a href="sure.php" class="btn btn-default">Learn More</a>
      </div>
      <div class="col-md-6">
        <img src="images/icon-2.png" alt="Leaders and Medical Specialists" class="specialty-img">
        <h4>Leaders & Medical Specialists</h4>
        <p>Our specialized physicians deliver exceptional care and personalized treatment plans, ensuring your health and well-being.</p>
        <a href="about.php" class="btn btn-default">Read more</a>
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

<script>
  (function($) {
    $(document).ready(function() {
      $('#homeCarousel').carousel({
        interval: 5000,
        pause: 'hover'
      });
    });
  })(jQuery);
</script>

<?php include 'footer.php'; ?>
