<?php
// book_appointment.php
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
} elseif (isset($_COOKIE['lang'])) {
    $currentLang = $_COOKIE['lang'];
} else {
    $currentLang = $defaultLang;
    $_SESSION['lang'] = $currentLang;
}

// Lógica para la página de selección de especialidad
if (isset($_POST['select_specialty'])) {
    if (isset($_POST['specialty'])) {
        $specialty = $_POST['specialty'];
        // Redirigir a la página de selección de fecha y hora
        header('Location: date_appointment.php?specialty='.urlencode($specialty).'&lang='.$currentLang);
        exit();
    } else {
        $error_message = "Por favor, selecciona una especialidad médica antes de continuar.";
    }
}

include 'cliheader.php';
include 'sidebar.php';
?>

<!-- Estilos (se mantienen igual) -->
<style>
  /* Estilos generales */
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }
  body {
    font-family: 'Segoe UI', sans-serif;
    background-color: #f0f0f0;
  }
  /* Contenedor principal */
  .content {
    margin: 20px 0 80px 220px; /* Evita superposición con header y footer */
    padding: 20px 40px;
    transition: margin-left 0.3s ease;
  }
  .content.collapsed {
    margin-left: 70px;
  }
  
  /* Specialty card styles */
  .specialty-card {
    background: #fff;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    max-width: 900px;
    margin: 30px auto 80px auto;
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
    background:  #3358aa;
    margin: 15px auto;
  }

  /* Submit button */
  .specialty-btn {
    background-color:  #3358aa;
    border-color: #3358aa;
    color: white;
    padding: 12px 30px;
    font-weight: bold;
    text-transform: uppercase;
    letter-spacing: 1px;
    transition: all 0.3s;
    width: 100%;
  }
  .specialty-btn:hover {
    background-color:rgb(54, 86, 153);
    border-color:rgb(36, 22, 115);
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
    .content {
      margin-left: 70px;
      padding: 15px 20px;
    }
    .specialty-option {
      min-width: 100%;
    }
    .specialty-card {
      padding: 20px;
    }
  }
</style>

<div class="dashboard">
  <div class="content" id="content">

    <!-- Specialty selection page -->
    <div class="specialty-card">
      <div class="specialty-header">
        <h2 data-i18n="specialty.select_specialty_header">Select Your Specialty</h2>
        <p data-i18n="specialty.select_specialty_subheader">Please choose the medical specialty you need</p>
      </div>

      <?php if (isset($error_message)): ?>
        <div class="alert alert-danger text-center">
          <h4><?php echo $error_message; ?></h4>
        </div>
      <?php endif; ?>

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

        <button type="submit" name="select_specialty" class="btn specialty-btn">
          <i class="fas fa-check-circle"></i> <span data-i18n="specialty.confirm_button">Confirm Selection</span>
        </button>
      </form>
    </div>
  </div>
</div>

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
    
    // Validación del formulario
    $('#specialtyForm').submit(function(e) {
      if ($('input[name="specialty"]:checked').length === 0) {
        e.preventDefault();
        alert('Por favor, selecciona una especialidad médica antes de continuar.');
      }
    });
  });
</script>