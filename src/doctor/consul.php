<?php
// consul.php
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

/* Contenedor de teleconsultas */
.teleconsult-container {
  background: var(--card-bg);
  padding: 30px;
  border-radius: 10px;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
  max-width: 1200px;
  margin: 0 auto;
}

.teleconsult-header {
  margin-bottom: 20px;
  font-size: 1.5rem;
}

.teleconsult-header h2 {
  color: var(--secondary-color);
}

.teleconsult-header p {
  color: #666;
}

/* Filtros de búsqueda */
.teleconsult-filters {
  margin-bottom: 20px;
  display: flex;
  flex-wrap: wrap;
  align-items: center;
}

.teleconsult-filters input {
  padding: 10px;
  width: 300px;
  border: 1px solid #ddd;
  border-radius: 4px;
}

.teleconsult-filters button {
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  color: #fff;
  cursor: pointer;
}

.teleconsult-filters button:first-of-type {
  background-color: var(--primary-color);
}

.teleconsult-filters button:last-of-type {
  background-color: #3498db;
  margin-left: auto;
}

/* Tabla de teleconsultas */
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

/* Botones de acción */
tbody button {
  padding: 8px 12px;
  background-color: var(--primary-color);
  border: none;
  border-radius: 4px;
  color: #fff;
  cursor: pointer;
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
  <div class="teleconsult-container">
    <div class="teleconsult-header">
      <h2>Tele Consultations</h2>
      <p>Manage and initiate teleconsultation sessions with your patients.</p>
    </div>

    <div class="teleconsult-filters">
      <input type="text" placeholder="Search by patient, date...">
      <button>Search</button>
      <button>New Teleconsultation</button>
    </div>

    <table>
      <thead>
        <tr>
          <th>Time</th>
          <th>Patient</th>
          <th>Specialty</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>10:00 AM</td>
          <td>John Doe</td>
          <td>Nephrology</td>
          <td>Confirmed</td>
          <td>
            <button>
              <i class="fas fa-video"></i> Start Call
            </button>
          </td>
        </tr>
        <tr>
          <td>11:30 AM</td>
          <td>Mary Smith</td>
          <td>General Medicine</td>
          <td>Pending</td>
          <td>
            <button>
              <i class="fas fa-video"></i> Start Call
            </button>
          </td>
        </tr>
        <tr>
          <td>02:00 PM</td>
          <td>Carlos Martinez</td>
          <td>General Medicine</td>
          <td>Confirmed</td>
          <td>
            <button>
              <i class="fas fa-video"></i> Start Call
            </button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>

  <?php include 'footer.php'; ?>
</div>
