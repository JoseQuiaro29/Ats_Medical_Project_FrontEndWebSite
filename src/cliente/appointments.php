<?php
session_start();
// Incluir el header (abre el documento) y el sidebar (con sus estilos propios)
include 'cliheader.php';
include 'sidebar.php';
?>

<!-- Contenedor principal del contenido -->
<div class="content" id="content" style="
  margin-left: 220px; /* Deja espacio para el sidebar fijo */
  margin-top: 60px;   /* Para que el contenido no se oculte detrás del header */
  padding: 40px;
">
  <!-- Encabezado y filtros -->
  <div class="appointments-header" style="display: flex; flex-direction: column; margin-bottom: 30px;">
    <h2 style="margin: 0; font-size: 2.2rem; color: #2c3e50;">My Appointments</h2>
    <div class="filter-bar" style="margin-top: 15px; display: flex; gap: 15px; flex-wrap: wrap;">
      <select name="statusFilter" id="statusFilter" style="padding: 8px 12px; border: 1px solid #ddd; border-radius: 5px;">
        <option value="">All Status</option>
        <option value="Confirmed">Confirmed</option>
        <option value="Pending">Pending</option>
        <option value="Rescheduled">Rescheduled</option>
        <option value="Cancelled">Cancelled</option>
      </select>
      <input type="date" name="filterDate" id="filterDate" style="padding: 8px 12px; border: 1px solid #ddd; border-radius: 5px;">
      <button class="btn btn-primary">Search</button>
    </div>
  </div>

  <!-- Tarjeta que contiene la tabla de citas -->
  <div class="appointments-container" style="
    background: #fff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
  ">
    <table class="appointments-table" style="width: 100%; border-collapse: collapse; margin-top: 20px;">
      <thead>
        <tr style="background: #20a967; color: #fff;">
          <th style="padding: 15px 10px; text-align: left;">Date</th>
          <th style="padding: 15px 10px; text-align: left;">Time</th>
          <th style="padding: 15px 10px; text-align: left;">Doctor</th>
          <th style="padding: 15px 10px; text-align: left;">Specialty</th>
          <th style="padding: 15px 10px; text-align: left;">Status</th>
          <th style="padding: 15px 10px; text-align: left;">Action</th>
        </tr>
      </thead>
      <tbody>
        <!-- Ejemplo de citas; en producción, genera estas filas dinámicamente -->
        <tr style="border-bottom: 1px solid #e0e0e0;">
          <td style="padding: 15px 10px;">2025-03-10</td>
          <td style="padding: 15px 10px;">10:00 AM</td>
          <td style="padding: 15px 10px;">Dr. Manuel Garcia Estrada</td>
          <td style="padding: 15px 10px;">Nephrology</td>
          <td style="padding: 15px 10px;">Confirmed</td>
          <td style="padding: 15px 10px;">
            <button class="btn-detail" onclick="window.location.href='appointment_details.php?id=1'" style="
              background-color: #20a967; 
              color: #fff; 
              border: none; 
              border-radius: 4px; 
              padding: 6px 12px; 
              cursor: pointer;">
              View Details
            </button>
          </td>
        </tr>
        <tr style="border-bottom: 1px solid #e0e0e0;">
          <td style="padding: 15px 10px;">2025-03-15</td>
          <td style="padding: 15px 10px;">02:30 PM</td>
          <td style="padding: 15px 10px;">Dr. Manuel Garcia Estrada</td>
          <td style="padding: 15px 10px;">General Medicine</td>
          <td style="padding: 15px 10px;">Pending</td>
          <td style="padding: 15px 10px;">
            <button class="btn-detail" onclick="window.location.href='appointment_details.php?id=2'" style="
              background-color: #20a967; 
              color: #fff; 
              border: none; 
              border-radius: 4px; 
              padding: 6px 12px; 
              cursor: pointer;">
              View Details
            </button>
          </td>
        </tr>
        <tr>
          <td style="padding: 15px 10px;">2025-03-20</td>
          <td style="padding: 15px 10px;">09:00 AM</td>
          <td style="padding: 15px 10px;">Dr. Manuel Garcia Estrada</td>
          <td style="padding: 15px 10px;">Nephrology</td>
          <td style="padding: 15px 10px;">Rescheduled</td>
          <td style="padding: 15px 10px;">
            <button class="btn-detail" onclick="window.location.href='appointment_details.php?id=3'" style="
              background-color: #20a967; 
              color: #fff; 
              border: none; 
              border-radius: 4px; 
              padding: 6px 12px; 
              cursor: pointer;">
              View Details
            </button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

<?php include '../doctor/footer.php'; ?>
