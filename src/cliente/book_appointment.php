<?php
session_start();
include 'cliheader.php';
include 'sidebar.php';
?>

<div class="dashboard">
  <div class="content" id="content">
    <h2 style="margin: 0; font-size: 2.2rem; color: #2c3e50;">Book Appointment</h2>
    <p style="font-size: 1rem; color: #666;">Book a new appointment with our doctors.</p>
    <div class="booking-container" style="
      background: #fff;
      padding: 30px 40px;
      border-radius: 8px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      max-width: 800px;
      margin: 30px auto 80px auto;">
      <h2 style="margin-bottom: 15px; font-size: 1.8rem; color: #2c3e50;">Book an Appointment</h2>
      <p style="margin-bottom: 25px; font-size: 1rem; color: #666;">Please fill out the form below to schedule your appointment.</p>
      <form method="POST" action="book_appointment_process.php">
        <!-- Campo fijo: Doctor -->
        <div class="form-group" style="margin-bottom: 15px;">
          <label style="display: block; margin-bottom: 5px; font-size: 1rem; color: #333;">Doctor:</label>
          <input type="text" class="form-control" value="Dr. Manuel Garcia Estrada" disabled style="
            width: 100%;
            padding: 10px 12px;
            font-size: 0.95rem;
            border: 1px solid #ddd;
            border-radius: 4px;">
          <input type="hidden" name="doctor" value="Dr. Manuel Garcia Estrada">
        </div>
        <!-- Selección de especialidad -->
        <div class="form-group" style="margin-bottom: 15px;">
          <label for="specialty" style="display: block; margin-bottom: 5px; font-size: 1rem; color: #333;">Specialty:</label>
          <select name="specialty" id="specialty" class="form-control" required style="
            width: 100%;
            padding: 10px 12px;
            font-size: 0.95rem;
            border: 1px solid #ddd;
            border-radius: 4px;">
            <option value="">-- Select Specialty --</option>
            <option value="Nephrology">Nephrology</option>
            <option value="General Medicine">General Medicine</option>
          </select>
        </div>
        <!-- Fecha de cita -->
        <div class="form-group" style="margin-bottom: 15px;">
          <label for="date" style="display: block; margin-bottom: 5px; font-size: 1rem; color: #333;">Appointment Date:</label>
          <input type="date" name="date" id="date" class="form-control" required style="
            width: 100%;
            padding: 10px 12px;
            font-size: 0.95rem;
            border: 1px solid #ddd;
            border-radius: 4px;">
        </div>
        <!-- Selección de horario -->
        <div class="form-group" style="margin-bottom: 15px;">
          <label style="display: block; margin-bottom: 5px; font-size: 1rem; color: #333;">Available Time Slots:</label>
          <div class="time-slots" style="display: flex; flex-wrap: wrap; gap: 10px; margin-top: 8px;">
            <div class="time-slot" onclick="selectTime(this)" style="
              background: #f9f9f9;
              border: 1px solid #ddd;
              padding: 8px 12px;
              border-radius: 4px;
              cursor: pointer;
              font-size: 0.95rem;
              transition: background 0.3s ease;">09:00 AM</div>
            <div class="time-slot" onclick="selectTime(this)" style="
              background: #f9f9f9;
              border: 1px solid #ddd;
              padding: 8px 12px;
              border-radius: 4px;
              cursor: pointer;
              font-size: 0.95rem;
              transition: background 0.3s ease;">10:00 AM</div>
            <div class="time-slot" onclick="selectTime(this)" style="
              background: #f9f9f9;
              border: 1px solid #ddd;
              padding: 8px 12px;
              border-radius: 4px;
              cursor: pointer;
              font-size: 0.95rem;
              transition: background 0.3s ease;">11:00 AM</div>
            <div class="time-slot" onclick="selectTime(this)" style="
              background: #f9f9f9;
              border: 1px solid #ddd;
              padding: 8px 12px;
              border-radius: 4px;
              cursor: pointer;
              font-size: 0.95rem;
              transition: background 0.3s ease;">02:00 PM</div>
            <div class="time-slot" onclick="selectTime(this)" style="
              background: #f9f9f9;
              border: 1px solid #ddd;
              padding: 8px 12px;
              border-radius: 4px;
              cursor: pointer;
              font-size: 0.95rem;
              transition: background 0.3s ease;">03:00 PM</div>
            <div class="time-slot" onclick="selectTime(this)" style="
              background: #f9f9f9;
              border: 1px solid #ddd;
              padding: 8px 12px;
              border-radius: 4px;
              cursor: pointer;
              font-size: 0.95rem;
              transition: background 0.3s ease;">04:00 PM</div>
          </div>
          <input type="hidden" name="time" id="selectedTime" required>
        </div>
        <!-- Notas adicionales -->
        <div class="form-group" style="margin-bottom: 15px;">
          <label for="notes" style="display: block; margin-bottom: 5px; font-size: 1rem; color: #333;">Additional Notes:</label>
          <textarea name="notes" id="notes" class="form-control" rows="3" placeholder="Describe any symptoms or concerns" style="
            width: 100%;
            padding: 10px 12px;
            font-size: 0.95rem;
            border: 1px solid #ddd;
            border-radius: 4px;"></textarea>
        </div>
        <!-- Botón de envío -->
        <button type="submit" class="btn btn-primary" style="
          background-color: #20a967;
          border-color: #1e8e5d;
          font-size: 1rem;
          padding: 10px 20px;
          border-radius: 4px;
          cursor: pointer;
          transition: background 0.3s ease;">Submit Appointment</button>
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
