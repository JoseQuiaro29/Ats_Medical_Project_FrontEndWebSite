<!-- header.php -->
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
</head>
<body>
  <!-- Navigation Bar -->
  <nav class="navbar navbar-default navbar-fixed-top" style="background-color: #20a967; border-color: #3a8a7e;">
    <div class="container">
      <div class="navbar-header">
        <!-- Mobile menu toggle button -->
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
          <span class="icon-bar" style="background-color:#fff;"></span>
          <span class="icon-bar" style="background-color:#fff;"></span>
          <span class="icon-bar" style="background-color:#fff;"></span>
        </button>
        <a class="navbar-brand" href="index.php" style="color:#fff; display: flex; align-items: center;">
          <img src="images/logo1.png" alt="Logo" style="width: 40px; height: 40px; margin-right: 10px;">
          <strong>TeleConsultations</strong>
        </a>
      </div>

      <!-- header.php (fragment) -->
<ul class="nav navbar-nav navbar-right">
  <li><a href="index.php" style="color:#fff;">Home</a></li>
  <li><a href="departments.php" style="color:#fff;">Departments</a></li>
  <!-- Remove or comment out the Services link -->
  <!-- <li><a href="#" style="color:#fff;">Services</a></li> -->

  <!-- Add the Sure link -->
  <li><a href="sure.php" style="color:#fff;">Sure</a></li>

  <li><a href="about.php" style="color:#fff;">About</a></li>
  <li><a href="contact.php" style="color:#fff;">Contact</a></li>
  <li><a href="login.php" style="color:#fff;">Sign in</a></li>
</ul>

      </div>
    </div>
  </nav>

  <!-- Spacer to avoid content being hidden behind the navbar -->
  <div style="margin-top: 70px;"></div>
