<?php
// Enable error reporting (optional for debugging)
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

// Obtener los datos de la cita
$doctor_id = isset($_GET['doctor_id']) ? $_GET['doctor_id'] : '';
$appointment_date = isset($_GET['date']) ? $_GET['date'] : '';
$appointment_time = isset($_GET['time']) ? $_GET['time'] : '';
$specialty = isset($_GET['specialty']) ? urldecode($_GET['specialty']) : '';

// Verificar que todos los datos estén presentes
if (empty($doctor_id) || empty($appointment_date) || empty($appointment_time) || empty($specialty)) {
    header('Location: dashclient.php');
    exit();
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
$appointment_price = $doctor['price'];
$appointment_total = $appointment_price;
?>

<!DOCTYPE html>
<html lang="<?php echo $currentLang; ?>">
<head>
  <meta charset="UTF-8">
  <title data-i18n="payment.page_title">Payment | TeleConsultations</title>
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
    .payment-container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 20px;
    }

    /* Payment grid */
    .payment-grid {
      display: flex;
      flex-wrap: wrap;
      gap: 30px;
    }
    
    .payment-info-section, .payment-methods-section {
      flex: 1;
      min-width: 300px;
    }

    /* Payment card */
    .payment-card {
      background: white;
      border-radius: 10px;
      padding: 30px;
      margin-bottom: 30px;
      box-shadow: 0 3px 15px rgba(0,0,0,0.05);
      border: 1px solid #e1e5eb;
      height: 100%;
    }

    /* Section titles */
    .section-title {
      color: var(--primary-color);
      font-weight: 600;
      margin-bottom: 20px;
      padding-bottom: 10px;
      border-bottom: 2px solid #eee;
      display: flex;
      align-items: center;
    }
    .section-title i {
      margin-right: 10px;
      color: var(--secondary-color);
    }

    /* Appointment summary */
    .summary-item {
      margin-bottom: 15px;
      display: flex;
      justify-content: space-between;
    }
    .summary-label {
      font-weight: 500;
      color: var(--dark-text);
    }
    .summary-value {
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

    /* Payment methods */
    .payment-methods {
      margin-top: 10px;
    }
    .payment-option {
      border: 1px solid #ddd;
      border-radius: 8px;
      padding: 15px;
      margin-bottom: 15px;
      cursor: pointer;
      transition: all 0.3s;
    }
    .payment-option.fixed {
      cursor: default;
    }
    .payment-option:hover:not(.fixed) {
      border-color: var(--primary-color);
      background-color: rgba(51, 88, 170, 0.05);
    }
    .payment-option.selected {
      border-color: var(--secondary-color);
      background-color: rgba(32, 169, 103, 0.05);
    }
    .payment-option .payment-icon {
      font-size: 24px;
      margin-right: 10px;
      color: var(--primary-color);
    }
    .payment-option .payment-title {
      font-weight: 600;
      margin-bottom: 5px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    .payment-option .payment-title .toggle-icon {
      color: var(--light-text);
      font-size: 16px;
    }
    .payment-option.fixed .payment-title .toggle-icon {
      display: none;
    }
    .payment-option .payment-description {
      color: var(--light-text);
      font-size: 14px;
    }

    /* Payment forms */
    .payment-form {
      margin-top: 20px;
      padding: 20px;
      background: var(--light-bg);
      border-radius: 8px;
    }
    .payment-form.collapsible {
      display: none;
    }
    .payment-form.collapsible.active {
      display: block;
    }
    
    /* Stripe-specific styles */
    .stripe-payment-form .form-group {
      margin-bottom: 15px;
    }
    .stripe-payment-form label {
      display: block;
      margin-bottom: 5px;
      font-weight: 500;
    }
    .stripe-payment-form .form-control {
      width: 100%;
      padding: 10px;
      border: 1px solid #ddd;
      border-radius: 4px;
    }
    .stripe-brand {
      display: flex;
      align-items: center;
      margin-top: 15px;
    }
    .stripe-brand img {
      height: 26px;
      margin-left: 10px;
    }

    /* Submit button */
    .pay-btn {
      background-color: var(--secondary-color);
      border: none;
      color: white;
      padding: 15px 40px;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 1px;
      transition: all 0.3s;
      width: 100%;
      margin: 30px auto 0;
      display: block;
      border-radius: 50px;
      font-size: 16px;
      box-shadow: 0 4px 10px rgba(32, 169, 103, 0.3);
    }
    .pay-btn:hover {
      background-color: #1a8a55;
      color: white;
      transform: translateY(-2px);
      box-shadow: 0 6px 15px rgba(32, 169, 103, 0.4);
    }
    .pay-btn:disabled {
      background-color: #cccccc;
      cursor: not-allowed;
      transform: none;
      box-shadow: none;
    }
    .pay-btn i {
      margin-right: 8px;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
      .payment-container {
        padding: 15px;
      }
      .payment-grid {
        flex-direction: column;
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

  <!-- Space so content isn't hidden under the navbar -->
  <div class="top-spacing"></div>

  <!-- Main payment container -->
  <div class="payment-container">
    <div class="payment-grid">
      <!-- Left Column: Payment Information -->
      <div class="payment-info-section">
        <div class="payment-card">
          <h2 class="section-title">
            <i class="fas fa-info-circle"></i> <span data-i18n="payment.summary_title">Appointment Summary</span>
          </h2>
          
          <div class="summary-item">
            <span class="summary-label" data-i18n="payment.doctor_label">Doctor:</span>
            <span class="summary-value"><?php echo htmlspecialchars($doctor['name']); ?></span>
          </div>
          
          <div class="summary-item">
            <span class="summary-label" data-i18n="payment.specialty_label">Specialty:</span>
            <span class="summary-value"><?php echo htmlspecialchars($specialtyTranslations[$currentLang][$specialty]); ?></span>
          </div>
          
          <div class="summary-item">
            <span class="summary-label" data-i18n="payment.date_label">Date:</span>
            <span class="summary-value"><?php echo htmlspecialchars(date('F j, Y', strtotime($appointment_date))); ?></span>
          </div>
          
          <div class="summary-item">
            <span class="summary-label" data-i18n="payment.time_label">Time:</span>
            <span class="summary-value"><?php echo htmlspecialchars($appointment_time); ?></span>
          </div>
          
          <div class="summary-item">
            <span class="summary-label" data-i18n="payment.fee_label">Consultation Fee:</span>
            <span class="summary-value">$<?php echo number_format($appointment_price, 2); ?></span>
          </div>
          
          <div class="summary-item total-amount">
            <span class="summary-label" data-i18n="payment.total_label">Total Amount:</span>
            <span class="summary-value">$<?php echo number_format($appointment_total, 2); ?></span>
          </div>
        </div>
      </div>
      
      <!-- Right Column: Payment Methods -->
      <div class="payment-methods-section">
        <div class="payment-card">
          <h2 class="section-title">
            <i class="fas fa-credit-card"></i> <span data-i18n="payment.methods_title">Payment Methods</span>
          </h2>
          
          <div class="payment-methods">
            <!-- Credit/Debit Card -->
            <div class="payment-option selected" onclick="togglePaymentMethod('credit-card')">
              <div class="payment-title">
                <span>
                  <i class="far fa-credit-card payment-icon"></i>
                  <span data-i18n="payment.credit_card">Credit/Debit Card</span>
                </span>
                <i class="fas fa-chevron-down toggle-icon"></i>
              </div>
              <p class="payment-description" data-i18n="payment.credit_card_desc">Pay with Visa, Mastercard, American Express or Discover</p>
              
              <div class="payment-form collapsible active" id="credit-card-form">
                <form id="card-payment-form">
                  <div class="form-group">
                    <label for="card-number" data-i18n="payment.card_number">Card Number</label>
                    <input type="text" class="form-control" id="card-number" data-i18n="[placeholder]payment.card_number_placeholder" required>
                  </div>
                  
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="card-expiry" data-i18n="payment.expiry_date">Expiration Date</label>
                        <input type="text" class="form-control" id="card-expiry" data-i18n="[placeholder]payment.expiry_placeholder" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="card-cvc" data-i18n="payment.cvc_label">Security Code (CVC)</label>
                        <input type="text" class="form-control" id="card-cvc" data-i18n="[placeholder]payment.cvc_placeholder" required>
                      </div>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="card-name" data-i18n="payment.card_name">Name on Card</label>
                    <input type="text" class="form-control" id="card-name" data-i18n="[placeholder]payment.name_placeholder" required>
                  </div>
                  
                  <div class="form-group">
                    <label for="card-zip" data-i18n="payment.zip_label">ZIP Code</label>
                    <input type="text" class="form-control" id="card-zip" data-i18n="[placeholder]payment.zip_placeholder" required>
                  </div>
                </form>
              </div>
            </div>
            
            <!-- Stripe -->
            <div class="payment-option fixed">
              <div class="payment-title">
                <span>
                  <i class="fab fa-stripe payment-icon"></i>
                  <span data-i18n="payment.stripe">Stripe</span>
                </span>
              </div>
              <p class="payment-description" data-i18n="payment.stripe_desc">Secure payment processing with Stripe</p>
            </div>
            
            <!-- PayPal -->
            <div class="payment-option fixed">
              <div class="payment-title">
                <span>
                  <i class="fab fa-paypal payment-icon"></i>
                  <span data-i18n="payment.paypal">PayPal</span>
                </span>
              </div>
              <p class="payment-description" data-i18n="payment.paypal_desc">Pay with your PayPal account or credit card</p>
            </div>
          </div>
          
          <!-- Submit Button -->
          <button type="button" class="btn pay-btn" onclick="processPayment()">
            <i class="fas fa-lock"></i> <span data-i18n="payment.pay_button">Pay</span> $<?php echo number_format($appointment_total, 2); ?>
          </button>
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
      
      // Formatear número de tarjeta (simulación)
      $('#card-number').on('input', function() {
        let value = $(this).val().replace(/\s+/g, '');
        if (value.length > 0) {
          value = value.match(new RegExp('.{1,4}', 'g')).join(' ');
        }
        $(this).val(value);
      });
      
      // Formatear fecha de expiración (simulación)
      $('#card-expiry').on('input', function() {
        let value = $(this).val().replace(/\D/g, '');
        if (value.length > 2) {
          value = value.substring(0, 2) + '/' + value.substring(2, 4);
        }
        $(this).val(value);
      });
    });

    // Toggle payment method
    function togglePaymentMethod(method) {
      if (method !== 'credit-card') return;
      
      const option = $(event.currentTarget);
      option.toggleClass('selected');
      
      const chevron = option.find('.toggle-icon');
      if (option.hasClass('selected')) {
        chevron.removeClass('fa-chevron-down').addClass('fa-chevron-up');
      } else {
        chevron.removeClass('fa-chevron-up').addClass('fa-chevron-down');
      }
      
      $(`#${method}-form`).slideToggle();
    }
    
    // Procesar el pago
    function processPayment() {
      // Aquí iría la lógica real de pago
      // Después de pago exitoso, redirigir a medical_info.php
      window.location.href = 'medical_info.php?doctor_id=<?php echo $doctor_id; ?>&date=<?php echo $appointment_date; ?>&time=<?php echo $appointment_time; ?>&specialty=<?php echo urlencode($specialty); ?>&lang=<?php echo $currentLang; ?>';
    }
  </script>
</body>
</html>