<?php
session_start();
include 'cliheader.php';
include 'sidebar.php';
?>
<!-- Comienza el Dashboard: se encapsula todo dentro de .dashboard -->
<div class="dashboard">
  <!-- Contenedor principal -->
  <div class="content" id="content">
    <!-- Tarjeta de bienvenida -->
    <div class="dashboard-main">
      <h2>Welcome, John Doe</h2>
      <p>Access your appointments, prescriptions, messages, and more – all in one place.</p>
      
      <!-- Quick Stats -->
      <div class="dashboard-grid">
        <div class="card" onclick="window.location.href='appointments.php'">
          <i class="fa fa-calendar"></i>
          <h3>Upcoming Appointments</h3>
          <p>3 in the next 7 days</p>
        </div>
        <div class="card" onclick="window.location.href='prescriptions.php'">
          <i class="fa fa-medkit"></i>
          <h3>Prescriptions</h3>
          <p>2 Active / 1 Expired</p>
        </div>
        <div class="card" onclick="window.location.href='chat.php'">
          <i class="fa fa-comments"></i>
          <h3>Messages</h3>
          <p>2 Unread</p>
        </div>
      </div>
    </div>


    <!-- Panel de actividad reciente -->
    <div class="dashboard-activity">
      <h3>Recent Activity</h3>
      <ul>
        <li><span>March 08, 2025</span> – You booked an appointment with Dr. Manuel Garcia Estrada.</li>
        <li><span>March 06, 2025</span> – You requested a refill for Metformin.</li>
        <li><span>March 05, 2025</span> – You received a new message from Dr. Manuel Garcia Estrada.</li>
      </ul>
    </div>
  </div>
</div>

<style>
  .dashboard {
    font-family: var(--font-family);
  }
  .content {
    margin-left: 240px; /* Adjust as needed to match doctor's dashboard */
    padding: 80px 40px; /* Adjust as needed */
  }
  .dashboard-main {
    background: var(--card-bg);
    padding: 30px;
    margin-bottom: 30px;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
  }
  .dashboard-main h2 {
    margin-top: 0;
    font-size: 2.5rem; /* Adjusted to match doctor's dashboard */
    color: var(--secondary-color);
  }
  .dashboard-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
    gap: 20px;
    margin-top: 20px;
  }
  .card {
    background: var(--card-bg);
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    cursor: pointer;
  }
  .card:hover {
    transform: translateY(-4px);
    box-shadow: 0 4px 16px rgba(0,0,0,0.15);
  }
  .card h3 {
    margin: 0 0 10px;
    font-size: 1.6rem; /* Adjusted to match doctor's dashboard */
    color: var(--secondary-color);
  }
  .card p {
    font-size: 1.2rem; /* Adjusted to match doctor's dashboard */
    margin: 0;
    color: #666;
  }
  .dashboard-activity {
    background: var(--card-bg);
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
  }
  .dashboard-activity h3 {
    margin-top: 0;
    font-size: 1.6rem; /* Adjusted to match doctor's dashboard */
    color: var(--secondary-color);
  }
  .dashboard-activity ul {
    list-style: none;
    padding: 0;
  }
  .dashboard-activity li {
    padding: 10px 0;
    border-bottom: 1px solid #eee;
  }
  .dashboard-activity li:last-child {
    border-bottom: none;
  }
  .dashboard-activity span {
    color: #777;
    font-size: 1.1rem; /* Adjusted to match doctor's dashboard */
  }
</style>

<?php include '../doctor/footer.php'; ?>

<!-- jQuery & Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
