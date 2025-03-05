<?php
// consul.php
session_start();
// Incluimos el header y sidebar (ajusta la ruta si tus archivos están en otra carpeta)
include 'docheader.php';  // Contiene el <head> y el header
include 'sidebar.php';    // Menú lateral
?>

<style>
/* Contenedor principal del contenido */
.content {
  padding-top: 80px; /* Espacio superior para evitar superposición con el header */
  margin-left: 220px; /* Ajusta según el ancho del sidebar expandido */
  transition: margin-left 0.3s ease;
}

/* Contenedor de la sección de Tele Consultations */
.teleconsult-container {
  background-color: #fff;
  padding: 30px;
  margin: 20px auto;
  border-radius: 8px;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
  max-width: 1200px;
}

/* Encabezado de la sección */
.teleconsult-header {
  margin-bottom: 20px;
}

.teleconsult-header h2 {
  color: #2c3e50;
}

.teleconsult-header p {
  color: #666;
}

/* Filtros de búsqueda y botón de acción */
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
  margin-right: 10px;
}

.teleconsult-filters button {
  padding: 10px 20px;
  background-color: #20a967;
  border: none;
  border-radius: 4px;
  color: #fff;
  margin-right: 10px;
  cursor: pointer;
}

.teleconsult-filters button:last-of-type {
  background-color: #3498db;
  margin-left: auto;
}

/* Tabla de teleconsultas programadas */
table {
  width: 100%;
  border-collapse: collapse;
}

thead tr {
  background-color: #20a967;
  color: #fff;
}

th,
td {
  padding: 12px 8px;
  text-align: left;
  font-size: 1.5rem; /* agregado para aumentar el tamaño de fuente */
}

tbody tr {
  border-bottom: 1px solid #ddd;
}

tbody button {
  padding: 8px 12px;
  background-color: #20a967;
  border: none;
  border-radius: 4px;
  color: #fff;
  cursor: pointer;
}
</style>

<!-- Contenedor principal del contenido -->
<div class="content" id="content">
  <!-- Contenedor de la sección de Tele Consultations -->
  <div class="teleconsult-container">
    <!-- Encabezado de la sección -->
    <div style="font-size: 1.5rem" class="teleconsult-header">
      <h2>Tele Consultations</h2>
      <p>Manage and initiate teleconsultation sessions with your patients.</p>
    </div>

    <!-- Filtros de búsqueda y botón de acción -->
    <div class="teleconsult-filters">
      <input type="text" placeholder="Search by patient, date...">
      <button>Search</button>
      <button>New Teleconsultation</button>
    </div>

    <!-- Tabla de teleconsultas programadas -->
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
        <!-- Ejemplo 1 -->
        <tr>
          <td>10:00 AM</td>
          <td>John Doe</td>
          <td>Nephrology</td>
          <td>Confirmed</td>
          <td>
            <!-- Acción para iniciar la videollamada (ficticio) -->
            <button>
              <i class="fas fa-video"></i> Start Call
            </button>
          </td>
        </tr>
        <!-- Ejemplo 2 -->
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
        <!-- Ejemplo 3 -->
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
  <!-- Se incluye el footer (ajusta la ruta según tu estructura) -->
  <?php include 'footer.php'; ?>
</div>
