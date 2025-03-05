<?php
session_start();
include 'cliheader.php';
include 'sidebar.php';
?>

<!-- Bloque de CSS separado -->
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
  /* Booking container */
  .booking-container {
    background: #fff;
    padding: 20px 40px;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    max-width: 800px;
    margin: 30px auto 80px auto;
  }
  .booking-container h2 {
    margin-bottom: 15px;
    font-size: 2.5rem;
    font-weight: bold;
    color: #2c3e50;
  }
  .booking-container p {
    margin-bottom: 25px;
    font-size: 1.5rem;
    color: #666;
  }
  /* Formularios */
  .form-group {
    margin-bottom: 15px;
  }
  .form-group label {
    display: block;
    margin-bottom: 5px;
    font-size: 1.5rem;
    color: #333;
  }
  .form-control {
    width: 100%;
    padding: 19x 12px;
    font-size: 1.2rem;
    border: 1px solid #ddd;
    border-radius: 4px;
    transition: border-color 0.3s ease;
  }
  .form-control:focus {
    border-color: #20a967;
    outline: none;
  }
  /* Time slots */
  .time-slots {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin-top: 8px;
  }
  .time-slot {
    background: #f9f9f9;
    border: 1px solid #ddd;
    padding: 8px 12px;
    border-radius: 4px;
    cursor: pointer;
    font-size:1.2rem;
    transition: background 0.3s ease;
  }
  .time-slot:hover,
  .time-slot.active {
    background: #20a967;
    color: #fff;
    border-color: #20a967;
  }
  /* Botón de envío */
  .btn-primary {
    background-color: #20a967;
    border-color: #1e8e5d;
    font-size: 1.5rem;
    padding: 10px 20px;
    border-radius: 4px;
    cursor: pointer;
    transition: background 0.3s ease;
  }
  .btn-primary:hover {
    background-color: #1e8e5d;
    border-color: #1a754e;
  }
  /* Responsive */
  @media (max-width: 768px) {
    .content {
      margin-left: 70px;
      padding: 15px 20px;
    }
    .booking-container {
      padding: 20px;
    }
    .booking-container h2 {
      font-size: 1.6rem;
    }
    .form-control,
    .time-slot,
    .btn-primary {
      font-size: 0.9rem;
    }
  }
</style>

<!-- Contenido HTML -->
<div class="dashboard">
  <div class="content" id="content">

    <div class="booking-container">
        
      <h2>Book an Appointment</h2>
      <p>Please fill out the form below to schedule your appointment.</p>
      <form method="POST" action="book_appointment_process.php">
        <!-- Campo fijo: Doctor -->
        <div class="form-group">
          <label>Doctor:</label>
          <input type="text" class="form-control" value="Dr. Manuel Garcia Estrada" disabled>
          <input type="hidden" name="doctor" value="Dr. Manuel Garcia Estrada">
        </div>
        <!-- Selección de especialidad -->
        <div class="form-group">
          <label for="specialty">Specialty:</label>
          <select name="specialty" id="specialty" class="form-control" required>
            <option value="">-- Select Specialty --</option>
            <option value="Nephrology">Nephrology</option>
            <option value="General Medicine">General Medicine</option>
          </select>
        </div>
        <!-- Fecha de cita -->
        <div class="form-group">
          <label for="date">Appointment Date:</label>
          <input type="date" name="date" id="date" class="form-control" required>
        </div>
        <!-- Selección de horario -->
        <div class="form-group">
          <label>Available Time Slots:</label>
          <div class="time-slots">
            <div class="time-slot" onclick="selectTime(this)">09:00 AM</div>
            <div class="time-slot" onclick="selectTime(this)">10:00 AM</div>
            <div class="time-slot" onclick="selectTime(this)">11:00 AM</div>
            <div class="time-slot" onclick="selectTime(this)">02:00 PM</div>
            <div class="time-slot" onclick="selectTime(this)">03:00 PM</div>
            <div class="time-slot" onclick="selectTime(this)">04:00 PM</div>
          </div>
          <input type="hidden" name="time" id="selectedTime" required>
        </div>
        <!-- Notas adicionales -->
        <div class="form-group">
          <label for="notes">Additional Notes:</label>
          <textarea name="notes" id="notes" class="form-control" rows="3" placeholder="Describe any symptoms or concerns"></textarea>
        </div>
        <!-- Botón de envío -->
        <button type="submit" class="btn btn-primary">Submit Appointment</button>
      </form>
    </div>
  </div>
</div>

<?php include '../doctor/footer.php'; ?>

<!-- Scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
  // Función para seleccionar un time slot
  function selectTime(element) {
    document.querySelectorAll('.time-slot').forEach(function(slot) {
      slot.classList.remove('active');
      slot.style.background = '#f9f9f9';
      slot.style.color = '#000';
      slot.style.borderColor = '#ddd';
    });
    element.classList.add('active');
    element.style.background = '#20a967';
    element.style.color = '#fff';
    element.style.borderColor = '#20a967';
    document.getElementById('selectedTime').value = element.textContent.trim();
  }
</script>
