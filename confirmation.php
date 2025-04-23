<?php
// Configuración de sesión segura
$customSessionPath = '/home1/ats/tmp_sessions';
if (!file_exists($customSessionPath)) {
    if (!mkdir($customSessionPath, 0700, true)) {
        die('Error: No se pudo crear directorio para sesiones');
    }
}

ini_set('session.save_path', $customSessionPath);
ini_set('session.gc_probability', 1);
ini_set('session.gc_divisor', 100);
ini_set('session.gc_maxlifetime', 1440);

// Iniciar sesión antes de cualquier salida
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Manejo de idiomas
$defaultLang = 'es';
$availableLangs = ['es', 'en'];

// Determinar idioma
if (isset($_GET['lang']) && in_array($_GET['lang'], $availableLangs)) {
    $_SESSION['lang'] = $_GET['lang'];
    setcookie('lang', $_GET['lang'], time() + (86400 * 30), "/");
    $currentLang = $_GET['lang'];
} elseif (isset($_SESSION['lang'])) {
    $currentLang = $_SESSION['lang'];
} elseif (isset($_COOKIE['lang']) && in_array($_COOKIE['lang'], $availableLangs)) {
    $currentLang = $_COOKIE['lang'];
} else {
    $currentLang = $defaultLang;
    $_SESSION['lang'] = $currentLang;
}

// Obtener los datos de la cita
$doctor_id = isset($_GET['doctor_id']) ? $_GET['doctor_id'] : '';
$appointment_date = isset($_GET['date']) ? $_GET['date'] : '';
$appointment_time = isset($_GET['time']) ? $_GET['time'] : '';
$specialty = isset($_GET['specialty']) ? $_GET['specialty'] : '';

// Verificar que todos los datos estén presentes
if (empty($doctor_id) || empty($appointment_date) || empty($appointment_time)) {
    // Redirección segura
    header('Location: dashclient.php');
    exit;
}

// Traducciones de especialidades
$specialtyTranslations = [
    'es' => [
        'Internal Medicine' => 'Medicina Interna',
        'Nephrology' => 'Nefrología'
    ],
    'en' => [
        'Internal Medicine' => 'Internal Medicine',
        'Nephrology' => 'Nephrology'
    ]
];

// Simular información del doctor
$doctors = [
    1 => [
        'name' => 'Dr. Manuel García',
        'specialty' => $specialty,
        'price' => ($specialty == 'Internal Medicine') ? 150 : 200,
        'image' => 'doctor_garcia.jpg',
        'specialty_es' => ($specialty == 'Internal Medicine') ? 'Medicina Interna' : 'Nefrología',
        'specialty_en' => $specialty
    ]
];

$doctor = $doctors[$doctor_id];
?>
<!DOCTYPE html>
<html lang="<?php echo $currentLang; ?>">
<head>
  <meta charset="UTF-8">
  <title data-i18n="confirmation.page_title">Appointment Confirmation | TeleConsultations</title>
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
    
    /* Navbar styles */
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
    
    /* Language selector styles */
    .language-selector-container {
      display: flex;
      align-items: center;
      height: 50px;
      padding: 15px 0;
    }
    
    .language-selector {
      display: flex;
      margin-left: 15px;
      align-items: center;
    }
    
    .language-btn {
      background: rgba(255,255,255,0.2);
      border: 1px solid #fff;
      color: #fff !important;
      padding: 5px 10px;
      margin: 0 3px;
      border-radius: 3px;
      cursor: pointer;
      transition: all 0.3s ease;
      font-weight: bold;
      text-decoration: none;
      display: inline-block;
    }
    
    .language-btn:hover, .language-btn.active {
      background: #fff;
      color: #3358aa !important;
      border-color: rgb(239, 242, 247);
    }
    
    .top-spacing {
      margin-top: 80px;
    }

    .confirmation-container {
      max-width: 800px;
      margin: 0 auto;
      padding: 30px;
    }

    .confirmation-card {
      background: white;
      border-radius: 10px;
      padding: 40px;
      margin-bottom: 30px;
      box-shadow: 0 3px 15px rgba(0,0,0,0.05);
      border: 1px solid #e1e5eb;
      text-align: center;
    }

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

    /* Estilos para impresión */
    @media print {
      body * {
        visibility: hidden;
      }
      .confirmation-card, .confirmation-card * {
        visibility: visible;
      }
      .confirmation-card {
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        box-shadow: none;
        border: none;
      }
      .action-buttons {
        display: none;
      }
      .custom-navbar {
        display: none;
      }
      .top-spacing {
        margin-top: 0;
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
          <span data-i18n="global.site_name">TeleConsultations</span>
        </a>
      </div>

      <div class="collapse navbar-collapse" id="navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
             <li>
            <a href="index.php" style="color:#fff;"><i class="fas fa-arrow-left"></i> <span data-i18n="global.home">Home</span></a>
          </li>
          <li>
            <div class="language-selector-container">
              <div class="language-selector">
                <a href="?lang=es&doctor_id=<?php echo $doctor_id; ?>&date=<?php echo $appointment_date; ?>&time=<?php echo $appointment_time; ?>&specialty=<?php echo urlencode($specialty); ?>" class="language-btn <?php echo $currentLang === 'es' ? 'active' : ''; ?>">ES</a>
                <a href="?lang=en&doctor_id=<?php echo $doctor_id; ?>&date=<?php echo $appointment_date; ?>&time=<?php echo $appointment_time; ?>&specialty=<?php echo urlencode($specialty); ?>" class="language-btn <?php echo $currentLang === 'en' ? 'active' : ''; ?>">EN</a>
              </div>
            </div>
          </li>
          
        </ul>
      </div>
    </div>
  </nav>

  <div class="top-spacing"></div>

  <div class="confirmation-container">
    <div class="confirmation-card">
      <div class="confirmation-header">
        <div class="success-icon">
          <i class="fas fa-check-circle"></i>
        </div>
        <h2 data-i18n="confirmation.title">Appointment Confirmed!</h2>
        <p data-i18n="confirmation.subtitle">Your teleconsultation has been successfully scheduled.</p>
      </div>
      
      <div class="appointment-details">
        <h3 class="text-center" style="color: var(--primary-color); margin-bottom: 20px;">
          <i class="fas fa-calendar-check"></i> <span data-i18n="confirmation.details_title">Appointment Details</span>
        </h3>
        
        <div class="detail-item">
          <span class="detail-label" data-i18n="confirmation.confirmation_number">Confirmation Number:</span>
          <span class="detail-value">TC<?php echo rand(100000, 999999); ?></span>
        </div>
        
        <div class="detail-item">
          <span class="detail-label" data-i18n="confirmation.doctor_label">Doctor:</span>
          <span class="detail-value"><?php echo htmlspecialchars($doctor['name']); ?></span>
        </div>
        
        <div class="detail-item">
          <span class="detail-label" data-i18n="confirmation.specialty_label">Specialty:</span>
          <span class="detail-value"><?php echo htmlspecialchars($specialtyTranslations[$currentLang][$specialty]); ?></span>
        </div>
        
        <div class="detail-item">
          <span class="detail-label" data-i18n="confirmation.date_label">Date:</span>
          <span class="detail-value"><?php echo htmlspecialchars(date('F j, Y', strtotime($appointment_date))); ?></span>
        </div>
        
        <div class="detail-item">
          <span class="detail-label" data-i18n="confirmation.time_label">Time:</span>
          <span class="detail-value"><?php echo htmlspecialchars($appointment_time); ?></span>
        </div>
        
        <div class="detail-item">
          <span class="detail-label" data-i18n="confirmation.duration_label">Duration:</span>
          <span class="detail-value" data-i18n="confirmation.duration_value">10 minutes</span>
        </div>
        
        <div class="detail-item">
          <span class="detail-label" data-i18n="confirmation.fee_label">Consultation Fee:</span>
          <span class="detail-value">$<?php echo number_format($doctor['price'], 2); ?></span>
        </div>
        
        <div class="detail-item total-amount">
          <span class="detail-label" data-i18n="confirmation.total_label">Total Paid:</span>
          <span class="detail-value">$<?php echo number_format($doctor['price'], 2); ?></span>
        </div>
      </div>
      
      <div class="doctor-info">
        <img src="images/doctors/<?php echo $doctor['image']; ?>" alt="<?php echo htmlspecialchars($doctor['name']); ?>">
        <div>
          <h4><?php echo htmlspecialchars($doctor['name']); ?></h4>
          <p><?php echo htmlspecialchars($specialtyTranslations[$currentLang][$specialty]); ?></p>
          <p><i class="fas fa-star" style="color: #ffc107;"></i> 4.9 (245 <span data-i18n="confirmation.reviews">reviews</span>)</p>
        </div>
      </div>
      
      <div class="whats-next">
        <h3 class="text-center" style="color: var(--primary-color); margin-top: 30px;">
          <i class="fas fa-info-circle"></i> <span data-i18n="confirmation.next_title">What's Next?</span>
        </h3>
        <ul style="text-align: left; max-width: 600px; margin: 20px auto; color: var(--light-text);">
          <li style="margin-bottom: 10px;" data-i18n="confirmation.next_point1">You will receive a confirmation email with all the details.</li>
          <li style="margin-bottom: 10px;" data-i18n="confirmation.next_point2">A reminder will be sent 24 hours before your appointment.</li>
          <li style="margin-bottom: 10px;" data-i18n="confirmation.next_point3">Join the video call 5 minutes before your scheduled time using the link we'll provide.</li>
          <li data-i18n="confirmation.next_point4">Contact support if you need to reschedule or cancel your appointment.</li>
        </ul>
      </div>
      
      <div class="action-buttons">
        <a href="dashclient.php" class="btn btn-dashboard">
          <i class="fas fa-tachometer-alt"></i> <span data-i18n="confirmation.dashboard_button">Return to Portal</span>
        </a>
        <button onclick="window.print()" class="btn btn-print">
          <i class="fas fa-print"></i> <span data-i18n="confirmation.print_button">Print Confirmation</span>
        </button>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <?php include 'footer.php'; ?>

  <!-- jQuery & Bootstrap JS (CDN) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <!-- Script para el cambio de idioma -->
  <script src="js/language.js"></script>
  <script>
    // Pasar el idioma actual a JavaScript
    const currentLang = '<?php echo $currentLang; ?>';
    
    // Inicializar el sistema de idiomas
    document.addEventListener('DOMContentLoaded', function() {
      initLanguageSystem(currentLang);
      
      // Configurar título para impresión
      const originalTitle = document.title;
      const doctorName = '<?php echo htmlspecialchars($doctor['name']); ?>';
      const apptDate = '<?php echo date('m/d/Y', strtotime($appointment_date)); ?>';
      
      window.addEventListener('beforeprint', function() {
        document.title = t('confirmation.print_title') + ' - ' + doctorName + ' - ' + apptDate;
      });
      
      window.addEventListener('afterprint', function() {
        document.title = originalTitle;
      });
    });
  </script>
</body>
</html>