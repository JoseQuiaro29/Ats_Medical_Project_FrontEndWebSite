<?php
session_start();
// (Opcional) Validar la sesión del cliente aquí

// Incluir header y sidebar del cliente
include 'cliheader.php';
include 'sidebar.php';
?>

<!-- Estilos específicos para la página de Settings -->
<style>
  :root {
    --primary-color: #20a967;
    --secondary-color: #2c3e50;
    --bg-color: #f4f7f9;
    --card-bg: #ffffff;
    --font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  }
  body {
    font-family: var(--font-family);
    background-color: var(--bg-color);
    margin: 0;
    padding: 0;
  }
  .content {
    margin-left: 220px; /* Espacio para el sidebar expandido */
    padding: 80px 40px; /* Espacio superior para no tapar el header fijo */
    transition: margin-left 0.3s ease;
  }
  .content.collapsed {
    margin-left: 70px;
  }
  /* Contenedor principal para la configuración */
  .settings-container {
    display: flex;
    flex-direction: column;
    gap: 20px; /* Espacio entre secciones de configuración */
  }
  .settings-section {
    background: var(--card-bg);
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    
  }



  .settings-section3 {
    background: var(--card-bg);
    padding: 50px;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    margin-top: 20px;
    margin-bottom: 20px;

    
  }
  .settings-section h2 {
    margin-top: 0;
    font-size: 2.5rem;
    color: var(--secondary-color);
    margin-bottom: 15px;
  }
  .settings-section p {
    color: #666;
    margin-bottom: 15px;
  }
  /* Form styles */
  .form-group {
    margin-bottom: 15px;
  }
  .form-group label {
    font-weight: bold;
    display: block;
    margin-bottom: 5px;
  }
  .form-control {
    width: 100%;
    padding: 10px;
    font-size: 1.5rem;
    border: 1px solid #ddd;
    border-radius: 5px;
  }
  .btn-primary {
    background-color: var(--primary-color);
    color: #fff;
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    font-size: 1rem;
    cursor: pointer;
    transition: background 0.3s ease;
  }
  .btn-primary:hover {
    background-color: #1e8e5d;
  }
  /* Checkbox y radio styling opcional */
  .checkbox-group, .radio-group {
    margin: 10px 0;
  }
  @media (max-width: 768px) {
    .content {
      margin-left: 70px;
      padding: 60px 20px;
    }
  }
</style>

<!-- Contenido principal de Settings -->
<div class="content" id="content">
  <div class="settings-container">

    <!-- Sección 1: Información personal -->
    <div class="settings-section">
      <h2>Personal Information</h2>
      <p>Update your basic information below.</p>
      <form method="POST" action="update_personal_info.php">
        <div class="form-group">
          <label for="fullName">Full Name:</label>
          <input 
            type="text" 
            id="fullName" 
            name="fullName" 
            class="form-control" 
            value="John Doe" 
            required
          >
        </div>
        <div class="form-group">
          <label for="email">Email Address:</label>
          <input 
            type="email" 
            id="email" 
            name="email" 
            class="form-control" 
            value="john.doe@example.com" 
            required
          >
        </div>
        <div class="form-group">
          <label for="phone">Phone Number:</label>
          <input 
            type="tel" 
            id="phone" 
            name="phone" 
            class="form-control" 
            value="+1 305 123 4567"
          >
        </div>
        <button type="submit" class="btn-primary">Save Changes</button>
      </form>
    </div>

    <!-- Sección 2: Cambio de contraseña -->
    <div class="settings-section">
      <h2>Change Password</h2>
      <p>Use the form below to update your account password.</p>
      <form method="POST" action="update_password.php">
        <div class="form-group">
          <label for="currentPassword">Current Password:</label>
          <input 
            type="password" 
            id="currentPassword" 
            name="currentPassword" 
            class="form-control" 
            required
          >
        </div>
        <div class="form-group">
          <label for="newPassword">New Password:</label>
          <input 
            type="password" 
            id="newPassword" 
            name="newPassword" 
            class="form-control" 
            required
          >
        </div>
        <div class="form-group">
          <label for="confirmPassword">Confirm New Password:</label>
          <input 
            type="password" 
            id="confirmPassword" 
            name="confirmPassword" 
            class="form-control" 
            required
          >
        </div>
        <button type="submit" class="btn-primary">Update Password</button>
      </form>
    </div>

    <!-- Sección 3: Preferencias de notificación -->
    <div class="settings-section3">
      <h2>Notification Preferences</h2>
      <p>Select how you would like to receive notifications.</p>
      <form method="POST" action="update_notifications.php">
        <div class="checkbox-group">
          <label>
            <input type="checkbox" name="notifyEmail" checked>
            Email Notifications
          </label>
        </div>
        <div class="checkbox-group">
          <label>
            <input type="checkbox" name="notifySMS">
            SMS Notifications
          </label>
        </div>
        <div class="checkbox-group">
          <label>
            <input type="checkbox" name="notifyPush" checked>
            Push Notifications
          </label>
        </div>
        <button type="submit" class="btn-primary">Save Preferences</button>
      </form>
    </div>

  </div>

  <!-- Footer tomado de la carpeta de doctor -->
  <?php include '../doctor/footer.php'; ?>
</div>

<!-- jQuery & Bootstrap JS (CDN) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
