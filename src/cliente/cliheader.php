<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Client Dashboard | TeleConsultations</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="../../css/styles.css">
  <link rel="stylesheet" href="../../css/clientDash.ccs">

  <!-- Bootstrap (opcional si no lo tienes cargado en otro lugar) -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <style>
    /* Base header styles for client */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f0f0f0;
    }
    header {
      background-color: #20a967; /* ocean-green 500 */
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
      font-size: 1.5rem;
      cursor: pointer;
      margin-right: 15px;
    }
    .header-left img {
      width: 50px;
      height: auto;
      margin-right: 15px;
    }
    .header-left h1 {
      font-size: 1.5rem;
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
      font-size: 1rem;
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
      <img src="../../images/logo.png" alt="Client Image">
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
