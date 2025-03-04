<?php
session_start();
// Validate client session if needed

// Include the header and sidebar
include 'cliheader.php';
include 'sidebar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Client Dashboard | TeleConsultations</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
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
    /* Content container starts below header (60px) and to the right of sidebar (220px) */
    .content {
      margin-left: 220px;
      padding: 80px 40px;
      transition: margin-left 0.3s ease;
    }
    .content.collapsed {
      margin-left: 70px;
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
      font-size: 2rem;
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
      font-size: 1.4rem;
      color: var(--secondary-color);
    }
    .card p {
      font-size: 1.1rem;
      margin: 0;
      color: #666;
    }
    @media (max-width: 768px) {
      .content {
        margin-left: 70px;
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
    <!-- Main Dashboard Container -->
    <div class="dashboard-main">
      <h2>Welcome, John Doe</h2>
      <p>Access your appointments, prescriptions, messages, and more easily.</p>
    </div>

    <!-- Quick Info Cards -->
    <div class="dashboard-grid">
      <div class="card" onclick="window.location.href='appointments.php'">
        <h3>My Appointments</h3>
        <p>View your scheduled visits</p>
      </div>
      <div class="card" onclick="window.location.href='book_appointment.php'">
        <h3>Book Appointment</h3>
        <p>Find and schedule a doctor</p>
      </div>
      <div class="card" onclick="window.location.href='chat.php'">
        <h3>Messages</h3>
        <p>2 New Messages</p>
      </div>
      <div class="card" onclick="window.location.href='prescriptions.php'">
        <h3>My Prescriptions</h3>
        <p>Check or request refills</p>
      </div>
    </div>

    <!-- Footer from doctor folder -->
    <?php include '../doctor/footer.php'; ?>
  </div>

  <!-- Optional: JS libraries -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
