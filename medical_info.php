<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Obtener datos de la cita
$doctor_id = isset($_GET['doctor_id']) ? $_GET['doctor_id'] : '';
$appointment_date = isset($_GET['date']) ? $_GET['date'] : '';
$appointment_time = isset($_GET['time']) ? $_GET['time'] : '';

// Verificar datos
if (empty($doctor_id) || empty($appointment_date) || empty($appointment_time)) {
    header('Location: dashclient.php');
    exit();
}

// Simular información del doctor
$doctors = [
    1 => [
        'name' => 'Dr. Manuel García',
        'specialty' => 'Internal Medicine',
        'image' => 'doctor_garcia.jpg'
    ]
];
$doctor = $doctors[$doctor_id];

// Procesar el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validar y guardar los datos (en un sistema real, guardarías en la base de datos)
    $medical_info = [
        'reason' => substr($_POST['reason'], 0, 250), // Limitar a 50 palabras aprox
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
    header('Location: confirmation.php?doctor_id='.$doctor_id.'&date='.$appointment_date.'&time='.$appointment_time);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Complete Medical Information | TeleConsultations</title>
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

  <!-- Navbar (igual que en tus otros archivos) -->
  <nav class="navbar navbar-default navbar-fixed-top custom-navbar">
    <!-- ... mismo navbar que en confirmation.php ... -->
  </nav>

  <div class="top-spacing"></div>

  <div class="container">
    <div class="medical-form-container">
      <h2 class="text-center" style="color: var(--primary-color); margin-bottom: 30px;">
        <i class="fas fa-file-medical"></i> Complete Medical Information
      </h2>
      
      <p class="text-center" style="margin-bottom: 30px;">
        Please complete this form to help your doctor prepare for your consultation on 
        <strong><?php echo date('F j, Y', strtotime($appointment_date)); ?> at <?php echo htmlspecialchars($appointment_time); ?></strong>
      </p>
      
      <form method="POST" action="medical_info.php?doctor_id=<?php echo $doctor_id; ?>&date=<?php echo $appointment_date; ?>&time=<?php echo $appointment_time; ?>">
        
        <!-- Motivo de Consulta -->
        <div class="form-section">
          <h3><i class="fas fa-question-circle"></i> Reason for Consultation</h3>
          <div class="form-group">
            <label>Please describe the reason for your visit (50 words maximum)</label>
            <textarea class="form-control" name="reason" rows="3" maxlength="250" 
                      placeholder="Describe your symptoms, concerns, or reason for scheduling this appointment..." 
                      required oninput="updateWordCount(this, 'reason-counter')"></textarea>
            <div class="word-counter">
              <span id="reason-counter">0</span>/50 words
            </div>
          </div>
        </div>
        
        <!-- Historial Médico -->
        <div class="form-section">
          <h3><i class="fas fa-notes-medical"></i> Medical History</h3>
          <div class="form-group">
            <label>Chronic illnesses, allergies, or relevant medical conditions</label>
            <textarea class="form-control" name="medical_history" rows="3" 
                      placeholder="List any chronic conditions, allergies, or relevant medical history..."></textarea>
          </div>
        </div>
        
        <!-- Historial Quirúrgico -->
        <div class="form-section">
          <h3><i class="fas fa-procedures"></i> Surgical History</h3>
          <div class="form-group">
            <label>Previous surgeries or hospitalizations</label>
            <textarea class="form-control" name="surgical_history" rows="2" 
                      placeholder="List any previous surgeries with approximate dates if possible..."></textarea>
          </div>
        </div>
        
        <!-- Medicamentos -->
        <div class="form-section">
          <h3><i class="fas fa-pills"></i> Current Medications</h3>
          <div class="form-group">
            <label>Medications you're currently taking (include dosage if possible)</label>
            <textarea class="form-control" name="medications" rows="2" 
                      placeholder="List all medications, supplements, or vitamins..."></textarea>
          </div>
        </div>
        
        <!-- Laboratorios -->
        <div class="form-section">
          <h3><i class="fas fa-flask"></i> Laboratory Results</h3>
          
          <div class="form-group">
            <label>Most Recent Results</label>
            <textarea class="form-control" name="recent_labs" rows="2" 
                      placeholder="Any recent lab tests or imaging results..."></textarea>
          </div>
          
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Results from 3 Months Ago</label>
                <textarea class="form-control" name="3month_labs" rows="2"></textarea>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Results from 6 Months Ago</label>
                <textarea class="form-control" name="6month_labs" rows="2"></textarea>
              </div>
            </div>
          </div>
          
          <div class="form-group">
            <label>Results from 1 Year Ago</label>
            <textarea class="form-control" name="1year_labs" rows="2"></textarea>
          </div>
        </div>
        
        <div class="text-center" style="margin-top: 40px;">
          <button type="submit" class="btn btn-submit">
            <i class="fas fa-check-circle"></i> Submit Information
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

  <script>
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
        alert('Please limit your reason for consultation to 50 words maximum.');
        e.preventDefault();
      }
    });
  </script>
</body>
</html>