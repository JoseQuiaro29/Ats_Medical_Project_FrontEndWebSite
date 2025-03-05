<?php
// notificaciones.php
session_start();
include 'docheader.php'; // Contains the <head> section and the header
include 'sidebar.php';   // Contains the sidebar navigation
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
    }
    .content.collapsed {
      margin-left: 80px; /* Adjusted margin when sidebar is collapsed */
    }
    /* Notifications container styling */
    .notif-container {
      background: #fff; /* White background to highlight content */
      padding: 20px; /* Internal spacing */
      border-radius: 10px; /* Rounded corners */
      box-shadow: 0 4px 12px rgba(0,0,0,0.1); /* Subtle shadow for depth */
      max-width: 1200px; /* Maximum width for large screens */
      margin: auto; /* Centered horizontally */
    }
    /* Notifications header */
    .notif-header {
      font-size: 1.5rem; /* Header font size */
      color: #2c3e50; /* Dark blue text */
      margin-bottom: 20px; /* Space below header */
    }
    /* Controls for notifications (search, mark as read, delete all) */
    .notif-controls {
      display: flex; /* Arrange controls in a row */
      justify-content: space-between; /* Space between search and buttons */
      align-items: center; /* Center items vertically */
      margin-bottom: 20px; /* Space below controls */
    }
    .notif-controls input[type="text"] {
      padding: 10px; /* Internal spacing */
      width: 300px; /* Fixed width */
      border: 1px solid #ddd; /* Subtle border */
      border-radius: 4px; /* Rounded corners */
    }
    .notif-controls button {
      padding: 10px 20px; /* Vertical & horizontal padding */
      border: none; /* No border */
      border-radius: 4px; /* Rounded corners */
      color: #fff; /* White text */
      cursor: pointer; /* Pointer cursor on hover */
      margin-left: 10px; /* Space to the left */
    }
    /* Specific button colors */
    .mark-read-btn {
      background-color: #20a967; /* Green background */
    }
    .delete-all-btn {
      background-color: #e74c3c; /* Red background */
    }
    /* Notifications list styling */
    .notif-list {
      list-style: none; /* No default list styling */
      padding: 0;
      margin: 0;
    }
    .notif-item {
      padding: 15px; /* Internal spacing for each notification */
      border-bottom: 1px solid #ddd; /* Separator line */
      display: flex; /* Use flexbox for layout */
      justify-content: space-between; /* Space between text and time */
      align-items: center; /* Vertical centering */
      transition: background 0.3s ease; /* Smooth background transition on hover */
    }
    .notif-item:last-child {
      border-bottom: none; /* Remove border from the last item */
    }
    .notif-item .notif-text {
      font-size: 1rem; /* Text font size */
      color: #333; /* Dark gray text */
    }
    .notif-item .notif-time {
      font-size: 0.8rem; /* Smaller font for timestamp */
      color: #999; /* Light gray color */
    }
    .notif-item:hover {
      background-color: #f1f1f1; /* Light gray background on hover */
    }
    /* Pagination controls */
    .notif-pagination {
      display: flex; /* Arrange pagination buttons in a row */
      justify-content: center; /* Center the pagination controls */
      margin-top: 20px; /* Space above the pagination controls */
    }
    .notif-pagination button {
      padding: 8px 12px; /* Padding for the buttons */
      background-color: #ddd; /* Light gray background */
      border: none; /* No border */
      border-radius: 4px; /* Rounded corners */
      margin: 0 5px; /* Horizontal spacing between buttons */
      cursor: pointer; /* Pointer cursor on hover */
      transition: background 0.3s ease; /* Smooth background transition */
    }
    .notif-pagination button.active {
      background-color: #20a967; /* Active button color */
      color: #fff; /* White text for active button */
    }
    .notif-pagination button:hover:not(.active) {
      background-color: #ccc; /* Darker gray on hover for inactive buttons */
    }
  </style>

<body>
  <div class="content" id="content">
    <div class="notif-container">
      <div class="notif-header">Notifications</div>
      
      <!-- Notifications controls: search bar and action buttons -->
      <div class="notif-controls">
        <input type="text" placeholder="Search notifications..." />
        <div>
          <button class="mark-read-btn">Mark All as Read</button>
          <button class="delete-all-btn">Delete All</button>
        </div>
      </div>
      
      <!-- Notifications list -->
      <ul class="notif-list">
        <!-- Example notification item 1 (with a light background indicating it's new) -->
        <li class="notif-item" style="background-color: #e7f7e8;">
          <div class="notif-text">New appointment scheduled with Patient Juan at 10:00 AM.</div>
          <div class="notif-time">09:45 AM</div>
        </li>
        <!-- Example notification item 2 -->
        <li class="notif-item">
          <div class="notif-text">Message received from Patient María.</div>
          <div class="notif-time">09:50 AM</div>
        </li>
        <!-- Example notification item 3 -->
        <li class="notif-item">
          <div class="notif-text">Reminder: Update your availability for teleconsultations.</div>
          <div class="notif-time">08:30 AM</div>
        </li>
        <!-- Additional notifications can be dynamically loaded here -->
      </ul>
      
      <!-- Pagination controls -->
      <div class="notif-pagination">
        <button>Previous</button>
        <button class="active">1</button>
        <button>2</button>
        <button>Next</button>
      </div>
    </div>
    <?php include 'footer.php'; ?>
  </div>
</body>

