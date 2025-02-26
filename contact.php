<?php include 'header.php'; ?>

<!-- Green band with "Contact Us" -->
<section style="background-color: #62c6a8; padding: 40px 0;">
  <div class="container text-center">
    <h2 style="color: #fff; margin: 0;">Contact Us</h2>
  </div>
</section>

<!-- Contact Section -->
<section class="container" style="padding: 40px 0;">
  <div class="row">
    <!-- Map Column -->
    <div class="col-md-6">
      <div style="border: 1px solid #ccc;">
        <!-- Replace the src with your desired Google Maps embed link -->
        <iframe 
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.086857726702!2d-80.20729168468157!3d25.76601598362864!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88d9b69b7e4b7b7b%3A0x4b8b8b8b8b8b8b8b!2s550%20SW%2027th%20Ave%2C%20Miami%2C%20FL%2033135%2C%20USA!5e0!3m2!1sen!2s!4v1633021234567!5m2!1sen!2s" 
          width="100%" 
          height="450" 
          style="border:0;" 
          allowfullscreen="" 
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade">
        </iframe>
      </div>
    </div>

    <!-- Form Column -->
    <div class="col-md-6">
      <h3>Find us</h3>
      <p>
        We are located at <strong>550 Southwest 27th Avenue, Miami, FL 33135</strong>, 
        
      </p>
      <form action="send_contact.php" method="post">
        <div class="form-group">
          <label for="firstName">First Name:</label>
          <input 
            type="text" 
            class="form-control" 
            id="firstName" 
            name="firstName" 
            placeholder="Your first name" 
            required
          >
        </div>
        <div class="form-group">
          <label for="lastName">Last Name:</label>
          <input 
            type="text" 
            class="form-control" 
            id="lastName" 
            name="lastName" 
            placeholder="Your last name"
          >
        </div>
        <div class="form-group">
          <label for="email">Email address:</label>
          <input 
            type="email" 
            class="form-control" 
            id="email" 
            name="email" 
            placeholder="Your email" 
            required
          >
        </div>
        <div class="form-group">
          <label for="mobile">Mobile:</label>
          <input 
            type="text" 
            class="form-control" 
            id="mobile" 
            name="mobile" 
            placeholder="Your mobile phone"
          >
        </div>
        <div class="form-group">
          <label for="message">Message:</label>
          <textarea 
            class="form-control" 
            id="message" 
            name="message" 
            rows="4" 
            placeholder="Your message" 
            required
          ></textarea>
        </div>
        <button type="submit" class="btn btn-success">Schedule Teleconsultation</button>
      </form>
    </div>
  </div>
</section>

<?php include 'footer.php'; ?>
