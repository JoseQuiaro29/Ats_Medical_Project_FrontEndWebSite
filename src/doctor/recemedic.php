<?php
// remedic.php
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

/* Contenedor de recetas médicas */
.recemedic-container {
  background: var(--card-bg);
  padding: 30px;
  border-radius: 10px;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
  max-width: 1200px;
  margin: 0 auto;
}

.recemedic-header {
  margin-bottom: 20px;
  font-size: 1.5rem;
}

.recemedic-header h2 {
  color: var(--secondary-color);
}

.recemedic-header p {
  color: #666;
}

/* Filtros de búsqueda */
.recemedic-filters {
  margin-bottom: 20px;
  display: flex;
  flex-wrap: wrap;
  align-items: center;
}

.recemedic-filters input,
.recemedic-filters select {
  padding: 10px;
  width: 300px;
  border: 1px solid #ddd;
  border-radius: 4px;
  margin-right: 10px;
}

.recemedic-filters button {
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  color: #fff;
  cursor: pointer;
}

.recemedic-filters button:first-of-type {
  background-color: var(--primary-color);
}

.recemedic-filters button:last-of-type {
  background-color: #3498db;
  margin-left: auto;
}

/* Tabla de recetas médicas */
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

.action-links .edit {
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
  <div class="recemedic-container">
    <div class="recemedic-header">
      <h2>Medical Prescriptions</h2>
      <p>Manage medical prescriptions for the specialties of Nephrology and General Medicine.</p>
    </div>

    <div class="recemedic-filters">
      <input type="text" placeholder="Search by patient or medication...">
      <select>
        <option value="">All Specialties</option>
        <option value="nephrology">Nephrology</option>
        <option value="general_medicine">General Medicine</option>
      </select>
      <button>Search</button>
      <button>Add Prescription</button>
    </div>

    <table>
      <thead>
        <tr>
          <th>Date</th>
          <th>Patient</th>
          <th>Specialty</th>
          <th>Medication</th>
          <th>Dose</th>
          <th>Instructions</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>2025-04-10</td>
          <td>Ana Gonzalez</td>
          <td>Nephrology</td>
          <td>Losartan</td>
          <td>50 mg</td>
          <td>Take 1 tablet daily</td>
          <td class="action-links">
            <a href="#" class="view">View</a>
            <a href="#" class="edit">Edit</a>
            <a href="#" class="delete">Delete</a>
          </td>
        </tr>
        <tr>
          <td>2025-04-11</td>
          <td>Luis Ramirez</td>
          <td>General Medicine</td>
          <td>Paracetamol</td>
          <td>500 mg</td>
          <td>Take 1 tablet every 8 hours</td>
          <td class="action-links">
            <a href="#" class="view">View</a>
            <a href="#" class="edit">Edit</a>
            <a href="#" class="delete">Delete</a>
          </td>
        </tr>
        <tr>
          <td>2025-04-12</td>
          <td>Maria Fernandez</td>
          <td>Nephrology</td>
          <td>Erythropoietin</td>
          <td>10,000 UI</td>
          <td>Administer subcutaneous injection weekly</td>
          <td class="action-links">
            <a href="#" class="view">View</a>
            <a href="#" class="edit">Edit</a>
            <a href="#" class="delete">Delete</a>
          </td>
        </tr>
      </tbody>
    </table>
  </div>

  <?php include 'footer.php'; ?>
</div>
