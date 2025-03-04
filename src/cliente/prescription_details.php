<?php
session_start();
// Validar la sesión del cliente si es necesario

// Incluir header y sidebar del cliente
include 'cliheader.php';
include 'sidebar.php';

// Obtener el ID de la prescripción desde GET y cargar los datos desde la base de datos (aquí se usan datos de ejemplo)
$prescriptionId = isset($_GET['id']) ? intval($_GET['id']) : 0;

$prescriptionDetails = [
  'dateIssued' => '2025-03-05',
  'medication' => 'Lisinopril',
  'dosage'     => '10 mg daily',
  'instructions' => 'Take one tablet daily in the morning with water.',
  'doctor'     => 'Dr. Manuel Garcia Estrada',
  'status'     => 'Active'
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Prescription Details | TeleConsultations</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS (CDN) -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
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
    /* Contenedor principal: se muestra a la derecha del sidebar */
    .content {
      margin-left: 220px; /* Espacio para el sidebar expandido */
      padding: 80px 40px 80px; /* Padding inferior para evitar tapar el footer */
      transition: margin-left 0.3s ease;
    }
    .content.collapsed {
      margin-left: 70px;
    }
    /* Tarjeta de detalles de la prescripción */
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
      font-size: 2rem;
      color: var(--secondary-color);
      margin-bottom: 20px;
    }
    .detail-item {
      margin-bottom: 15px;
      font-size: 1.1rem;
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
      font-size: 1rem;
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
        font-size: 1.8rem;
      }
    }
  </style>
</head>
<body>
  <div class="content" id="content">
    <div class="details-container">
      <h2>Prescription Details</h2>
      <div class="detail-item">
        <span class="detail-label">Date Issued: </span><?php echo htmlspecialchars($prescriptionDetails['dateIssued']); ?>
      </div>
      <div class="detail-item">
        <span class="detail-label">Medication: </span><?php echo htmlspecialchars($prescriptionDetails['medication']); ?>
      </div>
      <div class="detail-item">
        <span class="detail-label">Dosage: </span><?php echo htmlspecialchars($prescriptionDetails['dosage']); ?>
      </div>
      <div class="detail-item">
        <span class="detail-label">Instructions: </span><?php echo htmlspecialchars($prescriptionDetails['instructions']); ?>
      </div>
      <div class="detail-item">
        <span class="detail-label">Prescribed by: </span><?php echo htmlspecialchars($prescriptionDetails['doctor']); ?>
      </div>
      <div class="detail-item">
        <span class="detail-label">Status: </span><?php echo htmlspecialchars($prescriptionDetails['status']); ?>
      </div>
      <a href="prescriptions.php" class="btn-back">&larr; Back to Prescriptions</a>
    </div>
    
    <?php include '../doctor/footer.php'; ?>
  </div>
  
  <!-- jQuery & Bootstrap JS (CDN) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
