<?php
session_start();
include 'cliheader.php';
include 'sidebar.php';
?>

<div class="dashboard">
    <div class="content" id="content">
        <h2>Book Appointment</h2>
        <p>Book a new appointment with our doctors.</p>
        <!-- Add your book appointment form here -->
        <div class="booking-container" style="
            background: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            max-width: 800px;
            margin: 0 auto;
        ">
            <h2 style="margin-top: 0; font-size: 2.2rem; color: #2c3e50; margin-bottom: 20px;">
                Book an Appointment
            </h2>
            <p style="color: #666; margin-bottom: 30px;">
                Please fill out the form below to schedule your appointment.
            </p>
            
            <!-- Formulario de reserva de cita -->
            <form method="POST" action="book_appointment_process.php">
                <!-- Campo fijo: Doctor -->
                <div class="form-group">
                    <label>Doctor:</label>
                    <input type="text" class="form-control" value="Dr. Manuel Garcia Estrada" disabled 
                        style="border-radius: 5px; height: 45px;">
                    <input type="hidden" name="doctor" value="Dr. Manuel Garcia Estrada">
                </div>
                <!-- Selección de especialidad -->
                <div class="form-group">
                    <label for="specialty">Specialty:</label>
                    <select name="specialty" id="specialty" class="form-control" required
                            style="border-radius: 5px; height: 45px;">
                        <option value="">-- Select Specialty --</option>
                        <option value="Nephrology">Nephrology</option>
                        <option value="General Medicine">General Medicine</option>
                    </select>
                </div>
                <!-- Fecha de cita -->
                <div class="form-group">
                    <label for="date">Appointment Date:</label>
                    <input type="date" name="date" id="date" class="form-control" required
                        style="border-radius: 5px; height: 45px;">
                </div>
                <!-- Selección de horario -->
                <div class="form-group">
                    <label>Available Time Slots:</label>
                    <div class="time-slots" style="display: flex; flex-wrap: wrap; gap: 10px; margin-top: 10px;">
                        <div class="time-slot" onclick="selectTime(this)" style="
                            background: #f9f9f9; border: 1px solid #ddd; padding: 8px 12px; border-radius: 5px; cursor: pointer; transition: background 0.3s ease;">
                            09:00 AM
                        </div>
                        <div class="time-slot" onclick="selectTime(this)" style="
                            background: #f9f9f9; border: 1px solid #ddd; padding: 8px 12px; border-radius: 5px; cursor: pointer; transition: background 0.3s ease;">
                            10:00 AM
                        </div>
                        <div class="time-slot" onclick="selectTime(this)" style="
                            background: #f9f9f9; border: 1px solid #ddd; padding: 8px 12px; border-radius: 5px; cursor: pointer; transition: background 0.3s ease;">
                            11:00 AM
                        </div>
                        <div class="time-slot" onclick="selectTime(this)" style="
                            background: #f9f9f9; border: 1px solid #ddd; padding: 8px 12px; border-radius: 5px; cursor: pointer; transition: background 0.3s ease;">
                            02:00 PM
                        </div>
                        <div class="time-slot" onclick="selectTime(this)" style="
                            background: #f9f9f9; border: 1px solid #ddd; padding: 8px 12px; border-radius: 5px; cursor: pointer; transition: background 0.3s ease;">
                            03:00 PM
                        </div>
                        <div class="time-slot" onclick="selectTime(this)" style="
                            background: #f9f9f9; border: 1px solid #ddd; padding: 8px 12px; border-radius: 5px; cursor: pointer; transition: background 0.3s ease;">
                            04:00 PM
                        </div>
                    </div>
                    <!-- Campo oculto para enviar la hora seleccionada -->
                    <input type="hidden" name="time" id="selectedTime" required>
                </div>
                <!-- Notas adicionales -->
                <div class="form-group">
                    <label for="notes">Additional Notes:</label>
                    <textarea name="notes" id="notes" class="form-control" rows="3"
                            style="height: auto; resize: vertical; border-radius: 5px;"
                            placeholder="Describe any symptoms or concerns"></textarea>
                </div>
                <!-- Botón de envío -->
                <button type="submit" class="btn btn-primary" style="
                    background-color: #20a967; border-color: #1e8e5d; font-size: 1rem; padding: 10px 25px; border-radius: 5px; transition: background 0.3s ease;">
                    Submit Appointment
                </button>
            </form>
        </div>
    </div>
</div>

<?php include '../doctor/footer.php'; ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
  // Función para seleccionar un time slot
  function selectTime(element) {
    // Remover clase active de todos los time slots
    document.querySelectorAll('.time-slot').forEach(function(slot) {
      slot.style.background = '#f9f9f9';
      slot.style.color = '#000';
      slot.style.borderColor = '#ddd';
      slot.classList.remove('active');
    });
    // Agregar estilo active al slot seleccionado
    element.classList.add('active');
    element.style.background = '#20a967';
    element.style.color = '#fff';
    element.style.borderColor = '#20a967';

    // Guardar el valor en el campo oculto
    document.getElementById('selectedTime').value = element.textContent.trim();
  }
</script>
</body>
</html>
