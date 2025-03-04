<?php
session_start();
include 'cliheader.php'; // Header que abre <html> y <body>
include 'sidebar.php';   // Sidebar con position: fixed, top:60px
?>
<!-- Estilos específicos del chat (puedes moverlos a styles.css si gustas) -->
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
  /* Contenedor principal, ajustado a la derecha del sidebar */
  .content {
    margin-left: 220px; /* Espacio para el sidebar expandido */
    padding: 80px 40px 40px; /* Agregamos un padding-bottom extra (40px) */
    transition: margin-left 0.3s ease;
    display: flex;
    gap: 20px;
  }
  .content.collapsed {
    margin-left: 70px;
  }
  /* Panel Izquierdo: Información del Doctor */
  .doctor-info {
    background: var(--card-bg);
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    width: 300px;
    display: flex;
    flex-direction: column;
    align-items: center;
  }
  .doctor-info img {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    margin-bottom: 15px;
    object-fit: cover;
  }
  .doctor-info h3 {
    margin: 10px 0 5px;
    color: var(--secondary-color);
    font-size: 1.5rem;
  }
  .doctor-info p {
    margin: 0;
    color: #666;
    font-size: 0.9rem;
  }
  /* Panel Derecho: Contenedor de Chat */
  .chat-container {
    background: var(--card-bg);
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    flex: 1;
    display: flex;
    flex-direction: column;
    /* Quitamos la altura fija para que crezca según contenido */
    min-height: 400px; 
  }
  .chat-header {
    font-size: 1.5rem;
    color: var(--secondary-color);
    margin-bottom: 20px;
  }
  /* Área de mensajes con scroll interno */
  .chat-messages {
    flex: 1; /* Ocupa todo el espacio vertical disponible */
    overflow-y: auto; /* Permite scroll si hay muchos mensajes */
    border: 1px solid #ddd;
    padding: 15px;
    border-radius: 8px;
    background: #f9f9f9;
    margin-bottom: 20px;
  }
  .chat-message {
    margin-bottom: 15px;
  }
  .chat-message .sender {
    font-weight: bold;
    color: #333;
  }
  .chat-message .timestamp {
    font-size: 0.8rem;
    color: #999;
    margin-left: 10px;
  }
  .chat-message .message-text {
    margin: 5px 0;
  }
  /* Formulario para enviar mensajes */
  .chat-form {
    display: flex;
  }
  .chat-form input[type="text"] {
    flex: 1;
    padding: 10px;
    font-size: 1rem;
    border: 1px solid #ddd;
    border-radius: 5px;
  }
  .chat-form button {
    padding: 10px 20px;
    margin-left: 10px;
    background-color: var(--primary-color);
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background 0.3s ease;
  }
  .chat-form button:hover {
    background-color: #1e8e5d;
  }
  /* Ajustes responsive */
  @media (max-width: 768px) {
    .content {
      margin-left: 70px;
      padding: 60px 20px 40px;
      flex-direction: column;
    }
    .doctor-info {
      width: 100%;
      margin-bottom: 20px; /* Separación debajo del panel del doctor */
    }
    .chat-container {
      min-height: auto;
    }
  }
</style>

<!-- Contenido principal del Chat -->
<div class="content" id="content">
  <!-- Panel Izquierdo: Información del Doctor -->
  <div class="doctor-info">
    <img src="../../images/logoG.png" alt="Doctor Avatar">
    <h3>Dr. Manuel Garcia Estrada</h3>
    <p>Nephrology &amp; General Medicine</p>
    <p style="margin-top:15px; font-size:0.9rem; color:#888;">Online</p>
  </div>
  <!-- Panel Derecho: Conversación de Chat -->
  <div class="chat-container">
    <div class="chat-header">Chat with Dr. Manuel Garcia Estrada</div>
    <div class="chat-messages" id="chatMessages">
      <!-- Ejemplo de mensajes -->
      <div class="chat-message">
        <span class="sender">Dr. Manuel Garcia Estrada</span>
        <span class="timestamp">10:00 AM</span>
        <div class="message-text">Hello, how can I help you today?</div>
      </div>
      <div class="chat-message">
        <span class="sender">You</span>
        <span class="timestamp">10:01 AM</span>
        <div class="message-text">Hi doctor, I have a question about my medication.</div>
      </div>
    </div>
    <form class="chat-form" action="send_message.php" method="post">
      <input type="text" name="message" placeholder="Type your message here..." required>
      <button type="submit">Send</button>
    </form>
  </div>
</div>

<!-- Footer -->
<?php include '../doctor/footer.php'; ?>

<!-- jQuery & Bootstrap JS (CDN) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
