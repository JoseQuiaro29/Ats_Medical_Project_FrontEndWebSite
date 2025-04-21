<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login | TeleConsultations</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap CSS (CDN) -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <!-- Your main stylesheet -->
  <link rel="stylesheet" href="styles.css">

  <style>
    /* Fixed top navbar */
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
    
    /* Spacing so the content is not hidden under the fixed navbar */
    .top-spacing {
      margin-top: 70px;
    }
    
    /* Estilos mejorados para el selector de idiomas (si lo necesitas) */
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

    /* Centered "card" container for login */
    .login-card {
      max-width: 800px;
      margin: 0 auto;
      background: #fff;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    /* Flex container to split logo and form */
    .login-flex-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      align-items: center;
    }

    /* Columns */
    .login-flex-left,
    .login-flex-right {
      flex: 1 1 300px;
      text-align: center;
      margin: 10px;
    }

    /* Logo effect: grayscale + hover zoom */
    .login-logo {
      width: 150px; 
      height: auto; 
      margin-bottom: 20px;
      filter: grayscale(80%);
      transition: filter 0.3s ease, transform 0.3s ease;
    }
    .login-logo:hover {
      filter: grayscale(0%);
      transform: scale(1.05);
    }

    /* Vertical separator */
    .login-separator {
      width: 2px;
      background-color: #eee;
      height: 200px;
      margin: 0 20px;
    }

    /* Form styles */
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

  <!-- TOP NAVBAR -->
  <nav class="navbar navbar-default navbar-fixed-top custom-navbar">
    <div class="container">
      <div class="navbar-header">
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

      <div class="collapse navbar-collapse" id="navbar-collapse">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="index.php">&larr; Back to Home</a></li>
          <!-- Si necesitas añadir el selector de idiomas:
          <li>
            <div class="language-selector-container">
              <div class="language-selector">
                <a href="?lang=es" class="language-btn">ES</a>
                <a href="?lang=en" class="language-btn active">EN</a>
              </div>
            </div>
          </li>
          -->
        </ul>
      </div>
    </div>
  </nav>

  <!-- Space so content isn't hidden under the navbar -->
  <div class="top-spacing"></div>

  <!-- Main centered "card" container -->
  <div class="login-card">
    <div class="login-flex-container">
      
      <!-- Left column: Logo -->
      <div class="login-flex-left">
        <img src="images/logo2.png" alt="Logo" class="login-logo">
      </div>
      
      <!-- Vertical separator (hidden on extra-small screens) -->
      <div class="login-separator hidden-xs"></div>
      
      <!-- Right column: Form -->
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
              Log In
            </button>
          </form>

          <?php if (isset($error_message)): ?>
            <p class="text-danger" style="margin-top:10px;"><?php echo $error_message; ?></p>
          <?php endif; ?>
        </div><!-- .login-form -->
      </div><!-- .login-flex-right -->

    </div><!-- .login-flex-container -->
  </div><!-- .login-card -->

  <!-- Footer -->
  <?php include 'footer.php'; ?>

  <!-- jQuery & Bootstrap JS (CDN) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>
