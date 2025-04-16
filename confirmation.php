<?php
// Enable error reporting (optional for debugging)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Obtener los datos de la cita
$doctor_id = isset($_GET['doctor_id']) ? $_GET['doctor_id'] : '';
$appointment_date = isset($_GET['date']) ? $_GET['date'] : '';
$appointment_time = isset($_GET['time']) ? $_GET['time'] : '';

// Verificar que todos los datos estén presentes
if (empty($doctor_id) || empty($appointment_date) || empty($appointment_time)) {
    header('Location: dashclient.php');
    exit();
}

// Simular información del doctor (en una aplicación real, esto vendría de la base de datos)
$doctors = [
    1 => [
        'name' => 'Dr. Manuel García',
        'specialty' => 'Internal Medicine', // Esto normalmente vendría de la base de datos
        'price' => 150,
        'image' => 'doctor_garcia.jpg'
    ]
];

$doctor = $doctors[$doctor_id];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Appointment Confirmation | TeleConsultations</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap CSS (CDN) -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <!-- Font Awesome for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <style>
    :root {
      --primary-color: #3358aa;
      --secondary-color: #20a967;
      --light-bg: #f8f9fa;
      --dark-text: #333;
      --light-text: #666;
    }
    
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      color: var(--dark-text);
      background-color: #f5f5f5;
    }
    
    /* Fixed top navbar */
    .custom-navbar {
      background-color: rgba(51, 88, 170, 0.8);
      border-color: rgba(58, 138, 126, 0.8);
    }
    .custom-navbar .navbar-brand {
      color: #fff !important;
      font-weight: bold;
      display: flex;
      align-items: center;
    }
    .custom-navbar .navbar-brand img {
      width: 40px;
      height: 40px;
      margin-right: 10px;
    }
    .custom-navbar .navbar-nav > li > a {
      color: #fff !important;
    }
    
    /* Spacing so the content is not hidden under the fixed navbar */
    .top-spacing {
      margin-top: 80px;
    }

    /* Main container */
    .confirmation-container {
      max-width: 800px;
      margin: 0 auto;
      padding: 30px;
    }

    /* Confirmation card */
    .confirmation-card {
      background: white;
      border-radius: 10px;
      padding: 40px;
      margin-bottom: 30px;
      box-shadow: 0 3px 15px rgba(0,0,0,0.05);
      border: 1px solid #e1e5eb;
      text-align: center;
    }

    /* Confirmation header */
    .confirmation-header {
      margin-bottom: 30px;
    }
    .confirmation-header .success-icon {
      color: var(--secondary-color);
      font-size: 60px;
      margin-bottom: 20px;
    }
    .confirmation-header h2 {
      color: var(--primary-color);
      font-weight: 700;
      margin-bottom: 10px;
    }
    .confirmation-header p {
      color: var(--light-text);
      font-size: 18px;
    }

    /* Appointment details */
    .appointment-details {
      background: var(--light-bg);
      border-radius: 8px;
      padding: 25px;
      margin: 30px 0;
      text-align: left;
    }
    .detail-item {
      margin-bottom: 15px;
      display: flex;
      justify-content: space-between;
    }
    .detail-label {
      font-weight: 500;
      color: var(--dark-text);
    }
    .detail-value {
      color: var(--primary-color);
      font-weight: 500;
    }
    .total-amount {
      font-size: 20px;
      font-weight: 600;
      color: var(--secondary-color);
      margin-top: 20px;
      padding-top: 15px;
      border-top: 2px solid #eee;
    }

    /* Doctor info */
    .doctor-info {
      display: flex;
      align-items: center;
      margin-top: 30px;
      padding-top: 30px;
      border-top: 1px solid #eee;
    }
    .doctor-info img {
      width: 80px;
      height: 80px;
      border-radius: 50%;
      object-fit: cover;
      margin-right: 20px;
      border: 3px solid white;
      box-shadow: 0 3px 10px rgba(0,0,0,0.1);
    }
    .doctor-info h4 {
      color: var(--primary-color);
      margin-bottom: 5px;
    }
    .doctor-info p {
      color: var(--light-text);
      margin-bottom: 5px;
    }

    /* Action buttons */
    .action-buttons {
      margin-top: 40px;
      display: flex;
      justify-content: center;
      gap: 15px;
      flex-wrap: wrap;
    }
    .btn-dashboard {
      background-color: var(--primary-color);
      color: white;
      padding: 12px 30px;
      font-weight: 600;
      border-radius: 50px;
      text-transform: uppercase;
      letter-spacing: 1px;
      transition: all 0.3s;
    }
    .btn-dashboard:hover {
      background-color: #2a4a8a;
      color: white;
      transform: translateY(-2px);
      box-shadow: 0 4px 10px rgba(51, 88, 170, 0.3);
    }
    .btn-print {
      background-color: white;
      color: var(--primary-color);
      border: 1px solid var(--primary-color);
      padding: 12px 30px;
      font-weight: 600;
      border-radius: 50px;
      text-transform: uppercase;
      letter-spacing: 1px;
      transition: all 0.3s;
    }
    .btn-print:hover {
      background-color: var(--light-bg);
      color: var(--primary-color);
      transform: translateY(-2px);
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
      .confirmation-container {
        padding: 15px;
      }
      .confirmation-card {
        padding: 25px;
      }
      .doctor-info {
        flex-direction: column;
        text-align: center;
      }
      .doctor-info img {
        margin-right: 0;
        margin-bottom: 15px;
      }
      .action-buttons {
        flex-direction: column;
        gap: 10px;
      }
      .btn-dashboard, .btn-print {
        width: 100%;
      }
    }
  </style>
</head>
<body>

  <!-- TOP NAVBAR -->
  <nav class="navbar navbar-default navbar-fixed-top custom-navbar">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1">
          <span class="icon-bar" style="background-color:#fff;"></span>
          <span class="icon-bar" style="background-color:#fff;"></span>
          <span class="icon-bar" style="background-color:#fff;"></span>
        </button>
        <a class="navbar-brand" href="index.php">
          <img src="images/logo1.png" alt="Logo">
          TeleConsultations
        </a>
      </div>

      <div class="collapse navbar-collapse" id="navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="index.php" style="color:#fff;"><i class="fas fa-home"></i> Home</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Space so content isn't hidden under the fixed navbar -->
  <div class="top-spacing"></div>

  <!-- Main confirmation container -->
  <div class="confirmation-container">
    <div class="confirmation-card">
      <div class="confirmation-header">
        <div class="success-icon">
          <i class="fas fa-check-circle"></i>
        </div>
        <h2>Appointment Confirmed!</h2>
        <p>Your teleconsultation has been successfully scheduled.</p>
      </div>
      
      <div class="appointment-details">
        <h3 class="text-center" style="color: var(--primary-color); margin-bottom: 20px;">
          <i class="fas fa-calendar-check"></i> Appointment Details
        </h3>
        
        <div class="detail-item">
          <span class="detail-label">Confirmation Number:</span>
          <span class="detail-value">TC<?php echo rand(100000, 999999); ?></span>
        </div>
        
        <div class="detail-item">
          <span class="detail-label">Doctor:</span>
          <span class="detail-value"><?php echo htmlspecialchars($doctor['name']); ?></span>
        </div>
        
        <div class="detail-item">
          <span class="detail-label">Specialty:</span>
          <span class="detail-value"><?php echo htmlspecialchars($doctor['specialty']); ?></span>
        </div>
        
        <div class="detail-item">
          <span class="detail-label">Date:</span>
          <span class="detail-value"><?php echo htmlspecialchars(date('F j, Y', strtotime($appointment_date))); ?></span>
        </div>
        
        <div class="detail-item">
          <span class="detail-label">Time:</span>
          <span class="detail-value"><?php echo htmlspecialchars($appointment_time); ?></span>
        </div>
        
        <div class="detail-item">
          <span class="detail-label">Duration:</span>
          <span class="detail-value">10 minutes</span>
        </div>
        
        <div class="detail-item">
          <span class="detail-label">Consultation Fee:</span>
          <span class="detail-value">$<?php echo number_format($doctor['price'], 2); ?></span>
        </div>
        
        <div class="detail-item total-amount">
          <span class="detail-label">Total Paid:</span>
          <span class="detail-value">$<?php echo number_format($doctor['price'], 2); ?></span>
        </div>
      </div>
      
      <div class="doctor-info">
        <img src="images/doctors/<?php echo $doctor['image']; ?>" alt="<?php echo htmlspecialchars($doctor['name']); ?>">
        <div>
          <h4><?php echo htmlspecialchars($doctor['name']); ?></h4>
          <p><?php echo htmlspecialchars($doctor['specialty']); ?></p>
          <p><i class="fas fa-star" style="color: #ffc107;"></i> 4.9 (245 reviews)</p>
        </div>
      </div>
      
      <div class="whats-next">
        <h3 class="text-center" style="color: var(--primary-color); margin-top: 30px;">
          <i class="fas fa-info-circle"></i> What's Next?
        </h3>
        <ul style="text-align: left; max-width: 600px; margin: 20px auto; color: var(--light-text);">
          <li style="margin-bottom: 10px;">You will receive a confirmation email with all the details.</li>
          <li style="margin-bottom: 10px;">A reminder will be sent 24 hours before your appointment.</li>
          <li style="margin-bottom: 10px;">Join the video call 5 minutes before your scheduled time using the link we'll provide.</li>
          <li>Contact support if you need to reschedule or cancel your appointment.</li>
        </ul>
      </div>
      
      <div class="action-buttons">
        <a href="dashclient.php" class="btn btn-dashboard">
        <i class="fas fa-tachometer-alt"></i> Return to Portal
        </a>
        <button onclick="window.print()" class="btn btn-print">
          <i class="fas fa-print"></i> Print Confirmation
        </button>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <?php include 'footer.php'; ?>

  <!-- jQuery & Bootstrap JS (CDN) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <script>
    // Script para imprimir solo la tarjeta de confirmación
    document.addEventListener('DOMContentLoaded', function() {
      // Mejorar la experiencia de impresión
      const originalTitle = document.title;
      
      window.addEventListener('beforeprint', function() {
        document.title = "Appointment Confirmation - <?php echo htmlspecialchars($doctor['name']); ?> - <?php echo date('m/d/Y', strtotime($appointment_date)); ?>";
      });
      
      window.addEventListener('afterprint', function() {
        document.title = originalTitle;
      });
    });
  </script>
</body>
</html>