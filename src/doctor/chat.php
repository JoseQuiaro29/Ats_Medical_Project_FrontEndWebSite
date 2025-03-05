<?php
// chat.php
session_start();
include 'docheader.php'; // Contains the <head> and external CSS links
include 'sidebar.php';   // Contains the dashboard sidebar
?>

  <style>
    /* Basic page styles */
    body {
      font-family: 'Segoe UI', sans-serif; /* Main font */
      background-color: #f4f7f9; /* Page background color */
      margin: 0;
      padding: 0;
    }
    /* Main content container */
    .content {
      margin-left: 240px; /* Space for the expanded sidebar */
      padding: 80px 40px; /* Top padding to avoid header overlap */
      transition: margin-left 0.3s ease;
      display: flex; /* Use flexbox to create two columns */
      gap: 20px; /* Space between chat list and conversation area */
    }
    .content.collapsed {
      margin-left: 80px; /* Adjusted margin when sidebar is collapsed */
    }
    /* Chat container (conversation area) */
    .chat-container {
      background: #fff; /* White background */
      padding: 20px; /* Internal spacing */
      border-radius: 10px; /* Rounded corners */
      box-shadow: 0 4px 12px rgba(0,0,0,0.1); /* Subtle shadow */
      flex: 2; /* Occupies larger portion of width */
      display: flex;
      flex-direction: column;
      height: 600px; /* Fixed height for demonstration */
    }
    /* Chat header */
    .chat-header {
      font-size: 1.5rem; /* Header font size */
      color: #2c3e50; /* Dark blue color */
      margin-bottom: 20px; /* Space below header */
    }
    /* Chat messages area */
    .chat-messages {
      flex: 1; /* Expands to fill available space */
      overflow-y: auto; /* Vertical scrolling */
      border: 1px solid #ddd; /* Light border */
      padding: 15px; /* Internal spacing */
      border-radius: 8px; /* Rounded corners */
      background: #f9f9f9; /* Light background */
      margin-bottom: 20px; /* Space below messages */
    }
    /* Individual chat message */
    .chat-message {
      margin-bottom: 15px; /* Spacing between messages */
    }
    .chat-message .sender {
      font-weight: bold; /* Bold sender name */
      color: #333; /* Dark gray text */
    }
    .chat-message .timestamp {
      font-size: 0.8rem; /* Smaller font for timestamp */
      color: #999; /* Light gray */
      margin-left: 10px; /* Space to the left */
    }
    .chat-message .message-text {
      margin: 5px 0; /* Vertical spacing for message text */
    }
    /* Chat form for sending messages */
    .chat-form {
      display: flex; /* Arrange input and button in a row */
    }
    .chat-form input[type="text"] {
      flex: 1; /* Input expands to fill space */
      padding: 10px; /* Internal spacing */
      font-size: 1rem; /* Font size */
      border: 1px solid #ddd; /* Light border */
      border-radius: 5px; /* Rounded corners */
    }
    .chat-form button {
      padding: 10px 20px; /* Vertical and horizontal padding */
      margin-left: 10px; /* Space to the left of the button */
      background-color: #20a967; /* Green background */
      color: #fff; /* White text */
      border: none; /* No border */
      border-radius: 5px; /* Rounded corners */
      cursor: pointer; /* Pointer on hover */
      transition: background 0.3s ease; /* Smooth background change */
    }
    .chat-form button:hover {
      background-color: #138852; /* Darker green on hover */
    }
    /* Chat list (contacts or conversation threads) */
    .chat-list {
      background: #fff; /* White background */
      padding: 20px; /* Internal spacing */
      border-radius: 10px; /* Rounded corners */
      box-shadow: 0 4px 12px rgba(0,0,0,0.1); /* Subtle shadow */
      flex: 1; /* Occupies smaller portion of width */
      height: 600px; /* Same fixed height as chat container */
      overflow-y: auto; /* Vertical scrolling */
    }
    /* Chat list header */
    .chat-list h3 {
      margin-bottom: 15px; /* Space below header */
      color: #2c3e50; /* Dark blue text */
      font-size: 1.2rem; /* Font size */
    }
    /* Individual chat item in the list */
    .chat-item {
      padding: 10px; /* Internal spacing */
      border-bottom: 1px solid #ddd; /* Separator line */
      cursor: pointer; /* Pointer on hover */
      transition: background 0.3s ease; /* Smooth background transition */
    }
    .chat-item:hover {
      background-color: #f1f1f1; /* Light gray background on hover */
    }
    .chat-item.active {
      background-color: #e0f7e9; /* Highlight active chat */
    }
  </style>

<body>
  <div class="content" id="content">
    <!-- Chat list column (left side) -->
    <div class="chat-list">
      <h3>Chats</h3>
      <!-- Example chat items (can be loaded dynamically) -->
      <div class="chat-item active">
        <p><strong>Patient Juan</strong></p>
        <p style="font-size: 0.8rem; color: #666;">Last message: "Hello doctor..."</p>
      </div>
      <div class="chat-item">
        <p><strong>Patient María</strong></p>
        <p style="font-size: 0.8rem; color: #666;">Last message: "I need help..."</p>
      </div>
      <div class="chat-item">
        <p><strong>Patient Carlos</strong></p>
        <p style="font-size: 0.8rem; color: #666;">Last message: "Good morning..."</p>
      </div>
      <!-- Additional chat items can be added here -->
    </div>
    <!-- Chat conversation column (right side) -->
    <div class="chat-container">
      <div class="chat-header">Real-Time Chat</div>
      <div class="chat-messages" id="chatMessages">
        <!-- Example messages; these can be loaded dynamically -->
        <div class="chat-message">
          <span class="sender">Dr. Garcia</span>
          <span class="timestamp">10:00 AM</span>
          <div class="message-text">Hello, how can I help you today?</div>
        </div>
        <div class="chat-message">
          <span class="sender">Patient Juan</span>
          <span class="timestamp">10:01 AM</span>
          <div class="message-text">Hi doctor, I have some questions about my treatment.</div>
        </div>
      </div>
      <form class="chat-form" action="send_message.php" method="post">
        <input type="text" name="message" placeholder="Type your message here..." required>
        <button type="submit">Send</button>
      </form>
    </div>
  </div>
  <?php include 'footer.php'; ?>
</body>

