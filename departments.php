<?php include 'header.php'; ?>

<!-- Green band with "Our Services" -->
<section style="background-color: #62c6a8; padding: 40px 0;">
  <div class="container text-center">
    <h2 style="color: #fff; margin: 0;">Our Services</h2>
  </div>
</section>

<!-- Specialties focused on Internal Medicine and Nephrology -->
<style>
  /* Actualiza el tamaño de las imágenes y efecto hover */
  .specialty-card {
    padding: 20px;
    transition: transform 0.3s ease;
  }
  .specialty-card:hover {
    transform: scale(1.05);
  }
  .specialty-card img {
    transition: transform 0.3s ease;
    width: 150px; /* nuevo tamaño */
    height: 150px; /* nuevo tamaño */
    margin-bottom: 10px;
  }
  .specialty-card img:hover {
    transform: scale(1.1);
  }
</style>
<section class="container" style="padding: 40px 0;">
  <!-- First row (2 specialties) -->
  <div class="row">
    <!-- Atribución: "Riñones Fotos de Stock por Vecteezy" - <a href="https://es.vecteezy.com/fotos-gratis/ri%C3%B1ones" target="_blank">Fuente</a> -->
    <div class="col-md-6 text-center specialty-card">
      <img src="images/specialty/nephrology1.jpg" alt="Tele Nephrology">
      <h3 style="color: #62c6a8;">Tele Nephrology</h3>
      <p>
        Dr. Manuel Garcia Estrada offers remote nephrology services, providing specialized consultations for kidney diseases.
      </p>
      <a href="#" style="color: #62c6a8; text-decoration: underline;">See more</a>
      <?php
      // Alternativamente, puedes mostrar la atribución en forma visible:
      // echo '<small>Riñones Fotos de Stock por <a href="https://es.vecteezy.com/fotos-gratis/ri%C3%B1ones" target="_blank">Vecteezy</a></small>';
      ?>
    </div>
    <div class="col-md-6 text-center specialty-card">
      <img src="images/specialty/InternalMedicine.jpg" alt="Tele Internal Medicine">
      <h3 style="color: #62c6a8;">Tele Internal Medicine</h3>
      <p>
        Dr. Manuel Garcia Estrada offers remote internal medicine services, providing specialized consultations for adult diseases.
      </p>
      <a href="#" style="color: #62c6a8; text-decoration: underline;">See more</a>
    </div>
  </div>
</section>

<?php include 'footer.php'; ?>
