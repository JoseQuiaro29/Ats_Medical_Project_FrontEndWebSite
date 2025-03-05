<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Client Dashboard | TeleConsultations</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="../../css/clientDash.css">
  <link rel="stylesheet" href="../../css/sidebar.css"> <!-- Add this line -->

  
  <!-- Bootstrap (opcional si no lo tienes cargado en otro lugar) -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <style>
    /* Reset y estilos base */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    /* Include Doctor's Dashboard CSS Variables */
    :root {
      --primary-color: #20a967;
      --secondary-color: #2c3e50;
      --bg-color: #f4f7f9;
      --card-bg: #ffffff;
      --font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    body {
      font-family: var(--font-family);
      background-color: var(--bg-color);
    }
    /* HEADER */
    header {
      background-color: var(--primary-color); /* ocean-green 500 */
      color: #fff;
      padding: 10px 20px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      height: 60px;
      z-index: 1000;
      box-shadow: 0 2px 5px rgba(0,0,0,0.15);
    }
    .header-left {
      display: flex;
      align-items: center;
    }
    .header-left .toggle-btn {
      background: none;
      border: none;
      color: #fff;
      font-size: 2rem; /* Adjusted to match doctor's dashboard */
      cursor: pointer;
      margin-right: 15px;
    }
    .header-left img {
      width: 50px;
      height: auto;
      margin-right: 15px;
    }
    .header-left h1 {
      font-size: 2.5rem; /* Adjusted to match doctor's dashboard */
      font-weight: bold;
    }
    .header-right {
      display: flex;
      align-items: center;
    }
    .header-right img {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      object-fit: cover;
      margin-right: 10px;
    }
    .header-right span {
      font-size: 1.5rem; /* Adjusted to match doctor's dashboard */
    }
  </style>
</head>
<body>
  <!-- HEADER for Client Dashboard -->
  <header>
    <div class="header-left">
      <button class="toggle-btn" id="toggle-btn">&#9776;</button>
      <img src="../../images/logo1.png" alt="Logo">
      <h1>TeleConsultations</h1>
    </div>
    <div class="header-right">
      <!-- Client profile image and name -->
      <img src="../../images/user.svg" alt="Client Image">
      <span>Welcome, John Doe</span>
    </div>
  </header>
  <script>
    // Toggle sidebar (the sidebar should have id="sidebar")
    document.getElementById('toggle-btn').addEventListener('click', function() {
      var sidebar = document.getElementById('sidebar');
      var content = document.getElementById('content');
      if (sidebar && content) {
        sidebar.classList.toggle('collapsed');
        content.classList.toggle('collapsed');
      }
    });
  </script>
</body>
</html>
