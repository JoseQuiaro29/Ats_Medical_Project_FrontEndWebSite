<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Iniciar sesión y manejar idioma
session_start();

$defaultLang = 'es';
$availableLangs = ['es', 'en'];

// Determinar idioma (prioridad: GET > SESSION > COOKIE > default)
if (isset($_GET['lang']) && in_array($_GET['lang'], $availableLangs)) {
    $_SESSION['lang'] = $_GET['lang'];
    setcookie('lang', $_GET['lang'], time() + (86400 * 30), "/"); // 30 días
    $currentLang = $_GET['lang'];
} elseif (isset($_SESSION['lang'])) {
    $currentLang = $_SESSION['lang'];
} elseif (isset($_COOKIE['lang']) && in_array($_COOKIE['lang'], $availableLangs)) {
    $currentLang = $_COOKIE['lang'];
} else {
    $currentLang = $defaultLang;
    $_SESSION['lang'] = $currentLang;
}

// Obtener datos de la cita
$doctor_id = isset($_GET['doctor_id']) ? $_GET['doctor_id'] : '';
$appointment_date = isset($_GET['date']) ? $_GET['date'] : '';
$appointment_time = isset($_GET['time']) ? $_GET['time'] : '';
$specialty = isset($_GET['specialty']) ? $_GET['specialty'] : '';

// Verificar datos
if (empty($doctor_id) || empty($appointment_date) || empty($appointment_time)) {
    header('Location: dashclient.php');
    exit();
}

// Simular información del doctor
$doctors = [
    1 => [
        'name' => 'Dr. Manuel García',
        'specialty' => $specialty,
        'image' => 'doctor_garcia.jpg',
        'specialty_es' => ($specialty == 'Internal Medicine') ? 'Medicina Interna' : 'Nefrología',
        'specialty_en' => $specialty
    ]
];
$doctor = $doctors[$doctor_id];

// Procesar el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validar y guardar los datos
    $medical_info = [
        'reason' => substr($_POST['reason'], 0, 250),
        'medical_history' => $_POST['medical_history'],
        'surgical_history' => $_POST['surgical_history'],
        'medications' => $_POST['medications'],
        'labs' => [
            'recent' => $_POST['recent_labs'],
            '3_months' => $_POST['3month_labs'],
            '6_months' => $_POST['6month_labs'],
            '1_year' => $_POST['1year_labs']
        ]
    ];
    
    // Redirigir a confirmación con todos los datos
    header('Location: confirmation.php?doctor_id='.$doctor_id.'&date='.$appointment_date.'&time='.$appointment_time.'&specialty='.urlencode($specialty).'&lang='.$currentLang);
    exit();
}
?>

<!DOCTYPE html>
<html lang="<?php echo $currentLang; ?>">
<head>
  <meta charset="UTF-8">
  <title data-i18n="medical_info.page_title">Complete Medical Information | TeleConsultations</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  
  <style>
    :root {
      --primary-color: #3358aa;
      --secondary-color: #20a967;
      --light-bg: #f8f9fa;
    }
    
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
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
    
    .medical-form-container {
      max-width: 900px;
      margin: 0 auto;
      padding: 30px;
      background: white;
      border-radius: 10px;
      box-shadow: 0 3px 15px rgba(0,0,0,0.05);
    }
    
    .form-section {
      margin-bottom: 30px;
      padding-bottom: 20px;
      border-bottom: 1px solid #eee;
    }
    
    .form-section h3 {
      color: var(--primary-color);
      margin-bottom: 20px;
    }
    
    .word-counter {
      font-size: 12px;
      color: #666;
      text-align: right;
    }
    
    .btn-submit {
      background-color: var(--secondary-color);
      color: white;
      padding: 12px 30px;
      font-weight: 600;
      border-radius: 50px;
      text-transform: uppercase;
      letter-spacing: 1px;
    }
    
    @media (max-width: 768px) {
      .medical-form-container {
        padding: 20px;
      }
    }
  </style>
</head>
<body>

  <!-- Navbar -->
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
            <div class="language-selector-container">
              <div class="language-selector">
                <a href="?lang=es&doctor_id=<?php echo $doctor_id; ?>&date=<?php echo $appointment_date; ?>&time=<?php echo $appointment_time; ?>&specialty=<?php echo urlencode($specialty); ?>" class="language-btn <?php echo $currentLang === 'es' ? 'active' : ''; ?>">ES</a>
                <a href="?lang=en&doctor_id=<?php echo $doctor_id; ?>&date=<?php echo $appointment_date; ?>&time=<?php echo $appointment_time; ?>&specialty=<?php echo urlencode($specialty); ?>" class="language-btn <?php echo $currentLang === 'en' ? 'active' : ''; ?>">EN</a>
              </div>
            </div>
          </li>
          <li>
            <a href="index.php" style="color:#fff;"><i class="fas fa-arrow-left"></i> <span data-i18n="global.home">Home</span></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="top-spacing"></div>

  <div class="container">
    <div class="medical-form-container">
      <h2 class="text-center" style="color: var(--primary-color); margin-bottom: 30px;">
        <i class="fas fa-file-medical"></i> <span data-i18n="medical_info.form_title">Complete Medical Information</span>
      </h2>
      
      <p class="text-center" style="margin-bottom: 30px;">
        <span data-i18n="medical_info.form_subtitle">Please complete this form to help your doctor prepare for your consultation on</span>
        <strong><?php echo date('F j, Y', strtotime($appointment_date)); ?> <span data-i18n="medical_info.at">at</span> <?php echo htmlspecialchars($appointment_time); ?></strong>
      </p>
      
      <form method="POST" action="medical_info.php?doctor_id=<?php echo $doctor_id; ?>&date=<?php echo $appointment_date; ?>&time=<?php echo $appointment_time; ?>&specialty=<?php echo urlencode($specialty); ?>">
        
        <!-- Motivo de Consulta -->
        <div class="form-section">
          <h3><i class="fas fa-question-circle"></i> <span data-i18n="medical_info.reason_title">Reason for Consultation</span></h3>
          <div class="form-group">
            <label data-i18n="medical_info.reason_label">Please describe the reason for your visit (50 words maximum)</label>
            <textarea class="form-control" name="reason" rows="3" maxlength="250" 
                      data-i18n="[placeholder]medical_info.reason_placeholder" 
                      required oninput="updateWordCount(this, 'reason-counter')"></textarea>
            <div class="word-counter">
              <span id="reason-counter">0</span>/50 <span data-i18n="medical_info.words">words</span>
            </div>
          </div>
        </div>
        
        <!-- Historial Médico -->
        <div class="form-section">
          <h3><i class="fas fa-notes-medical"></i> <span data-i18n="medical_info.medical_history_title">Medical History</span></h3>
          <div class="form-group">
            <label data-i18n="medical_info.medical_history_label">Chronic illnesses, allergies, or relevant medical conditions</label>
            <textarea class="form-control" name="medical_history" rows="3" 
                      data-i18n="[placeholder]medical_info.medical_history_placeholder"></textarea>
          </div>
        </div>
        
        <!-- Historial Quirúrgico -->
        <div class="form-section">
          <h3><i class="fas fa-procedures"></i> <span data-i18n="medical_info.surgical_history_title">Surgical History</span></h3>
          <div class="form-group">
            <label data-i18n="medical_info.surgical_history_label">Previous surgeries or hospitalizations</label>
            <textarea class="form-control" name="surgical_history" rows="2" 
                      data-i18n="[placeholder]medical_info.surgical_history_placeholder"></textarea>
          </div>
        </div>
        
        <!-- Medicamentos -->
        <div class="form-section">
          <h3><i class="fas fa-pills"></i> <span data-i18n="medical_info.medications_title">Current Medications</span></h3>
          <div class="form-group">
            <label data-i18n="medical_info.medications_label">Medications you're currently taking (include dosage if possible)</label>
            <textarea class="form-control" name="medications" rows="2" 
                      data-i18n="[placeholder]medical_info.medications_placeholder"></textarea>
          </div>
        </div>
        
        <!-- Laboratorios -->
        <div class="form-section">
          <h3><i class="fas fa-flask"></i> <span data-i18n="medical_info.labs_title">Laboratory Results</span></h3>
          
          <div class="form-group">
            <label data-i18n="medical_info.recent_labs_label">Most Recent Results</label>
            <textarea class="form-control" name="recent_labs" rows="2" 
                      data-i18n="[placeholder]medical_info.labs_placeholder"></textarea>
          </div>
          
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label data-i18n="medical_info.3month_labs_label">Results from 3 Months Ago</label>
                <textarea class="form-control" name="3month_labs" rows="2"></textarea>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label data-i18n="medical_info.6month_labs_label">Results from 6 Months Ago</label>
                <textarea class="form-control" name="6month_labs" rows="2"></textarea>
              </div>
            </div>
          </div>
          
          <div class="form-group">
            <label data-i18n="medical_info.1year_labs_label">Results from 1 Year Ago</label>
            <textarea class="form-control" name="1year_labs" rows="2"></textarea>
          </div>
        </div>
        
        <div class="text-center" style="margin-top: 40px;">
          <button type="submit" class="btn btn-submit">
            <i class="fas fa-check-circle"></i> <span data-i18n="medical_info.submit_button">Submit Information</span>
          </button>
        </div>
      </form>
    </div>
  </div>

  <!-- Footer -->
  <?php include 'footer.php'; ?>

  <!-- jQuery & Bootstrap JS -->
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
    });

    // Contador de palabras para el motivo de consulta
    function updateWordCount(textarea, counterId) {
      const text = textarea.value.trim();
      const wordCount = text ? text.split(/\s+/).length : 0;
      document.getElementById(counterId).textContent = wordCount;
      
      // Cambiar color si se acerca al límite
      const counter = document.getElementById(counterId);
      if (wordCount > 45) {
        counter.style.color = '#dc3545';
      } else if (wordCount > 35) {
        counter.style.color = '#fd7e14';
      } else {
        counter.style.color = '#666';
      }
    }
    
    // Validación antes de enviar
    document.querySelector('form').addEventListener('submit', function(e) {
      const reasonText = document.querySelector('[name="reason"]').value.trim();
      const wordCount = reasonText ? reasonText.split(/\s+/).length : 0;
      
      if (wordCount > 50) {
        alert(t('medical_info.word_limit_alert'));
        e.preventDefault();
      }
    });
  </script>
</body>
</html>