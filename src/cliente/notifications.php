<?php
session_start();
// Validar la sesión del cliente si es necesario

// Incluir header y sidebar del cliente
include 'cliheader.php';
include 'sidebar.php';
?>

<!-- Estilos específicos para la página de Notificaciones -->
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
  /* Contenedor principal para las notificaciones */
  .notifications-container {
    background: var(--card-bg);
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    margin-bottom: 30px;
  }
  .notifications-container h2 {
    margin-top: 0;
    font-size: 2rem;
    color: var(--secondary-color);
  }
  .notifications-container p {
    margin-bottom: 20px;
    color: #666;
  }
  /* Lista de notificaciones */
  .notification-list {
    display: flex;
    flex-direction: column;
    gap: 15px; /* Espacio entre notificaciones */
  }
  .notification-item {
    background: #f9f9f9;
    border: 1px solid #ddd;
    padding: 15px;
    border-radius: 8px;
    transition: background 0.3s ease;
  }
  /* Si deseas resaltar notificaciones no leídas */
  .notification-item.unread {
    border-left: 4px solid var(--primary-color);
  }
  .notification-item h4 {
    margin: 0 0 5px;
    font-size: 1.2rem;
    color: var(--secondary-color);
  }
  .notification-item p {
    margin: 0 0 5px;
    color: #333;
  }
  .notification-time {
    font-size: 0.8rem;
    color: #999;
  }
  /* Hover */
  .notification-item:hover {
    background: #f0f0f0;
  }
  /* Ajustes responsive */
  @media (max-width: 768px) {
    .content {
      margin-left: 70px;
      padding: 60px 20px;
    }
  }
</style>

<!-- Contenido principal de Notificaciones -->
<div class="content" id="content">
  <div class="notifications-container">
    <h2>Notifications</h2>
    <p>Below is a list of your recent notifications.</p>
    
    <div class="notification-list">
      <!-- Ejemplo de notificaciones. En producción, genera dinámicamente desde la DB -->
      <div class="notification-item unread">
        <h4>Appointment Reminder</h4>
        <p>Your appointment with Dr. Manuel Garcia Estrada is scheduled for tomorrow at 10:00 AM.</p>
        <span class="notification-time">2025-03-09 09:00 AM</span>
      </div>
      <div class="notification-item">
        <h4>Prescription Refill</h4>
        <p>Dr. Manuel Garcia Estrada has issued a new prescription refill.</p>
        <span class="notification-time">2025-03-05 02:30 PM</span>
      </div>
      <div class="notification-item">
        <h4>Lab Results Available</h4>
        <p>Your recent lab results are now available for review.</p>
        <span class="notification-time">2025-03-02 11:15 AM</span>
      </div>
    </div>
  </div>

  <!-- Footer tomado de la carpeta de doctor -->
  <?php include '../doctor/footer.php'; ?>
</div>

<!-- jQuery & Bootstrap JS (CDN) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
