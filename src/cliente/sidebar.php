<!-- sidebar.php for Client -->
<!-- Include Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<style>
  :root {
    --sidebar-width: 220px; /* Full width when expanded */
    --sidebar-collapsed-width: 70px; /* Width when collapsed */
    --primary-color: #20a967; /* ocean-green 300 */
    --hover-color: #138852;   /* ocean-green 600 */
    --text-color: #333;
    --transition-speed: 0.3s;
  }
  .sidebar {
    width: var(--sidebar-width);
    background-color: var(--primary-color);
    padding: 15px;
    /* Position fixed below header of 60px */
    position: fixed;
    top: 60px;
    left: 0;
    height: calc(100vh - 60px); /* Full height minus header */
    overflow-y: auto;
    transition: width var(--transition-speed) ease;
    border-right: 1px solid #ddd;
    z-index: 999;
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
</style>

<div class="sidebar" id="sidebar">
  <div class="sidebar-header">
    <h3>Menu</h3>
    <button class="toggle-btn" id="toggleSidebarBtn"><i class="fas fa-bars"></i></button>
  </div>
  <ul>
    <li>
      <a href="cliente_dashboard.php" class="active">
        <i class="fas fa-tachometer-alt"></i><span>Dashboard</span>
      </a>
    </li>
    <li>
      <a href="appointments.php">
        <i class="fas fa-calendar-alt"></i><span>My Appointments</span>
      </a>
    </li>
    <li>
      <a href="book_appointment.php">
        <i class="fas fa-plus-circle"></i><span>Book Appointment</span>
      </a>
    </li>
    <li>
      <a href="prescriptions.php">
        <i class="fas fa-prescription-bottle-alt"></i><span>My Prescriptions</span>
      </a>
    </li>
    <li>
      <a href="chat.php">
        <i class="fas fa-comments"></i><span>Chat</span>
      </a>
    </li>
    <li>
      <a href="notifications.php">
        <i class="fas fa-bell"></i><span>Notifications</span>
      </a>
    </li>
    <li>
      <a href="settings.php">
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
