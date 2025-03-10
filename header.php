<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>TeleConsultations</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS (CDN) -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/tailwind-output.css"> <!-- Agrega esta línea -->

  <!-- Estilos internos personalizados -->
  <style>
    /* Estilos para la Navbar personalizada */
    .custom-navbar {
      background-color: rgba(51, 88, 170, 0.8); /* ocean-green 500 con 80% de opacidad */
      border-color: rgba(58, 138, 126, 0.8); /* ocean-green 600 con 80% de opacidad */
    }
    .navbar-toggle .icon-bar {
      background-color: #fff;
    }
    .custom-navbar-brand {
      color: #fff;
      display: flex;
      align-items: center;
    }
    .navbar-logo {
      width: 40px;
      height: 40px;
      margin-right: 10px;
    }
    .nav.navbar-nav.navbar-right li a {
      color: #fff;
    }
    /* Espaciador para evitar que el contenido quede oculto tras la navbar */
    .navbar-spacer {
      margin-top: 70px;
    }
  </style>
</head>
<body>
  <!-- Navigation Bar -->
  <nav class="navbar navbar-default navbar-fixed-top custom-navbar">
    <div class="container">
      <div class="navbar-header">
        <!-- Botón para menú móvil -->
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand custom-navbar-brand" href="index.php">
          <img src="images/logo1.png" alt="Logo" class="navbar-logo">
          <strong style="color:#fff">TeleConsultations</strong>
        </a>
      </div>

      <!-- Menú de navegación -->
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php">Home</a></li>
        <li><a href="departments.php">Departments</a></li>
        <!-- Se puede eliminar o comentar el enlace de Services -->
        <!-- <li><a href="#">Services</a></li> -->
        <!-- Agregar el enlace Sure -->
        <li><a href="sure.php">Sure</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="login.php">Sign in</a></li>
      </ul>
    </div>
  </nav>

  <!-- Espaciador para evitar que el contenido quede oculto tras la navbar -->
  <div class="navbar-spacer"></div>
