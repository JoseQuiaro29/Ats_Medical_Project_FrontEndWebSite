<!-- sidebar.php -->
<!-- Incluye Font Awesome para los íconos -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<!-- REMOVE STYLE
<style>
  :root {
    --sidebar-width: 220px; 
    --sidebar-collapsed-width: 70px; 
    --primary-color: #79dca6; 
    --hover-color: #138852;   
    --text-color: #333;
    --transition-speed: 0.3s;
  }
  .sidebar {
    width: var(--sidebar-width);
    background-color: var(--primary-color);
    padding: 15px;
    height: calc(100vh - 60px); 
    position: fixed;
    top: 60px;
    left: 0;
    overflow-y: auto;
    transition: width var(--transition-speed) ease;
    border-right: 1px solid #ddd;
  }
  .sidebar.collapsed {
    width: var(--sidebar-collapsed-width);
  }
  .sidebar .sidebar-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 15px;
  }
  .sidebar .sidebar-header h3 {
    color: var(--text-color);
    margin: 0;
    font-size: 1.2em;
    transition: opacity var(--transition-speed) ease;
  }
  .sidebar.collapsed .sidebar-header h3 {
    opacity: 0;
  }
  .sidebar .toggle-btn {
    background: none;
    border: none;
    color: var(--text-color);
    font-size: 1.2em;
    cursor: pointer;
  }
  .sidebar ul {
    list-style: none;
    padding: 0;
    margin: 0;
  }
  .sidebar ul li {
    margin-bottom: 10px;
  }
  .sidebar ul li a {
    display: flex;
    align-items: center;
    text-decoration: none;
    color: var(--text-color);
    padding: 10px;
    border-radius: 4px;
    transition: background var(--transition-speed) ease, color var(--transition-speed) ease;
  }
  .sidebar ul li a:hover,
  .sidebar ul li a.active {
    background-color: var(--hover-color);
    color: #fff;
  }
  .sidebar ul li a i {
    margin-right: 10px;
    font-size: 1.2em;
  }
  .sidebar.collapsed ul li a {
    justify-content: center;
  }
  .sidebar.collapsed ul li a span {
    display: none;
  }
</style>-->
<div class="sidebar" id="sidebar">
  <div class="sidebar-header">
    <h3>Menu</h3>
    <button class="toggle-btn" id="toggleSidebarBtn"><i class="fas fa-bars"></i></button>
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
    <!-- New option for Tele Consultations -->
    
    <li>
      <a href="../../login.php">
        <i class="fas fa-sign-out-alt"></i><span>Logout</span>
      </a>
    </li>
  </ul>
</div>

<script>
  const toggleBtn = document.getElementById('toggleSidebarBtn');
  const sidebar = document.getElementById('sidebar');
  
  // Toggles the "collapsed" class to expand or collapse the sidebar
  toggleBtn.addEventListener('click', () => {
    sidebar.classList.toggle('collapsed');
  });
</script>
