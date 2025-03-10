<?php
// patients.php
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

/* Contenedor de pacientes */
.patients-container {
  background: var(--card-bg);
  padding: 30px;
  border-radius: 10px;
  box-shadow: 0 4px 12px rgba(0,0,0,0.1);
  max-width: 1200px;
  margin: 0 auto;
}

.patients-header {
  margin-bottom: 20px;
  font-size: 1.5rem;
}

.patients-header h2 {
  color: var(--secondary-color);
}

.patients-header p {
  color: #666;
}

/* Filtros de búsqueda */
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
}

.patients-filters button {
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  color: #fff;
  cursor: pointer;
}

.patients-filters button:first-of-type {
  background-color: var(--primary-color);
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
  <div class="patients-container">
    <div class="patients-header">
      <h2>Patients List</h2>
      <p>Manage the details and appointments of your registered patients.</p>
    </div>

    <div class="patients-filters">
      <input type="text" placeholder="Search by name, email, or phone...">
      <button>Search</button>
      <button>Add Patient</button>
    </div>

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

  <?php include 'footer.php'; ?>
</div>
