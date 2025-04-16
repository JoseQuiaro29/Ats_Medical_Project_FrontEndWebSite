<?php
// Iniciar sesión y manejar idioma
session_start();

$defaultLang = 'es';
$availableLangs = ['es', 'en'];

// Determinar idioma (prioridad: GET > SESSION > COOKIE > default)
if (isset($_GET['lang']) && in_array($_GET['lang'], $availableLangs)) {
    $_SESSION['lang'] = $_GET['lang'];
    setcookie('lang', $_GET['lang'], time() + (86400 * 30), "/"); // 30 días
} elseif (isset($_SESSION['lang'])) {
    // Ya está en sesión
} elseif (isset($_COOKIE['lang'])) {
    $_SESSION['lang'] = $_COOKIE['lang'];
} else {
    $_SESSION['lang'] = $defaultLang;
}

$currentLang = $_SESSION['lang'];
?>
<!DOCTYPE html>
<html lang="<?php echo $currentLang; ?>">
<head>
  <meta charset="UTF-8">
  <title>TeleConsultations</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS (CDN) -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/tailwind-output.css">

  <!-- Estilos internos personalizados -->
  <style>
    /* Estilos para la Navbar personalizada */
    .custom-navbar {
      background-color: rgba(51, 88, 170, 0.8);
      border-color: rgba(58, 138, 126, 0.8);
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
    
    /* Estilos mejorados para el selector de idiomas */
    .language-selector {
      display: flex;
      margin-left: 15px;
      align-items: center;
    }
    
    .language-selector-container {
      display: flex;
      align-items: center;
      height: 50px;
      padding: 15px 0;
    }
    
    .language-btn {
      background: rgba(255,255,255,0.2);
      border: 1px solid #fff;
      color: #fff !important;
      padding: 5px 10px;
      margin: 0 3px;
      border-radius: 3px;
      cursor: pointer;
      transition: all 0.3s ease;
      font-weight: bold;
      text-decoration: none;
      display: inline-block;
    }
    
    .language-btn:hover, .language-btn.active {
      background: #fff;
      color: #3358aa !important;
      border-color:rgb(239, 242, 247);
    }
    
    /* Alineación vertical para los items del menú */
    .nav.navbar-nav > li {
      display: flex;
      align-items: center;
    }
    
    @media (max-width: 768px) {
      .language-selector {
        margin: 10px 15px;
        justify-content: flex-end;
      }
      .language-selector-container {
        height: auto;
        padding: 10px 15px;
        justify-content: flex-start;
      }
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
      <div class="collapse navbar-collapse" id="navbar-collapse">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="index.php" data-i18n="home">Home</a></li>
          <li><a href="about.php" data-i18n="about">About</a></li>
          <li><a href="contact.php" data-i18n="contact">Contact</a></li>
          <li><a href="login.php" data-i18n="login">Sign in</a></li>
          <li>
            <div class="language-selector-container">
              <div class="language-selector">
                <a href="?lang=es" class="language-btn <?php echo $currentLang === 'es' ? 'active' : ''; ?>">ES</a>
                <a href="?lang=en" class="language-btn <?php echo $currentLang === 'en' ? 'active' : ''; ?>">EN</a>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Espaciador para evitar que el contenido quede oculto tras la navbar -->
  <div class="navbar-spacer"></div>

  <!-- jQuery y Bootstrap JS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <!-- Script para el cambio de idioma -->
  <script src="js/language.js"></script>
  <script>
    // Pasar el idioma actual a JavaScript
    const currentLang = '<?php echo $currentLang; ?>';
    
    // Inicializar el sistema de idiomas
    document.addEventListener('DOMContentLoaded', function() {
      initLanguageSystem(currentLang);
    });
  </script>