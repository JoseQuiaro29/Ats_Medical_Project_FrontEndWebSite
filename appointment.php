<?php
// Enable error reporting (optional for debugging)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Procesar la especialidad seleccionada
$specialty = isset($_POST['specialty']) ? $_POST['specialty'] : (isset($_GET['specialty']) ? $_GET['specialty'] : '');
if (empty($specialty)) {
    header('Location: dashclient.php');
    exit();
}

// Configuración de doctores - Solo Dr. Manuel García para ambas especialidades
$doctors = [
    'Internal Medicine' => [
        ['id' => 1, 'name' => 'Dr. Manuel García', 'image' => 'doctor_garcia.jpg', 'bio' => 'Especialista en Medicina Interna con 15 años de experiencia. Atención personalizada y enfoque preventivo.']
    ],
    'Nephrology' => [
        ['id' => 1, 'name' => 'Dr. Manuel García', 'image' => 'doctor_garcia.jpg', 'bio' => 'Nefrólogo certificado con amplia experiencia en enfermedades renales y trasplantes.']
    ]
];

// Horarios disponibles (simulado) - Bloques de 10 minutos
$available_slots = [
    '9:00 AM', '9:10 AM', '9:20 AM', '9:30 AM', '9:40 AM', '9:50 AM',
    '10:00 AM', '10:10 AM', '10:20 AM', '10:30 AM', '10:40 AM', '10:50 AM',
    '11:00 AM', '11:10 AM', '11:20 AM', '11:30 AM', '11:40 AM', '11:50 AM',
    '2:00 PM', '2:10 PM', '2:20 PM', '2:30 PM', '2:40 PM', '2:50 PM',
    '3:00 PM', '3:10 PM', '3:20 PM', '3:30 PM', '3:40 PM', '3:50 PM',
    '4:00 PM', '4:10 PM', '4:20 PM', '4:30 PM', '4:40 PM', '4:50 PM'
];

// Días disponibles (próximos 14 días, excluyendo fines de semana)
$available_dates = [];
$date = new DateTime();
for ($i = 0; $i < 14; $i++) {
    $date->modify('+1 day');
    if ($date->format('N') < 6) { // 1-5 (lunes a viernes)
        $available_dates[] = $date->format('Y-m-d');
    }
}

// Procesar el formulario de cita
if (isset($_POST['book_appointment'])) {
    $doctor_id = $_POST['doctor_id'];
    $appointment_date = $_POST['appointment_date'];
    $appointment_time = $_POST['appointment_time'];
    $specialty = $_POST['specialty'];
    
    // Redirigir a payments.php con todos los datos necesarios
    header('Location: payments.php?doctor_id='.$doctor_id.'&date='.$appointment_date.'&time='.$appointment_time.'&specialty='.urlencode($specialty));
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Book Appointment | TeleConsultations</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap CSS (CDN) -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <!-- Font Awesome for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <!-- Flatpickr for calendar -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

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
    .appointment-container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 20px 30px;
    }

    /* Header */
    .appointment-header {
      text-align: center;
      margin-bottom: 30px;
    }
    .appointment-header h2 {
      color: var(--primary-color);
      font-weight: 700;
      margin-bottom: 10px;
    }
    .appointment-header .specialty-badge {
      display: inline-block;
      background: var(--secondary-color);
      color: white;
      padding: 8px 20px;
      border-radius: 30px;
      margin-top: 15px;
      font-size: 16px;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    /* Doctor selection - Simplified since there's only one doctor */
    .doctor-section {
      background: white;
      border-radius: 10px;
      padding: 25px;
      margin-bottom: 30px;
      box-shadow: 0 3px 15px rgba(0,0,0,0.05);
      border: 1px solid #e1e5eb;
    }
    .doctor-card {
      display: flex;
      align-items: center;
      padding: 20px;
      background: var(--light-bg);
      border-radius: 8px;
    }
    .doctor-card img {
      width: 120px;
      height: 120px;
      border-radius: 50%;
      object-fit: cover;
      margin-right: 25px;
      border: 3px solid white;
      box-shadow: 0 3px 10px rgba(0,0,0,0.1);
    }
    .doctor-info h3 {
      color: var(--primary-color);
      margin-bottom: 5px;
      font-weight: 600;
    }
    .doctor-info .specialty {
      display: inline-block;
      background: var(--primary-color);
      color: white;
      padding: 3px 12px;
      border-radius: 15px;
      font-size: 14px;
      margin-bottom: 10px;
    }
    .doctor-info p {
      color: var(--light-text);
      margin-bottom: 5px;
    }
    .doctor-info .rating {
      color: #ffc107;
      font-size: 16px;
    }

    /* Schedule section - Reorganized layout */
    .schedule-wrapper {
      display: flex;
      flex-wrap: wrap;
      gap: 30px;
      margin-bottom: 30px;
    }
    
    .calendar-section {
      flex: 1;
      min-width: 300px;
      background: white;
      padding: 25px;
      border-radius: 10px;
      box-shadow: 0 3px 15px rgba(0,0,0,0.05);
      border: 1px solid #e1e5eb;
      display: flex;
      flex-direction: column;
    }
    
    .calendar-summary-container {
      flex: 1;
      display: flex;
      flex-direction: column;
    }
    
    .time-section {
      flex: 1;
      min-width: 300px;
      background: white;
      padding: 25px;
      border-radius: 10px;
      box-shadow: 0 3px 15px rgba(0,0,0,0.05);
      border: 1px solid #e1e5eb;
    }
    
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

    /* Calendar styles */
    .flatpickr-calendar {
      margin: 0 auto;
      box-shadow: none;
      border: none;
    }
    .flatpickr-day.selected {
      background: var(--primary-color);
      border-color: var(--primary-color);
    }
    .flatpickr-day.today {
      border-color: var(--secondary-color);
    }
    .flatpickr-day:hover {
      background: #e6f7f0;
      border-color: #e6f7f0;
    }

    /* Time slots */
    .time-slots-container {
      max-height: 400px;
      overflow-y: auto;
      padding-right: 10px;
    }
    .time-slots {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(110px, 1fr));
      gap: 12px;
    }
    .time-slot {
      padding: 12px 5px;
      text-align: center;
      background: var(--light-bg);
      border: 1px solid #ddd;
      border-radius: 6px;
      cursor: pointer;
      transition: all 0.2s;
      font-size: 14px;
    }
    .time-slot:hover {
      border-color: var(--primary-color);
      color: var(--primary-color);
      transform: translateY(-2px);
    }
    .time-slot.selected {
      background: var(--primary-color);
      border-color: var(--primary-color);
      color: white;
      font-weight: 500;
    }
    .time-slot.booked {
      background: #f8d7da;
      color: #dc3545;
      cursor: not-allowed;
      text-decoration: line-through;
      opacity: 0.7;
    }
    .time-group {
      margin-bottom: 20px;
    }
    .time-group-title {
      color: var(--primary-color);
      font-weight: 500;
      margin-bottom: 10px;
      padding-left: 5px;
    }

    /* Booking summary - Moved next to calendar */
    .booking-summary-compact {
      margin-top: 20px;
      padding: 20px;
      background: var(--light-bg);
      border-radius: 8px;
      border: 1px solid #e1e5eb;
    }
    .summary-title {
      color: var(--primary-color);
      font-weight: 600;
      margin-bottom: 15px;
      display: flex;
      align-items: center;
      font-size: 16px;
    }
    .summary-title i {
      margin-right: 10px;
      color: var(--secondary-color);
      font-size: 18px;
    }
    .summary-item {
      margin-bottom: 12px;
      display: flex;
    }
    .summary-label {
      font-weight: 500;
      color: var(--dark-text);
      min-width: 80px;
      font-size: 14px;
    }
    .summary-value {
      color: var(--primary-color);
      font-weight: 500;
      font-size: 14px;
    }
    .summary-value.empty {
      color: #999;
      font-style: italic;
    }

    /* Submit button */
    .book-btn {
      background-color: var(--secondary-color);
      border: none;
      color: white;
      padding: 15px 40px;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 1px;
      transition: all 0.3s;
      width: 100%;
      max-width: 350px;
      margin: 30px auto 0;
      display: block;
      border-radius: 50px;
      font-size: 16px;
      box-shadow: 0 4px 10px rgba(32, 169, 103, 0.3);
    }
    .book-btn:hover {
      background-color: #1a8a55;
      color: white;
      transform: translateY(-2px);
      box-shadow: 0 6px 15px rgba(32, 169, 103, 0.4);
    }
    .book-btn:disabled {
      background-color: #cccccc;
      cursor: not-allowed;
      transform: none;
      box-shadow: none;
    }
    .book-btn i {
      margin-right: 8px;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
      .appointment-container {
        padding: 20px 15px;
      }
      .schedule-wrapper {
        flex-direction: column;
      }
      .doctor-card {
        flex-direction: column;
        text-align: center;
      }
      .doctor-card img {
        margin-right: 0;
        margin-bottom: 15px;
      }
      .time-slots {
        grid-template-columns: repeat(auto-fill, minmax(90px, 1fr));
      }
      .summary-item {
        flex-direction: column;
      }
      .summary-label {
        margin-bottom: 5px;
        min-width: auto;
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
          TeleConsultations
        </a>
      </div>

      <!-- Right-side links -->
      <div class="collapse navbar-collapse" id="navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li>
          </li>
          <li>
            <a href="index.php" style="color:#fff;"><i class="fas fa-home"></i> Home</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Space so content isn't hidden under the navbar -->
  <div class="top-spacing"></div>

  <!-- Main appointment container -->
  <div class="appointment-container">
    <div class="appointment-header">
      <h2>Book Your Teleconsultation</h2>
      <div class="specialty-badge">
        <i class="fas fa-stethoscope"></i> <?php echo htmlspecialchars($specialty); ?>
      </div>
    </div>

    <form method="post" action="appointment.php">
      <input type="hidden" name="specialty" value="<?php echo htmlspecialchars($specialty); ?>">
      
      <!-- Doctor Selection -->
      <div class="doctor-section">
        <h3 class="section-title"><i class="fas fa-user-md"></i> Your Doctor</h3>
        <?php $doctor = $doctors[$specialty][0]; ?>
        <div class="doctor-card">
          <img src="images/doctors/<?php echo $doctor['image']; ?>" alt="<?php echo htmlspecialchars($doctor['name']); ?>">
          <div class="doctor-info">
            <h3><?php echo htmlspecialchars($doctor['name']); ?></h3>
            <span class="specialty"><?php echo htmlspecialchars($specialty); ?></span>
            <p class="rating"><i class="fas fa-star"></i> 4.9 (245 reviews)</p>
            <p><?php echo $doctor['bio']; ?></p>
          </div>
        </div>
        <input type="hidden" id="doctor_id" name="doctor_id" value="<?php echo $doctor['id']; ?>">
      </div>

      <!-- Date, Time and Summary Section -->
      <div class="schedule-wrapper">
        <!-- Calendar and Summary Container -->
        <div class="calendar-summary-container">
          <div class="calendar-section">
            <h3 class="section-title"><i class="far fa-calendar-alt"></i> Select Date</h3>
            <input type="text" id="appointmentDate" name="appointment_date" class="form-control" placeholder="Click to choose date" readonly>
            <div class="mt-3 text-muted small">
              <i class="fas fa-info-circle"></i> Available dates are highlighted
            </div>
          </div>
          
          <!-- Compact Booking Summary - Moved below calendar -->
          <div class="booking-summary-compact">
            <h3 class="summary-title"><i class="fas fa-clipboard-list"></i> Summary</h3>
            <div class="summary-item">
              <div class="summary-label">Doctor:</div>
              <div class="summary-value">Dr. Manuel García</div>
            </div>
            <div class="summary-item">
              <div class="summary-label">Date:</div>
              <div class="summary-value empty" id="compactSummaryDate">Not selected</div>
            </div>
            <div class="summary-item">
              <div class="summary-label">Time:</div>
              <div class="summary-value empty" id="compactSummaryTime">Not selected</div>
            </div>
            <div class="summary-item">
              <div class="summary-label">Duration:</div>
              <div class="summary-value">10 minutes</div>
            </div>
          </div>
        </div>
        
        <!-- Time Selection -->
        <div class="time-section">
          <h3 class="section-title"><i class="far fa-clock"></i> Select Time</h3>
          <div class="time-slots-container">
            <div class="time-group">
              <div class="time-group-title">Morning</div>
              <div class="time-slots">
                <?php 
                foreach ($available_slots as $slot) {
                  if (strpos($slot, 'AM') !== false) {
                    echo '<div class="time-slot" onclick="selectTimeSlot(this, \''.$slot.'\')">'.$slot.'</div>';
                  }
                }
                ?>
              </div>
            </div>
            
            <div class="time-group">
              <div class="time-group-title">Afternoon</div>
              <div class="time-slots">
                <?php 
                foreach ($available_slots as $slot) {
                  if (strpos($slot, 'PM') !== false) {
                    echo '<div class="time-slot" onclick="selectTimeSlot(this, \''.$slot.'\')">'.$slot.'</div>';
                  }
                }
                ?>
              </div>
            </div>
          </div>
          <input type="hidden" id="appointmentTime" name="appointment_time" value="">
        </div>
      </div>

      <!-- Submit Button -->
      <button type="submit" name="book_appointment" class="btn book-btn" disabled id="bookButton">
        <i class="fas fa-calendar-check"></i> Confirm Appointment
      </button>
    </form>
  </div>

  <!-- Footer -->
  <?php include 'footer.php'; ?>

  <!-- jQuery & Bootstrap JS (CDN) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <!-- Flatpickr JS -->
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

  <script>
    // Initialize date picker
    const datePicker = flatpickr("#appointmentDate", {
      minDate: "today",
      maxDate: new Date().fp_incr(14), // 14 days from now
      enable: [
        <?php 
          foreach ($available_dates as $date) {
            echo "'".$date."',";
          }
        ?>
      ],
      onChange: function(selectedDates, dateStr, instance) {
        updateSummary();
        checkBookingReady();
      }
    });

    // Select time slot function
    function selectTimeSlot(element, time) {
      $('.time-slot').removeClass('selected');
      $(element).addClass('selected');
      $('#appointmentTime').val(time);
      updateSummary();
      checkBookingReady();
    }

    // Update booking summary
    function updateSummary() {
      const date = $('#appointmentDate').val();
      const time = $('#appointmentTime').val();
      
      if (date) {
        $('#compactSummaryDate').text(date).removeClass('empty');
      }
      if (time) {
        $('#compactSummaryTime').text(time).removeClass('empty');
      }
    }

    // Check if booking is ready to be submitted
    function checkBookingReady() {
      const dateSelected = $('#appointmentDate').val() !== '';
      const timeSelected = $('#appointmentTime').val() !== '';
      
      if (dateSelected && timeSelected) {
        $('#bookButton').prop('disabled', false);
      } else {
        $('#bookButton').prop('disabled', true);
      }
    }

    // Simulate some booked slots (in a real app, this would come from the server)
    $(document).ready(function() {
      // Randomly mark some slots as booked for demo purposes
      $('.time-slot').each(function() {
        if (Math.random() < 0.3) { // 30% chance to be booked
          $(this).addClass('booked');
          $(this).attr('onclick', '');
        }
      });
    });
  </script>
</body>
</html>