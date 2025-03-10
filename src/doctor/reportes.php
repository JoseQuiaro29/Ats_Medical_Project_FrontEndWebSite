<?php
// reportes.php
session_start();
include 'docheader.php';
include 'sidebar.php';
?>

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

/* Contenedor principal */
.content {
  margin-left: 220px; /* Sidebar expandido */
  padding: 80px 40px 80px;
  transition: margin-left 0.3s ease;
}

/* Cuando el sidebar está colapsado */
.content.collapsed {
  margin-left: 70px;
}

/* Contenedor de reportes */
.reports-container {
  background: var(--card-bg);
  padding: 30px;
  border-radius: 10px;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
  max-width: 1200px;
  margin: 0 auto;
}

.reports-header {
  margin-bottom: 20px;
  font-size: 1.5rem;
}

.reports-header h2 {
  color: var(--secondary-color);
}

.reports-header p {
  color: #666;
}

/* Filtros de búsqueda */
.reports-filters {
  margin-bottom: 20px;
  display: flex;
  flex-wrap: wrap;
  align-items: center;
}

.reports-filters input,
.reports-filters select {
  padding: 10px;
  width: 300px;
  border: 1px solid #ddd;
  border-radius: 4px;
  margin-right: 10px;
}

.reports-filters button {
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  color: #fff;
  cursor: pointer;
}

.reports-filters button:first-of-type {
  background-color: var(--primary-color);
}

.reports-filters button:last-of-type {
  background-color: #3498db;
  margin-left: auto;
}

/* Tabla de reportes */
table {
  width: 100%;
  border-collapse: collapse;
}

thead tr {
  background-color: var(--primary-color);
  color: #fff;
}

th, td {
  padding: 12px 8px;
  text-align: left;
  font-size: 1.2rem;
}

tbody tr {
  border-bottom: 1px solid #ddd;
}

/* Enlaces de acción */
.action-links a {
  text-decoration: none;
  margin-right: 10px;
}

.action-links .view {
  color: var(--primary-color);
}

.action-links .download {
  color: #3498db;
}

.action-links .delete {
  color: #e74c3c;
}

/* Estilos responsivos */
@media (max-width: 768px) {
  .content {
    margin-left: 70px;
    padding: 60px 20px 80px;
  }
}
</style>

<script>
document.addEventListener("DOMContentLoaded", function () {
  var content = document.getElementById("content");
  var sidebar = document.querySelector(".sidebar");

  function adjustContent() {
    if (document.body.classList.contains("sidebar-collapsed")) {
      content.classList.add("collapsed");
    } else {
      content.classList.remove("collapsed");
    }
  }

  // Verificar si el sidebar ya está colapsado al cargar
  adjustContent();

  // Escuchar eventos para ajustar el contenido cuando el sidebar cambia
  sidebar.addEventListener("click", function () {
    document.body.classList.toggle("sidebar-collapsed");
    adjustContent();
  });
});
</script>

<div class="content" id="content">
  <div class="reports-container">
    <div class="reports-header">
      <h2>Reports</h2>
      <p>View and manage the reports generated by the platform.</p>
    </div>

    <div class="reports-filters">
      <input type="text" placeholder="Search by title or description...">
      <select>
        <option value="">All statuses</option>
        <option value="pending">Pending</option>
        <option value="processed">Processed</option>
        <option value="resolved">Resolved</option>
      </select>
      <button>Search</button>
      <button>Generate Report</button>
    </div>

    <table>
      <thead>
        <tr>
          <th>Date</th>
          <th>Title</th>
          <th>Description</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>2025-04-10</td>
          <td>Appointment Report</td>
          <td>List of confirmed and pending appointments.</td>
          <td>Processed</td>
          <td class="action-links">
            <a href="#" class="view">View</a>
            <a href="#" class="download">Download</a>
            <a href="#" class="delete">Delete</a>
          </td>
        </tr>
        <tr>
          <td>2025-04-11</td>
          <td>Patient Report</td>
          <td>Summary of new patients and follow-ups.</td>
          <td>Pending</td>
          <td class="action-links">
            <a href="#" class="view">View</a>
            <a href="#" class="download">Download</a>
            <a href="#" class="delete">Delete</a>
          </td>
        </tr>
        <tr>
          <td>2025-04-12</td>
          <td>Prescription Report</td>
          <td>Report of prescriptions generated by specialty.</td>
          <td>Resolved</td>
          <td class="action-links">
            <a href="#" class="view">View</a>
            <a href="#" class="download">Download</a>
            <a href="#" class="delete">Delete</a>
          </td>
        </tr>
      </tbody>
    </table>
  </div>

  <?php include 'footer.php'; ?>
</div>
