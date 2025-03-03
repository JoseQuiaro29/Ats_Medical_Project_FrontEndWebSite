<?php
// doctor_dashboard.php
session_start();
// Validate session and permissions here
include 'docheader.php'; // Header file, includes meta tags, CSS links, etc.
include 'sidebar.php';   // Dashboard sidebar
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Doctor Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    /* Color and typography variables */
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
      margin: 0;
      padding: 0;
    }
    /* Main content container */
    .content {
      margin-left: 240px;
      padding: 80px 40px;
      transition: margin-left 0.3s ease;
    }
    .content.collapsed {
      margin-left: 80px;
    }
    /* Main dashboard container */
    .dashboard-main {
      background: var(--card-bg);
      padding: 30px;
      margin-bottom: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    .dashboard-main h2 {
      margin-top: 0;
      font-size: 2rem;
      color: var(--secondary-color);
    }
    /* Grid for quick info cards */
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
      font-size: 1.4rem;
      color: var(--secondary-color);
    }
    .card p {
      font-size: 1.1rem;
      margin: 0;
      color: #666;
    }
    /* Table styles for teleconsultations */
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }
    table th, table td {
      padding: 15px 10px;
      text-align: left;
      border-bottom: 1px solid #e0e0e0;
    }
    table th {
      background: var(--primary-color);
      color: #fff;
      font-weight: normal;
      font-size: 1rem;
    }
    table tbody tr:hover {
      background: #f1f1f1;
    }
    /* Footer */
    footer {
      background: var(--primary-color);
      color: #fff;
      text-align: center;
      padding: 20px 10px;
      margin-top: 30px;
      border-top: 3px solid #1e8e5d;
    }
    .footer-content {
      max-width: 1200px;
      margin: 0 auto;
    }
    /* Responsiveness */
    @media (max-width: 768px) {
      .content {
        margin-left: 80px;
        padding: 60px 20px;
      }
      .dashboard-main h2 {
        font-size: 1.8rem;
      }
    }
  </style>
</head>
<body>
  <div class="content" id="content">
    <!-- Main Dashboard Header -->
    <div class="dashboard-main">
      <h2>Welcome, Dr. Manuel Garcia Estrada</h2>
      <p>Access your appointments, reports, messages, and patients quickly and easily.</p>
    </div>

    <!-- Quick info cards -->
    <div class="dashboard-grid">
      <div class="card" onclick="window.location.href='citas.php'">
        <h3>Today's Appointments</h3>
        <p>15 Scheduled Appointments</p>
      </div>
      <div class="card" onclick="window.location.href='reportes.php'">
        <h3>Pending Reports</h3>
        <p>3 Reports to Review</p>
      </div>
      <div class="card" onclick="window.location.href='mensajes.php'">
        <h3>New Messages</h3>
        <p>8 Unread Messages</p>
      </div>
      <div class="card" onclick="window.location.href='pacientes.php'">
        <h3>Active Patients</h3>
        <p>24 Registered Patients</p>
      </div>
    </div>

    <!-- Upcoming teleconsultations -->
    <div class="dashboard-main">
      <h3>Upcoming Teleconsultations</h3>
      <table>
        <thead>
          <tr>
            <th>Time</th>
            <th>Patient</th>
            <th>Specialty</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>10:00 AM</td>
            <td>John Perez</td>
            <!-- Reemplazamos Cardiología por una de las dos especialidades -->
            <td>Nephrology</td>
            <td>Confirmed</td>
          </tr>
          <tr>
            <td>11:30 AM</td>
            <td>Mary Lopez</td>
            <!-- Reemplazamos Neurología por la otra especialidad -->
            <td>General Medicine</td>
            <td>Pending</td>
          </tr>
          <!-- More rows can be dynamically generated here -->
        </tbody>
      </table>
    </div>

    <!-- Footer -->
    <?php include 'footer.php'; ?>
  </div>

  <!-- Sidebar toggle script (if needed) -->
  <script>
    // Function to collapse or expand the sidebar
    function toggleSidebar() {
      document.getElementById('content').classList.toggle('collapsed');
    }
    // Example: add a listener to a toggle button (make sure to have it in the header)
    document.getElementById('toggleSidebarBtn')?.addEventListener('click', toggleSidebar);
  </script>
</body>
</html>
