<?php
// citas.php
session_start();
// Include header (docheader.php) which contains meta tags, CSS links, etc.
include 'docheader.php';
// Include the sidebar for navigation
include 'sidebar.php';
?>

<style>
/* Main content container */
.content {
  padding-top: 80px; /* Space to prevent content from being hidden behind the fixed header */
  margin-left: 220px; /* Left margin according to the sidebar's expanded width */
  transition: margin-left 0.3s ease;
}

/* Appointments container */
.appointments-container {
  background-color: #fff;
  padding: 30px;
  margin: 20px auto;
  border-radius: 8px;
  box-shadow: 0 4px 12px rgba(0,0,0,0.1);
  max-width: 1200px;
}

/* Appointments header */
.appointments-header {
  margin-bottom: 20px;
}

.appointments-header h2 {
  color: #2c3e50;
}

.appointments-header p {
  color: #666;
}

/* Search filter */
.appointments-filters {
  margin-bottom: 20px;
}

.appointments-filters input {
  padding: 10px;
  width: 300px;
  border: 1px solid #ddd;
  border-radius: 4px;
}

.appointments-filters button {
  padding: 10px 20px;
  background-color: #20a967;
  border: none;
  border-radius: 4px;
  color: #fff;
  margin-left: 10px;
  cursor: pointer;
}

/* Table styling */
table {
  width: 100%;
  border-collapse: collapse;
}

thead tr {
  background-color: #20a967;
  color: #fff;
}

th, td {
  padding: 12px 8px;
  text-align: left;
  font-size: 1.5rem; /* agregado para aumentar el tamaño de fuente */
}

tbody tr {
  border-bottom: 1px solid #ddd;
}

a {
  text-decoration: none;
}

a.view-link {
  color: #20a967;
  margin-right: 10px;
}

a.cancel-link {
  color: #e74c3c;
}
</style>

<!-- Main content container -->
<div class="content" id="content">
  <!-- Appointments container with card design -->
  <div class="appointments-container">
    <!-- Header for the appointments section -->
    <div style="font-size: 1.5rem" class="appointments-header">
      <h2>Scheduled Appointments</h2>
      <p>View and manage your teleconsultation appointments.</p>
    </div>

    <!-- Search filter (optional) -->
    <div class="appointments-filters">
      <input type="text" placeholder="Search by patient, specialty...">
      <button>Search</button>
    </div>

    <!-- Appointments table -->
    <table>
      <!-- Table header -->
      <thead>
        <tr>
          <th>Time</th>
          <th>Patient</th>
          <th>Specialty</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <!-- Table body with example appointments -->
      <tbody>
        <tr>
          <td>09:00 AM</td>
          <td>John Perez</td>
          <td>Nephrology</td>
          <td>Confirmed</td>
          <td>
            <a href="#" class="view-link">View</a>
            <a href="#" class="cancel-link">Cancel</a>
          </td>
        </tr>
        <tr>
          <td>10:30 AM</td>
          <td>Mary Lopez</td>
          <td>General Medicine</td>
          <td>Pending</td>
          <td>
            <a href="#" class="view-link">View</a>
            <a href="#" class="cancel-link">Cancel</a>
          </td>
        </tr>
        <tr>
          <td>02:00 PM</td>
          <td>Carlos Martinez</td>
          <td>Nephrology</td>
          <td>Confirmed</td>
          <td>
            <a href="#" class="view-link">View</a>
            <a href="#" class="cancel-link">Cancel</a>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  <!-- Include the footer -->
  <?php include 'footer.php'; ?>
</div>
