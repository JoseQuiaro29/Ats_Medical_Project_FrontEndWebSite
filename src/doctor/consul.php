<?php
// consul.php
session_start();
// Incluimos el header y sidebar (ajusta la ruta si tus archivos están en otra carpeta)
include 'docheader.php';  // Contiene el <head> y el header
include 'sidebar.php';    // Menú lateral
?>
<!-- Contenedor principal del contenido -->
<div class="content" id="content" style="
  padding-top: 80px;  /* Espacio superior para evitar superposición con el header */
  margin-left: 220px; /* Ajusta según el ancho del sidebar expandido */
  transition: margin-left 0.3s ease;
">
  <!-- Contenedor de la sección de Tele Consultations -->
  <div class="teleconsult-container" style="
    background-color: #fff; 
    padding: 30px;
    margin: 20px auto;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    max-width: 1200px;
  ">
    <!-- Encabezado de la sección -->
    <div class="teleconsult-header" style="margin-bottom: 20px;">
      <h2 style="color: #2c3e50;">Tele Consultations</h2>
      <p style="color: #666;">Manage and initiate teleconsultation sessions with your patients.</p>
    </div>

    <!-- Filtros de búsqueda y botón de acción -->
    <div class="teleconsult-filters" style="
      margin-bottom: 20px;
      display: flex;
      flex-wrap: wrap;
      align-items: center;
    ">
      <input type="text" placeholder="Search by patient, date..." style="
        padding: 10px; 
        width: 300px; 
        border: 1px solid #ddd; 
        border-radius: 4px;
        margin-right: 10px;
      ">
      <button style="
        padding: 10px 20px; 
        background-color: #20a967; 
        border: none; 
        border-radius: 4px; 
        color: #fff; 
        margin-right: 10px;
        cursor: pointer;
      ">Search</button>
      <!-- Botón para crear una nueva teleconsulta -->
      <button style="
        padding: 10px 20px; 
        background-color: #3498db; 
        border: none; 
        border-radius: 4px; 
        color: #fff; 
        cursor: pointer; 
        margin-left: auto;
      ">New Teleconsultation</button>
    </div>

    <!-- Tabla de teleconsultas programadas -->
    <table style="
      width: 100%; 
      border-collapse: collapse;
    ">
      <thead>
        <tr style="background-color: #20a967; color: #fff;">
          <th style="padding: 12px 8px; text-align: left;">Time</th>
          <th style="padding: 12px 8px; text-align: left;">Patient</th>
          <th style="padding: 12px 8px; text-align: left;">Specialty</th>
          <th style="padding: 12px 8px; text-align: left;">Status</th>
          <th style="padding: 12px 8px; text-align: left;">Actions</th>
        </tr>
      </thead>
      <tbody>
        <!-- Ejemplo 1 -->
        <tr style="border-bottom: 1px solid #ddd;">
          <td style="padding: 12px 8px;">10:00 AM</td>
          <td style="padding: 12px 8px;">John Doe</td>
          <td style="padding: 12px 8px;">Nephrology</td>
          <td style="padding: 12px 8px;">Confirmed</td>
          <td style="padding: 12px 8px;">
            <!-- Acción para iniciar la videollamada (ficticio) -->
            <button style="
              padding: 8px 12px; 
              background-color: #20a967; 
              border: none; 
              border-radius: 4px; 
              color: #fff; 
              cursor: pointer;
            ">
              <i class="fas fa-video"></i> Start Call
            </button>
          </td>
        </tr>
        <!-- Ejemplo 2 -->
        <tr style="border-bottom: 1px solid #ddd;">
          <td style="padding: 12px 8px;">11:30 AM</td>
          <td style="padding: 12px 8px;">Mary Smith</td>
          <td style="padding: 12px 8px;">General Medicine</td>
          <td style="padding: 12px 8px;">Pending</td>
          <td style="padding: 12px 8px;">
            <button style="
              padding: 8px 12px; 
              background-color: #20a967; 
              border: none; 
              border-radius: 4px; 
              color: #fff; 
              cursor: pointer;
            ">
              <i class="fas fa-video"></i> Start Call
            </button>
          </td>
        </tr>
        <!-- Ejemplo 3 -->
        <tr>
          <td style="padding: 12px 8px;">02:00 PM</td>
          <td style="padding: 12px 8px;">Carlos Martinez</td>
          <td style="padding: 12px 8px;">General Medicine</td>
          <td style="padding: 12px 8px;">Confirmed</td>
          <td style="padding: 12px 8px;">
            <button style="
              padding: 8px 12px; 
              background-color: #20a967; 
              border: none; 
              border-radius: 4px; 
              color: #fff; 
              cursor: pointer;
            ">
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
