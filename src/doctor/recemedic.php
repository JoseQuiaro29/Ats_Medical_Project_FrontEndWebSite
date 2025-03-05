
<?php
// remedic.php
session_start();
include 'docheader.php';
include 'sidebar.php';
?>

<style>
/* Contenedor principal */
.content {
  padding-top: 80px;
  margin-left: 220px;
  transition: margin-left 0.3s ease;
}

/* Contenedor de la sección de recetas médicas */
.recemedic-container {
  background-color: #fff;
  padding: 30px;
  margin: 20px auto;
  border-radius: 8px;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
  max-width: 1200px;
}

/* Encabezado de la sección */
.recemedic-header {
  margin-bottom: 20px;
  font-size: 1.5rem;
}

.recemedic-header h2 {
  color: #2c3e50;
}

.recemedic-header p {
  color: #666;
}

/* Filtros de búsqueda y botones */
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
  background-color: #20a967;
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
  background-color: #20a967;
  color: #fff;
}

th, td {
  padding: 12px 8px;
  text-align: left;
  font-size: 1.5rem;
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
  color: #20a967;
}

.action-links .edit {
  color: #3498db;
}

.action-links .delete {
  color: #e74c3c;
}
</style>

<!-- Contenedor principal -->
<div class="content" id="content">
  <!-- Contenedor de la sección de recetas médicas -->
  <div class="recemedic-container">
    <!-- Encabezado de la sección -->
    <div class="recemedic-header">
      <h2>Medical Prescriptions</h2>
      <p>Manage medical prescriptions for the specialties of Nephrology and General Medicine.</p>
    </div>

    <!-- Filtros de búsqueda y botón de agregar receta -->
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

    <!-- Tabla de recetas médicas -->
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
        <!-- Receta 1 -->
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
        <!-- Receta 2 -->
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
        <!-- Receta 3 -->
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
