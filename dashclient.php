<?php
// Configuración de sesión
$customSessionPath = '/home1/ats/tmp_sessions';
if (!file_exists($customSessionPath)) {
    mkdir($customSessionPath, 0700, true);
}
ini_set('session.save_path', $customSessionPath);

// Iniciar sesión antes de cualquier salida
session_start();

$defaultLang = 'es';
$availableLangs = ['es', 'en'];

// Determinar idioma
if (isset($_GET['lang']) && in_array($_GET['lang'], $availableLangs)) {
    $_SESSION['lang'] = $_GET['lang'];
    setcookie('lang', $_GET['lang'], time() + (86400 * 30), "/");
    $currentLang = $_GET['lang'];
} elseif (isset($_SESSION['lang'])) {
    $currentLang = $_SESSION['lang'];
} elseif (isset($_COOKIE['lang'])) {
    $currentLang = $_COOKIE['lang'];
} else {
    $currentLang = $defaultLang;
    $_SESSION['lang'] = $currentLang;
}

// Lógica para selección de especialidad
if (isset($_POST['select_specialty'])) {
    $specialty = $_POST['specialty'];
    // Guardar en sesión
    $_SESSION['selected_specialty'] = $specialty;
}
?>
<!DOCTYPE html>
<html lang="<?php echo $currentLang; ?>">
<head>
  <meta charset="UTF-8">
  <title data-i18n="specialty.page_title">Select Specialty | TeleConsultations</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap CSS (CDN) -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <!-- Font Awesome for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <style>
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

    /* Spacing so the content is not hidden under the fixed navbar */
    .top-spacing {
      margin-top: 80px;
    }

    /* Centered "card" container */
    .specialty-card {
      max-width: 900px;
      margin: 0 auto;
      background: #fff;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    /* Form header */
    .specialty-header {
      text-align: center;
      margin-bottom: 30px;
      position: relative;
    }
    .specialty-header h2 {
      color: #3358aa;
      font-weight: bold;
      margin-bottom: 10px;
    }
    .specialty-header p {
      color: #666;
    }
    .specialty-header:after {
      content: "";
      display: block;
      width: 50px;
      height: 3px;
      background: #20a967;
      margin: 15px auto;
    }

    /* Submit button */
    .specialty-btn {
      background-color: #20a967;
      border-color: #1e8e5d;
      color: white;
      padding: 12px 30px;
      font-weight: bold;
      text-transform: uppercase;
      letter-spacing: 1px;
      transition: all 0.3s;
      width: 100%;
    }
    .specialty-btn:hover {
      background-color: #1e8e5d;
      border-color: #167349;
      color: white;
    }

    /* Specialty selection */
    .specialty-options {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      justify-content: center;
      margin: 30px 0;
    }
    .specialty-option {
      flex: 1;
      min-width: 250px;
      max-width: 300px;
    }
    .specialty-option input[type="radio"] {
      display: none;
    }
    .specialty-option label {
      display: block;
      padding: 25px;
      background: #f8f9fa;
      border: 2px solid #ddd;
      border-radius: 8px;
      text-align: center;
      cursor: pointer;
      transition: all 0.3s;
      height: 100%;
    }
    .specialty-option label:hover {
      border-color: #3358aa;
    }
    .specialty-option input[type="radio"]:checked + label {
      background: #3358aa;
      border-color: #3358aa;
      color: white;
    }
    .specialty-option .specialty-icon {
      font-size: 40px;
      margin-bottom: 15px;
      color: #3358aa;
    }
    .specialty-option input[type="radio"]:checked + label .specialty-icon {
      color: white;
    }
    .specialty-option .specialty-name {
      font-size: 18px;
      font-weight: bold;
      margin-bottom: 10px;
    }
    .specialty-option .specialty-desc {
      font-size: 14px;
      color: #666;
    }
    .specialty-option input[type="radio"]:checked + label .specialty-desc {
      color: #eee;
    }

    /* Modal styles */
    .terms-modal .modal-header {
      background-color: #3358aa;
      color: white;
      border-bottom: none;
    }
    .terms-modal .modal-title {
      font-weight: bold;
    }
    .terms-modal .modal-body {
      max-height: 60vh;
      overflow-y: auto;
      padding: 20px;
    }
    .terms-modal .modal-footer {
      border-top: none;
      padding: 15px 20px;
    }
    .terms-list {
      margin-bottom: 20px;
    }
    .terms-list li {
      margin-bottom: 15px;
      line-height: 1.5;
    }
    .terms-checkbox {
      margin-top: 20px;
      padding: 15px;
      background: #f8f9fa;
      border-radius: 4px;
    }
    .terms-checkbox label {
      font-weight: normal;
      cursor: pointer;
      display: flex;
      align-items: center;
    }
    .terms-checkbox input[type="checkbox"] {
      margin-right: 10px;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
      .specialty-option {
        min-width: 100%;
      }
      .specialty-card {
        padding: 20px;
      }
    }
  </style>
</head>
<body>

  <!-- TOP NAVBAR -->
  <nav class="navbar navbar-default navbar-fixed-top custom-navbar">
    <div class="container">
      <div class="navbar-header">
        <!-- Mobile menu toggle button -->
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1">
          <span class="icon-bar" style="background-color:#fff;"></span>
          <span class="icon-bar" style="background-color:#fff;"></span>
          <span class="icon-bar" style="background-color:#fff;"></span>
        </button>
        <!-- Logo and title -->
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
                <a href="?lang=es" class="language-btn <?php echo $currentLang === 'es' ? 'active' : ''; ?>">ES</a>
                <a href="?lang=en" class="language-btn <?php echo $currentLang === 'en' ? 'active' : ''; ?>">EN</a>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Space so content isn't hidden under the navbar -->
  <div class="top-spacing"></div>

  <!-- Specialty selection page -->
  <div class="specialty-card">
    <div class="specialty-header">
      <h2 data-i18n="specialty.select_specialty_header">Select Your Specialty</h2>
      <p data-i18n="specialty.select_specialty_subheader">Please choose the medical specialty you need</p>
    </div>

    <?php if (isset($_POST['select_specialty'])): ?>
      <div class="alert alert-success text-center">
        <h4 data-i18n="specialty.selected_specialty">Specialty Selected: <?php echo htmlspecialchars($specialty); ?></h4>
        <p data-i18n="specialty.redirect_message">You will be redirected to your dashboard shortly.</p>
      </div>
    <?php else: ?>
      <form id="specialtyForm" method="post" action="" class="specialty-form">
        <div class="specialty-options">
          <div class="specialty-option">
            <input type="radio" id="internal_medicine" name="specialty" value="Internal Medicine" required>
            <label for="internal_medicine">
              <div class="specialty-icon">
                <i class="fas fa-heartbeat"></i>
              </div>
              <div class="specialty-name" data-i18n="specialty.internal_medicine">Internal Medicine</div>
              <div class="specialty-desc" data-i18n="specialty.internal_medicine_desc">
                Comprehensive care for adults, focusing on diagnosis and treatment of complex diseases.
              </div>
            </label>
          </div>

          <div class="specialty-option">
            <input type="radio" id="nephrology" name="specialty" value="Nephrology">
            <label for="nephrology">
              <div class="specialty-icon">
                <i class="fas fa-kidneys"></i>
              </div>
              <div class="specialty-name" data-i18n="specialty.nephrology">Nephrology</div>
              <div class="specialty-desc" data-i18n="specialty.nephrology_desc">
                Specialized care for kidney diseases, hypertension, and related conditions.
              </div>
            </label>
          </div>
        </div>

        <button type="button" id="confirmBtn" class="btn specialty-btn">
          <i class="fas fa-check-circle"></i> <span data-i18n="specialty.confirm_button">Confirm Selection</span>
        </button>
      </form>
    <?php endif; ?>
  </div>

  <!-- Terms and Conditions Modal -->
  <div class="modal fade terms-modal" id="termsModal" tabindex="-1" role="dialog" aria-labelledby="termsModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" style="color:white;">&times;</span>
          </button>
          <h4 class="modal-title" id="termsModalLabel" data-i18n="specialty.terms_title">Terms and Conditions</h4>
        </div>
        <div class="modal-body">
          <h4 data-i18n="specialty.important_info">Important Information About Your Consultation</h4>
          <p data-i18n="specialty.read_terms">Please read and acknowledge the following terms before proceeding:</p>
          
          <ul class="terms-list">
            <li data-i18n="specialty.terms_disclaimer">
              <strong>Medical Advice Disclaimer:</strong> You understand and agree that TeleConsultations provides medical advice based on the information you provide. The physicians are not liable for any outcomes resulting from the advice given during the consultation. You agree to indemnify and hold harmless the medical professionals from any claims arising from the consultation.
            </li>
            
            <li data-i18n="specialty.terms_duration">
              <strong>Consultation Duration:</strong> Each consultation is strictly limited to 8 minutes of direct interaction with the physician, with an additional 2 minutes allocated for closing the session (10 minutes total). If you require more time, you may need to schedule an additional consultation.
            </li>
            
            <li data-i18n="specialty.terms_payment">
              <strong>Payment Policy:</strong> All consultation fees are non-refundable once the session has begun. If you experience technical difficulties, please contact our support team immediately.
            </li>
            
            <li data-i18n="specialty.terms_patient">
              <strong>Single Patient Policy:</strong> Each consultation is intended for one patient only. Sharing your consultation with others is strictly prohibited and may result in termination of your account.
            </li>
          </ul>
          
          <div class="terms-checkbox">
            <label>
              <input type="checkbox" id="acceptTerms" required>
              <span data-i18n="specialty.terms_acceptance">I have read, understood, and agree to all the terms and conditions outlined above. I acknowledge that by checking this box, I am electronically signing this agreement.</span>
            </label>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" data-i18n="specialty.cancel_button">Cancel</button>
          <button type="button" id="proceedBtn" class="btn btn-primary" disabled data-i18n="specialty.proceed_button">Proceed to Consultation</button>
        </div>
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
      
      // Handle confirm button click
      $('#confirmBtn').click(function() {
        // Validate that a specialty is selected
        if ($('input[name="specialty"]:checked').length > 0) {
          $('#termsModal').modal('show');
        } else {
          alert(t('specialty.select_specialty_alert'));
        }
      });

      // Enable/disable proceed button based on checkbox
      $('#acceptTerms').change(function() {
        $('#proceedBtn').prop('disabled', !$(this).is(':checked'));
      });

      // Handle proceed button click
      $('#proceedBtn').click(function() {
        // Get the selected specialty
        var specialty = $('input[name="specialty"]:checked').val();
        // Redirect to appointment.php with the specialty parameter
        window.location.href = 'appointment.php?specialty=' + encodeURIComponent(specialty) + '&lang=' + currentLang;
      });
    });
  </script>
</body>
</html>