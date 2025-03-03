<!-- footer.php -->
<footer class="footer" style="
  background-color: #20a967; /* Color de fondo del footer (verde ocean-green 500) */
  color: #fff; /* Color del texto: blanco */
  padding: 10px 0; /* Espacio interno vertical reducido a 10px arriba y abajo */
  margin-top: 0; /* Sin margen superior para eliminar espacios extras */
  position: fixed; /* Posición fija para que el footer siempre esté visible */
  bottom: 0; /* Se posiciona en la parte inferior de la ventana */
  left: 0; /* Alineado al borde izquierdo */
  width: 100%; /* Ocupa todo el ancho de la ventana */
  z-index: 9999; /* Se muestra sobre otros elementos */
">
  <div class="container" style="
    display: flex; /* Utiliza flexbox para organizar las columnas horizontalmente */
    justify-content: space-between; /* Distribuye las columnas con espacio entre ellas */
    flex-wrap: wrap; /* Permite que las columnas se acomoden en varias líneas en pantallas pequeñas */
    align-items: center; /* Centra verticalmente los elementos dentro del contenedor */
    max-width: 1200px; /* Ancho máximo del contenedor */
    margin: 0 auto; /* Centra el contenedor horizontalmente */
    padding: 0 20px; /* Espacio interno horizontal de 20px para separar los elementos de los bordes */
  ">
    <!-- Columna 1: Copyright y redes sociales -->
    <div class="footer-column" style="
      flex: 1; /* La columna ocupa el espacio disponible */
      min-width: 200px; /* Ancho mínimo para evitar que se encoja demasiado en pantallas pequeñas */
      text-align: center; /* Centra el contenido horizontalmente */
      margin-bottom: 10px; /* Margen inferior para separar columnas en pantallas pequeñas */
    ">
      <p>&copy; <?php echo date("Y"); ?> TeleConsultations</p>
      <div style="margin-top: 10px;">
        <a href="https://www.facebook.com" target="_blank" style="color: #fff; margin: 0 10px;">
          <img 
            src="https://cdn-icons-png.flaticon.com/512/733/733547.png" 
            alt="Facebook" 
            style="
              width: 25px; /* Ancho del ícono de Facebook */
              height: 25px; /* Alto del ícono de Facebook */
            "
          >
        </a>
        <a href="https://www.twitter.com" target="_blank" style="color: #fff; margin: 0 10px;">
          <img 
            src="https://cdn-icons-png.flaticon.com/512/733/733579.png" 
            alt="Twitter" 
            style="
              width: 25px; /* Ancho del ícono de Twitter */
              height: 25px; /* Alto del ícono de Twitter */
            "
          >
        </a>
      </div>
    </div>
    <!-- Columna 2: Enlaces legales y datos de contacto -->
    <div class="footer-column" style="
      flex: 1; 
      min-width: 200px; 
      text-align: center; 
      margin-bottom: 10px;
    ">
      <p>
        <a href="#" style="color:#fff; text-decoration: underline;">Terms and Conditions</a> | 
        <a href="#" style="color:#fff; text-decoration: underline;">Privacy Policy</a>
      </p>
      <p>Address: 550 Southwest 27th Avenue, Miami, FL 33135</p>
      <p>Phone: 305-541-2655</p>
    </div>
    <!-- Columna 3: Logo y soporte técnico -->
    <div class="footer-column" style="
      flex: 1; 
      min-width: 200px; 
      text-align: center; 
      margin-bottom: 10px;
    ">
      <p>
        <a href="https://advancedats.com" target="_blank">
          <img 
            src="../../images/logo1.png" 
            alt="Advance ATS" 
            style="
              width: 25px; /* Ancho del logo */
              height: 25px; /* Alto del logo */
              margin-right: 10px; /* Espacio a la derecha del logo */
            "
          >
        </a>
        Technical Support ccesin@link2ats.com
      </p>
      <p>Phone +1 305 477 3052</p>
    </div>
  </div>
</footer>

<!-- jQuery and Bootstrap JS (CDN) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
