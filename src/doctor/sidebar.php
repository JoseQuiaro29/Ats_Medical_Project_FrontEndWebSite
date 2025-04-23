
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar</title>
    <!-- Include Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <h3>Menu</h3>
            
        </div>
        <ul>
      <li>
        <a href="doctor_dashboard.php" class="<?php if (basename($_SERVER['PHP_SELF']) == 'doctor_dashboard.php') echo 'active'; ?>">
          <i class="fas fa-tachometer-alt"></i><span>Dashboard</span>
        </a>
      </li>
      <li>
        <a href="citas.php" class="<?php if (basename($_SERVER['PHP_SELF']) == 'citas.php') echo 'active'; ?>">
          <i class="fas fa-calendar-alt"></i><span>Appointments</span>
        </a>
      </li>
      <li>
        <a href="paciente.php" class="<?php if (basename($_SERVER['PHP_SELF']) == 'paciente.php') echo 'active'; ?>">
          <i class="fas fa-user-injured"></i><span>Patients</span>
        </a>
      </li>
      <li>
        <a href="consul.php" class="<?php if (basename($_SERVER['PHP_SELF']) == 'consul.php') echo 'active'; ?>">
          <i class="fas fa-video"></i><span>Tele Consultations</span>
        </a>
      </li>
      <li>
        <a href="recemedic.php" class="<?php if (basename($_SERVER['PHP_SELF']) == 'recemedic.php') echo 'active'; ?>">
          <i class="fas fa-prescription-bottle-alt"></i><span>Medical Prescriptions</span>
        </a>
      </li>
      <li>
        <a href="reportes.php" class="<?php if (basename($_SERVER['PHP_SELF']) == 'reportes.php') echo 'active'; ?>">
          <i class="fas fa-file-alt"></i><span>Reports</span>
        </a>
      </li>
      <li>
        <a href="setting.php" class="<?php if (basename($_SERVER['PHP_SELF']) == 'setting.php') echo 'active'; ?>">
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
    <script>
        const toggleBtnClient = document.getElementById('toggleSidebarBtn');
        const sidebarClient = document.getElementById('sidebar');
        
        toggleBtnClient.addEventListener('click', () => {
            sidebarClient.classList.toggle('collapsed');
        });
    </script>
</body>
</html>
