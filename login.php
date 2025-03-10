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
      background-color: rgba(51, 88, 170, 0.8); /* ocean-green 500 con 80% de opacidad */
      border-color: rgba(58, 138, 126, 0.8); /* ocean-green 600 con 80% de opacidad */
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

    /* Spacing so the content is not hidden under the fixed navbar */
    .top-spacing {
      margin-top: 80px; /* Adjust based on your navbar height */
    }

    /* Centered "card" container for login */
    .login-card {
      max-width: 800px;        /* Max width */
      margin: 0 auto;          /* Center horizontally */
      background: #fff;        /* White background */
      padding: 30px;           /* Inner spacing */
      border-radius: 8px;      /* Rounded corners */
      box-shadow: 0 4px 12px rgba(0,0,0,0.1); /* Subtle shadow */
    }

    /* Flex container to split logo and form */
    .login-flex-container {
      display: flex;
      flex-wrap: wrap;         /* Allows columns to stack on small screens */
      justify-content: center; /* Center horizontally */
      align-items: center;     /* Center vertically inside the container */
    }

    /* Columns */
    .login-flex-left,
    .login-flex-right {
      flex: 1 1 300px; /* Grows/Shrinks with a minimum width of 300px */
      text-align: center;
      margin: 10px;    /* Horizontal and vertical gap */
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
      height: 200px; /* Adjust height */
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
        <!-- Mobile menu toggle button -->
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1">
          <span class="icon-bar" style="background-color:#fff;"></span>
          <span class="icon-bar" style="background-color:#fff;"></span>
          <span class="icon-bar" style="background-color:#fff;"></span>
        </button>
        <!-- Logo and title -->
        <a class="navbar-brand" href="index.php">
          <img src="images/logo1.png" alt="Logo">
          TeleConsultations
        </a>
      </div>

      <!-- Right-side links -->
      <div class="collapse navbar-collapse" id="navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li>
            <a href="index.php" style="color:#fff;">&larr; Back to Home</a>
          </li>
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
