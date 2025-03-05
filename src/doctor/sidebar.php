<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Sidebar Example | TeleConsultations</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Enlace a Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  
  <!-- Puedes incluir aquí tu hoja de estilos general o inline styles -->
  
</head>
<body>
  <!-- SIDEBAR -->
  <div class="sidebar" id="sidebar">
    <div class="sidebar-header">
      <h3>Menu</h3>
      <!-- Podrías colocar aquí un botón para colapsar la sidebar, si lo deseas -->
      <!-- <button id="toggleSidebarBtn">Toggle</button> -->
    </div>
    <ul>
      <li>
        <a href="doctor_dashboard.php" class="active">
          <i class="fas fa-tachometer-alt"></i><span>Dashboard</span>
        </a>
      </li>
      <li>
        <a href="citas.php">
          <i class="fas fa-calendar-alt"></i><span>Appointments</span>
        </a>
      </li>
      <li>
        <a href="paciente.php">
          <i class="fas fa-user-injured"></i><span>Patients</span>
        </a>
      </li>
      <li>
        <a href="chat.php">
          <i class="fas fa-comments"></i><span>Chat</span>
        </a>
      </li>
      <li>
        <a href="consul.php">
          <i class="fas fa-video"></i><span>Tele Consultations</span>
        </a>
      </li>
      <li>
        <a href="recemedic.php">
          <i class="fas fa-prescription-bottle-alt"></i><span>Medical Prescriptions</span>
        </a>
      </li>
      <li>
        <a href="reportes.php">
          <i class="fas fa-file-alt"></i><span>Reports</span>
        </a>
      </li>
      <li>
        <a href="notificaciones.php">
          <i class="fas fa-bell"></i><span>Notifications</span>
        </a>
      </li>
      <li>
        <a href="setting.php">
          <i class="fas fa-cog"></i><span>Settings</span>
        </a>
      </li>
      <li>
        <a href="../../login.php">
          <i class="fas fa-sign-out-alt"></i><span>Logout</span>
        </a>
      </li>
    </ul>
  </div>
  
  <!-- Botón para alternar la barra lateral (opcional) -->
  <button id="toggleSidebarBtn">Toggle</button>

  <!-- Scripts -->
  <script>
    const toggleBtn = document.getElementById('toggleSidebarBtn');
    const sidebar = document.getElementById('sidebar');
    
    // Toggles the "collapsed" class to expand or collapse the sidebar
    toggleBtn.addEventListener('click', () => {
      sidebar.classList.toggle('collapsed');
    });
  </script>
</body>
</html>
