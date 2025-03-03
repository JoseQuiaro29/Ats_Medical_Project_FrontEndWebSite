<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Doctor Dashboard | TeleConsultations</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Enlace a tu CSS general -->
  <link rel="stylesheet" href="../../css/styles.css">
  <style>
    /* Reset y estilos base */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f0f0f0;
    }
    /* HEADER */
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
      width: 50px; /* Adjust as needed */
      height: auto; /* Maintain aspect ratio */
      margin-right: 15px; /* Space between logo and title */
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
  <!-- HEADER -->
  <header>
    <div class="header-left">
      <button class="toggle-btn" id="toggle-btn">&#9776;</button>
      <img src="../../images/logo1.png" alt="Logo">
      <h1>TeleConsultations</h1>
    </div>
    <div class="header-right">
      <!-- Ajusta la ruta de la imagen según corresponda -->
      <img src="../../images/logoG.png" alt="User Image">
      <span>Dr. Manuel Garcia Estrada</span>
    </div>
  </header>
  <script>
    // Alterna el estado colapsado del sidebar y ajusta el contenido
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
