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

<?php include '../doctor/footer.php'; ?>

<!-- jQuery & Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
