<?php
// login.php
// Incluir la cabecera (navbar, etc.)
include 'header.php';

// Verificación de credenciales
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Password por defecto = '123456'
    if ($password === '123456') {
        if ($username === 'client') {
            header('Location: src/cliente/cliente_dashboard.php');
            exit();
        } elseif ($username === 'doctor') {
            header('Location: src/doctor/doctor_dashboard.php');
            exit();
        } else {
            $error_message = "Usuario no reconocido";
        }
    } else {
        $error_message = "Contraseña incorrecta";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- Enlazar tu hoja de estilos principal -->
  <link rel="stylesheet" href="styles.css">
</head>
<body>

  <!-- Contenedor principal para el login -->
  <div class="login-container">
    
    <!-- Contenedor Flexbox: logo + separador + formulario -->
    <div class="login-flex-container">
      
      <!-- Columna izquierda: Logo -->
      <div class="login-flex-left">
        <img src="images/logo2.png" alt="Logo" class="login-logo" style="width: 100px; height: auto;"> <!-- Ajustar tamaño de la imagen -->
      </div>
      
      <!-- Separador vertical -->
      <div class="login-separator"></div>
      
      <!-- Columna derecha: Formulario -->
      <div class="login-flex-right">
        <!-- Usa la clase .login-form para mantener tu estilo de fondo, bordes, etc. -->
        <div class="login-form">
          <h2>Login</h2>
          <form method="post" action="">
            <div class="form-group">
              <label for="username">Username:</label>
              <input 
                type="text" 
                id="username" 
                name="username" 
                class="form-control"
                required
              >
            </div>
            <div class="form-group">
              <label for="password">Password:</label>
              <input 
                type="password" 
                id="password" 
                name="password" 
                class="form-control"
                required
              >
            </div>
            <!-- Botón con .btn-primary para color ocean-green -->
            <button type="submit" name="login" class="btn btn-primary">
              Iniciar Sesión
            </button>
          </form>

          <?php
          if (isset($error_message)) {
              echo "<p class='text-danger'>$error_message</p>";
          }
          ?>
        </div><!-- .login-form -->
      </div><!-- .login-flex-right -->
    </div><!-- .login-flex-container -->
  </div><!-- .login-container -->

  <!-- Footer al final -->
  <?php include 'footer.php'; ?>

</body>
</html>
