<?php
// Enable error reporting (optional for debugging)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// ========== Login logic (before generating HTML) ==========
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Default password = '123456'
    if ($password === '123456') {
        if ($username === 'client') {
            header('Location: src/cliente/cliente_dashboard.php');
            exit();
        } elseif ($username === 'doctor') {
            header('Location: src/doctor/doctor_dashboard.php');
            exit();
        } else {
            $error_message = "Unrecognized user";
        }
    } else {
        $error_message = "Incorrect password";
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

  <!-- Your main stylesheet -->
  <link rel="stylesheet" href="styles.css">

  <style>
    /* Fixed top navbar */
    .custom-navbar {
      background-color: rgba(51, 88, 170, 0.8);
      border-color: rgba(58, 138, 126, 0.8);
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

    /* Full page layout */
    html, body {
      height: 100%;
      margin: 0;
    }
    
    body {
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    /* Main content area */
    .main-content {
      flex: 1;
      display: flex;
      flex-direction: column;
      padding: 20px 0;
    }

    /* Centered login container */
    .login-container {
      flex: 1;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 20px;
    }

    /* Login card styling */
    .login-card {
      width: 100%;
      max-width: 800px;
      background: #fff;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      margin: 20px 0;
    }

    /* Flex layout for logo and form */
    .login-flex-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      align-items: center;
      gap: 20px;
    }

    /* Logo and form columns */
    .login-flex-left, 
    .login-flex-right {
      flex: 1;
      min-width: 300px;
      text-align: center;
    }

    /* Logo styling */
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
    }

    /* Form styling */
    .login-form h2 {
      margin-bottom: 20px;
      color: #333;
    }
    .login-form .btn {
      background-color: #3358aa;
      border-color: #3358aa;
      width: 100%;
      padding: 10px;
    }
    .login-form .btn:hover {
      background-color:rgb(47, 92, 190);
      border-color: #3358aa;
    }
    .form-group {
      margin-bottom: 15px;
      text-align: left;
    }
    .form-control {
      height: 40px;
    }

    /* Footer styling */
    footer {
      background-color: #f8f9fa;
      padding: 20px 0;
      text-align: center;
      border-top: 1px solid #e7e7e7;
      width: 100%;
    }
    footer p {
      margin: 5px 0;
      color: #555;
    }
    footer a {
      color: #20a967;
      text-decoration: none;
    }
    footer a:hover {
      text-decoration: underline;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
      .login-separator {
        display: none;
      }
      .login-flex-left, 
      .login-flex-right {
        flex: 100%;
      }
    }
  </style>
</head>
<body>

  <!-- TOP NAVBAR -->
  <nav class="navbar navbar-default navbar-fixed-top custom-navbar">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1">
          <span class="icon-bar" style="background-color:#fff;"></span>
          <span class="icon-bar" style="background-color:#fff;"></span>
          <span class="icon-bar" style="background-color:#fff;"></span>
        </button>
        <a class="navbar-brand" href="index.php">
          <img src="images/logo1.png" alt="Logo">
          TeleConsultations
        </a>
      </div>

      <div class="collapse navbar-collapse" id="navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li>
            <a href="index.php" style="color:#fff;">&larr; Back to Home</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Main content with proper spacing -->
  <div class="main-content">
    <!-- Spacer for fixed navbar -->
    <div style="height: 80px;"></div>
    
    <!-- Centered login area -->
    <div class="login-container">
      <div class="login-card">
        <div class="login-flex-container">
          <!-- Logo column -->
          <div class="login-flex-left">
            <img src="images/logo2.png" alt="Logo" class="login-logo">
          </div>
          
          <!-- Vertical separator -->
          <div class="login-separator hidden-xs"></div>
          
          <!-- Form column -->
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
                <p class="text-danger" style="margin-top:15px;"><?php echo $error_message; ?></p>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <?php include 'footer.php'; ?>

  <!-- jQuery & Bootstrap JS (CDN) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>