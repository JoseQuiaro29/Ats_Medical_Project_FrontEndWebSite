<!-- footer.php -->
<style>
/* Estilos generales del footer */
.footer {
  background-color: #20a967;
  color: #fff;
  padding: 10px 0;
  margin-top: 0;
  position: fixed;
  bottom: 0;
  left: 0;
  width: 100%;
  z-index: 9999;
  font-size: 1.5rem; /* agregado para aumentar el tamaño de todas las letras del footer */
}

/* Contenedor del footer */
.footer .container {
  display: flex;
  justify-content: space-between;
  flex-wrap: wrap;
  align-items: center;
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 20px;
}

/* Columnas del footer */
.footer-column {
  flex: 1;
  min-width: 200px;
  text-align: center;
  margin-bottom: 10px;
}

/* Estilos de los enlaces */
.footer a {
  color: #fff;
  text-decoration: underline;
}

/* Íconos de redes sociales */
.footer .social-icons img {
  width: 25px;
  height: 25px;
  margin: 0 10px;
}

/* Logo */
.footer .logo img {
  width: 25px;
  height: 25px;
  margin-right: 10px;
}
</style>

<footer class="footer">
  <div class="container">
    <!-- Columna 1: Copyright y redes sociales -->
    <div class="footer-column">
      <p>&copy; <?php echo date("Y"); ?> TeleConsultations</p>
      <div class="social-icons">
        <a href="https://www.facebook.com" target="_blank">
          <img src="https://cdn-icons-png.flaticon.com/512/733/733547.png" alt="Facebook">
        </a>
        <a href="https://www.twitter.com" target="_blank">
          <img src="https://cdn-icons-png.flaticon.com/512/733/733579.png" alt="Twitter">
        </a>
      </div>
    </div>
    
    <!-- Columna 2: Enlaces legales y datos de contacto -->
    <div class="footer-column">
      <p>
        <a href="#">Terms and Conditions</a> | 
        <a href="#">Privacy Policy</a>
      </p>
      <p>Address: 550 Southwest 27th Avenue, Miami, FL 33135</p>
      <p>Phone: 305-541-2655</p>
    </div>
    
    <!-- Columna 3: Logo y soporte técnico -->
    <div class="footer-column">
      <p class="logo">
        <a href="https://advancedats.com" target="_blank">
          <img src="../../images/logo1.png" alt="Advance ATS">
        </a>
        Technical Support ccesin@link2ats.com
      </p>
      <p>Phone +1 305 477 3052</p>
    </div>
  </div>
</footer>

<!-- jQuery y Bootstrap JS (CDN) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
