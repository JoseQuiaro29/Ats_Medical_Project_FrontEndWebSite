<?php
// patients.php
session_start();
include 'docheader.php';  // Contiene el <head> y el header de la página
include 'sidebar.php';    // Contiene la navegación lateral
?>

<style>
/* Contenedor principal */
.content {
  padding-top: 80px;
  margin-left: 220px;
  transition: margin-left 0.3s ease;
}

/* Contenedor de la sección de pacientes */
.patients-container {
  background-color: #fff;
  padding: 30px;
  margin: 20px auto;
  border-radius: 8px;
  box-shadow: 0 4px 12px rgba(0,0,0,0.1);
  max-width: 1200px;
}

/* Encabezado de la sección */
.patients-header {
  margin-bottom: 20px;
}

.patients-header h2 {
  color: #2c3e50;
}

.patients-header p {
  color: #666;
}

/* Filtros de búsqueda y botones */
.patients-filters {
  margin-bottom: 20px;
  display: flex;
  flex-wrap: wrap;
  align-items: center;
}

.patients-filters input {
  padding: 10px;
  width: 300px;
  border: 1px solid #ddd;
  border-radius: 4px;
  margin-right: 10px;
}

.patients-filters button {
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  color: #fff;
  cursor: pointer;
}

.patients-filters button:first-of-type {
  background-color: #20a967;
}

.patients-filters button:last-of-type {
  background-color: #3498db;
  margin-left: auto;
}

/* Tabla de pacientes */
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
  font-size: 1.5rem; // agregado para aumentar el tamaño de fuente
}

tbody tr {
  border-bottom: 1px solid #ddd;
}

/* Imagen de perfil */
.profile-img {
  width: 40px;
  height: 40px;
  border-radius: 50%;
  object-fit: cover;
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
  <!-- Contenedor de la sección de pacientes -->
  <div class="patients-container">
    <!-- Encabezado de la sección -->
    <div style="font-size: 1.5rem" class="patients-header">
      <h2>Patients List</h2>
      <p>Manage the details and appointments of your registered patients.</p>
    </div>

    <!-- Filtros de búsqueda y botón de agregar paciente -->
    <div class="patients-filters">
      <input type="text" placeholder="Search by name, email, or phone...">
      <button>Search</button>
      <button>Add Patient</button>
    </div>

    <!-- Tabla de pacientes -->
    <table>
      <thead>
        <tr>
          <th>Photo</th>
          <th>Name</th>
          <th>Age</th>
          <th>Gender</th>
          <th>Phone</th>
          <th>Email</th>
          <th>Last Consultation</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <!-- Paciente 1 -->
        <tr>
          <td><img src="path/to/patient1.jpg" alt="Patient 1" class="profile-img"></td>
          <td>John Perez</td>
          <td>35</td>
          <td>Male</td>
          <td>305-123-4567</td>
          <td>john@example.com</td>
          <td>2025-02-10</td>
          <td class="action-links">
            <a href="#" class="view">View</a>
            <a href="#" class="edit">Edit</a>
            <a href="#" class="delete">Delete</a>
          </td>
        </tr>
        <!-- Paciente 2 -->
        <tr>
          <td><img src="path/to/patient2.jpg" alt="Patient 2" class="profile-img"></td>
          <td>Mary Lopez</td>
          <td>42</td>
          <td>Female</td>
          <td>305-987-6543</td>
          <td>mary@example.com</td>
          <td>2025-01-28</td>
          <td class="action-links">
            <a href="#" class="view">View</a>
            <a href="#" class="edit">Edit</a>
            <a href="#" class="delete">Delete</a>
          </td>
        </tr>
        <!-- Paciente 3 -->
        <tr>
          <td><img src="path/to/patient3.jpg" alt="Patient 3" class="profile-img"></td>
          <td>Carlos Martinez</td>
          <td>29</td>
          <td>Male</td>
          <td>305-456-7890</td>
          <td>carlos@example.com</td>
          <td>2025-03-05</td>
          <td class="action-links">
            <a href="#" class="view">View</a>
            <a href="#" class="edit">Edit</a>
            <a href="#" class="delete">Delete</a>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  <!-- Incluir el footer -->
  <?php include 'footer.php'; ?>
</div>
