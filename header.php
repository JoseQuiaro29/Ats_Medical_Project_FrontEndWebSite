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
    }
    
    .language-btn:hover, .language-btn.active {
      background: #fff;
      color: #3358aa;
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
          <li><a href="index.php">Home</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="contact.php">Contact</a></li>
          <li><a href="login.php">Sign in</a></li>
          <li>
            <div class="language-selector-container">
              <div class="language-selector">
                <button class="language-btn active" data-lang="es">ES</button>
                <button class="language-btn" data-lang="en">EN</button>
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
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const languageBtns = document.querySelectorAll('.language-btn');
      
      languageBtns.forEach(btn => {
        btn.addEventListener('click', function() {
          // Remover clase active de todos los botones
          languageBtns.forEach(b => b.classList.remove('active'));
          // Agregar clase active al botón clickeado
          this.classList.add('active');
          
          const lang = this.getAttribute('data-lang');
          console.log('Idioma seleccionado:', lang);
          // Aquí iría la lógica para cambiar el idioma de la página
        });
      });
    });
  </script>
</body>
</html>