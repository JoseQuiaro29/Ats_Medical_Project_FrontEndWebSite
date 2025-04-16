<?php
// Enable error reporting (optional for debugging)
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register | TeleConsultations</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap CSS (CDN) -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <!-- Font Awesome for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

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

    /* Spacing so the content is not hidden under the fixed navbar */
    .top-spacing {
      margin-top: 80px;
    }

    /* Centered "card" container */
    .register-card {
      max-width: 900px;
      margin: 0 auto;
      background: #fff;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    /* Form header */
    .register-header {
      text-align: center;
      margin-bottom: 30px;
      position: relative;
    }
    .register-header h2 {
      color: #3358aa;
      font-weight: bold;
      margin-bottom: 10px;
    }
    .register-header p {
      color: #666;
    }
    .register-header:after {
      content: "";
      display: block;
      width: 50px;
      height: 3px;
      background: #20a967;
      margin: 15px auto;
    }

    /* Form styles */
    .register-form .form-group {
      margin-bottom: 20px;
    }
    .register-form label {
      font-weight: 500;
      color: #555;
    }
    .register-form .form-control {
      border-radius: 4px;
      border: 1px solid #ddd;
      padding: 10px 15px;
      height: auto;
    }
    .register-form .form-control:focus {
      border-color: #3358aa;
      box-shadow: 0 0 0 0.2rem rgba(51, 88, 170, 0.25);
    }

    /* Terms checkbox */
    .terms-checkbox {
      margin: 20px 0;
    }
    .terms-checkbox label {
      font-weight: normal;
      cursor: pointer;
    }
    .terms-checkbox a {
      color: #3358aa;
      text-decoration: underline;
    }

    /* Submit button */
    .register-btn {
      background-color: #20a967;
      border-color: #1e8e5d;
      color: white;
      padding: 12px 30px;
      font-weight: bold;
      text-transform: uppercase;
      letter-spacing: 1px;
      transition: all 0.3s;
      width: 100%;
    }
    .register-btn:hover {
      background-color: #1e8e5d;
      border-color: #167349;
      color: white;
    }

    /* Login link */
    .login-link {
      text-align: center;
      margin-top: 20px;
      color: #666;
    }
    .login-link a {
      color: #3358aa;
      font-weight: 500;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
      .register-card {
        padding: 20px;
      }
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
          </li>
          <li>
            <a href="index.php" style="color:#fff;"><i class="fas fa-home"></i> Home</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Space so content isn't hidden under the navbar -->
  <div class="top-spacing"></div>

  <!-- Registration form -->
  <div class="register-card">
    <div class="register-header">
      <h2>Create Your Account</h2>
      <p>Join our platform to access teleconsultation services</p>
    </div>

    <form method="post" action="dashclient.php" class="register-form">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="fullname">Full Name</label>
            <input 
              type="text" 
              id="fullname" 
              name="fullname" 
              class="form-control"
            >
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="email">Email Address</label>
            <input 
              type="email" 
              id="email" 
              name="email" 
              class="form-control"
            >
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="phone">Phone Number</label>
            <input 
              type="tel" 
              id="phone" 
              name="phone" 
              class="form-control"
            >
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="username">Username</label>
            <input 
              type="text" 
              id="username" 
              name="username" 
              class="form-control"
            >
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="password">Password</label>
            <input 
              type="password" 
              id="password" 
              name="password" 
              class="form-control"
            >
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="confirm_password">Confirm Password</label>
            <input 
              type="password" 
              id="confirm_password" 
              name="confirm_password" 
              class="form-control"
            >
          </div>
        </div>
      </div>

      <div class="terms-checkbox">
        <div class="checkbox">
          <label>
            <input type="checkbox" name="terms">
            I agree to the <a href="terms.php" target="_blank">Terms and Conditions</a> and <a href="privacy.php" target="_blank">Privacy Policy</a>
          </label>
        </div>
      </div>

      <button type="submit" name="register" class="btn register-btn">
        <i class="fas fa-user-plus"></i> Register Now
      </button>

      <div class="login-link">
        Already have an account? <a href="login.php">Login here</a>
      </div>
    </form>
  </div>

  <!-- Footer -->
  <?php include 'footer.php'; ?>

  <!-- jQuery & Bootstrap JS (CDN) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>