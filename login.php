<?php
// Activar reporte de errores (opcional, para depuración)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// ========== Lógica de login (antes de generar HTML) ==========
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
  <title>Login | TeleConsultations</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap CSS (CDN) -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <!-- Tu hoja de estilos principal -->
  <link rel="stylesheet" href="styles.css">

  <style>
    /* Barra superior fija */
    .custom-navbar {
      background-color: #20a967; /* Verde ocean-green */
      border-color: #3a8a7e;
    }
    .custom-navbar .navbar-brand {
      color: #fff !important;
      font-weight: bold;
      display: flex;
      align-items: center;
    }
    .custom-navbar .navbar-brand img {
      width: 40px;
      height: 40px;
      margin-right: 10px;
    }
    .custom-navbar .navbar-nav > li > a {
      color: #fff !important;
    }

    /* Espacio para que el contenido no quede debajo del navbar fijo */
    .top-spacing {
      margin-top: 80px; /* Ajusta según la altura de tu navbar */
    }

    /* Contenedor "tarjeta" centrado para el login */
    .login-card {
      max-width: 800px;      /* Ancho máximo */
      margin: 0 auto;        /* Centrado horizontal */
      background: #fff;      /* Fondo blanco */
      padding: 30px;         /* Espaciado interno */
      border-radius: 8px;    /* Bordes redondeados */
      box-shadow: 0 4px 12px rgba(0,0,0,0.1); /* Sombra suave */
    }

    /* Flex container para dividir logo y formulario */
    .login-flex-container {
      display: flex;
      flex-wrap: wrap;             /* Permite que en pantallas pequeñas se acomode en una columna */
      justify-content: center;     /* Centra horizontalmente */
      align-items: center;         /* Centra verticalmente dentro del contenedor */
    }

    /* Columnas */
    .login-flex-left,
    .login-flex-right {
      flex: 1 1 300px; /* Crece/encoge con un ancho mínimo de 300px */
      text-align: center;
      margin: 10px;    /* Separación horizontal y vertical */
    }

    /* Logo */
    .login-logo {
      width: 150px; 
      height: auto; 
      margin-bottom: 20px;
    }

    /* Separador vertical */
    .login-separator {
      width: 2px;
      background-color: #eee;
      height: 200px; /* Ajusta la altura */
      margin: 0 20px;
    }

    /* Estilos para el formulario */
    .login-form h2 {
      margin-bottom: 20px;
    }
    .login-form .btn {
      background-color: #20a967;
      border-color: #1e8e5d;
    }
    .login-form .btn:hover {
      background-color: #1e8e5d;
      border-color: #167349;
    }
  </style>
</head>
<body>

  <!-- NAVBAR SUPERIOR -->
  <nav class="navbar navbar-default navbar-fixed-top custom-navbar">
    <div class="container">
      <div class="navbar-header">
        <!-- Botón de menú para móvil -->
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1">
          <span class="icon-bar" style="background-color:#fff;"></span>
          <span class="icon-bar" style="background-color:#fff;"></span>
          <span class="icon-bar" style="background-color:#fff;"></span>
        </button>
        <!-- Logo y texto -->
        <a class="navbar-brand" href="index.php">
          <img src="images/logo1.png" alt="Logo">
          TeleConsultations
        </a>
      </div>

      <!-- Links de la derecha -->
      <div class="collapse navbar-collapse" id="navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li>
            <a href="index.php" style="color:#fff;">&larr; Volver al Inicio</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Espacio para que el contenido no quede oculto tras el navbar -->
  <div class="top-spacing"></div>

  <!-- Contenedor principal en forma de "tarjeta" centrada -->
  <div class="login-card">
    <div class="login-flex-container">
      
      <!-- Columna izquierda: Logo -->
      <div class="login-flex-left">
        <img src="images/logo2.png" alt="Logo" class="login-logo">
      </div>
      
      <!-- Separador vertical (se oculta en pantallas pequeñas si deseas) -->
      <div class="login-separator hidden-xs"></div>
      
      <!-- Columna derecha: Formulario -->
      <div class="login-flex-right">
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
            <button type="submit" name="login" class="btn btn-primary">
              Iniciar Sesión
            </button>
          </form>

          <?php if (isset($error_message)): ?>
            <p class="text-danger" style="margin-top:10px;"><?php echo $error_message; ?></p>
          <?php endif; ?>
        </div><!-- .login-form -->
      </div><!-- .login-flex-right -->

    </div><!-- .login-flex-container -->
  </div><!-- .login-card -->

  <!-- Footer al final -->
  <?php include 'footer.php'; ?>

  <!-- jQuery y Bootstrap JS (CDN) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>
