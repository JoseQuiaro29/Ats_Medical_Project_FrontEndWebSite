<?php
session_start();
// Validar la sesión del cliente si es necesario

// Incluir header y sidebar del cliente
include 'cliheader.php';
include 'sidebar.php';

// Obtener el ID de la cita desde GET (en producción usar validación y sanitización)
$appointmentId = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Datos de ejemplo para la cita (reemplaza con datos reales de la base de datos)
$appointmentDetails = [
  'date'      => '2025-03-10',
  'time'      => '10:00 AM',
  'doctor'    => 'Dr. Manuel Garcia Estrada',
  'specialty' => 'Nephrology',
  'status'    => 'Confirmed',
  'notes'     => 'Please arrive 15 minutes early and bring your insurance card.'
];
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
    /* Contenedor principal: se ubica a la derecha del sidebar */
    .content {
      margin-left: 220px; /* Espacio para el sidebar expandido */
      padding: 80px 40px 80px; /* Padding inferior extra para evitar tapar el footer */
      transition: margin-left 0.3s ease;
    }
    .content.collapsed {
      margin-left: 70px;
    }
    /* Tarjeta de detalles de la cita */
    .details-container {
      background: var(--card-bg);
      padding: 40px;
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      max-width: 800px;
      margin: 0 auto;
    }
    .details-container h2 {
      margin-top: 0;
      font-size: 2.5rem;
      color: var(--secondary-color);
      margin-bottom: 20px;
    }
    .detail-item {
      margin-bottom: 15px;
      font-size: 1.5rem;
    }
    .detail-label {
      font-weight: bold;
      color: var(--secondary-color);
    }
    .btn-back {
      display: inline-block;
      background-color: var(--primary-color);
      color: #fff;
      border: none;
      border-radius: 5px;
      padding: 10px 20px;
      font-size: 1.5rem;
      text-decoration: none;
      transition: background 0.3s ease;
      margin-top: 20px;
    }
    .btn-back:hover {
      background-color: #1e8e5d;
    }
    @media (max-width: 768px) {
      .content {
        margin-left: 70px;
        padding: 60px 20px 80px;
      }
      .details-container h2 {
        font-size: 2rem;
      }
    }
  </style>

  <div class="content" id="content">
    <div class="details-container">
      <h2>Appointment Details</h2>
      <div class="detail-item">
        <span class="detail-label">Date: </span><?php echo htmlspecialchars($appointmentDetails['date']); ?>
      </div>
      <div class="detail-item">
        <span class="detail-label">Time: </span><?php echo htmlspecialchars($appointmentDetails['time']); ?>
      </div>
      <div class="detail-item">
        <span class="detail-label">Doctor: </span><?php echo htmlspecialchars($appointmentDetails['doctor']); ?>
      </div>
      <div class="detail-item">
        <span class="detail-label">Specialty: </span><?php echo htmlspecialchars($appointmentDetails['specialty']); ?>
      </div>
      <div class="detail-item">
        <span class="detail-label">Status: </span><?php echo htmlspecialchars($appointmentDetails['status']); ?>
      </div>
      <div class="detail-item">
        <span class="detail-label">Notes: </span><?php echo htmlspecialchars($appointmentDetails['notes']); ?>
      </div>
      <a href="appointments.php" class="btn-back">&larr; Back to Appointments</a>
    </div>
    
    <?php include '../doctor/footer.php'; ?>
  </div>
  <!-- jQuery & Bootstrap JS (CDN) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


