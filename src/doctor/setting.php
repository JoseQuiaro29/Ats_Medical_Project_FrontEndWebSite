<?php
// setting.php
session_start();
// Include header and sidebar (ensure these files are in the correct path)
include 'docheader.php';  // Contains the <head> section and header
include 'sidebar.php';    // Contains the sidebar navigation
?>

  <style>
    /* Basic Reset */
    * { margin: 0; padding: 0; box-sizing: border-box; }
    
    /* Body Styling */
    body {
      font-family: 'Segoe UI', sans-serif; /* Main font */
      background-color: #f4f7f9; /* Page background color */
    }
    
    /* Main Content Container */
    .content {
      margin-left: 220px; /* Space for the expanded sidebar */
      padding: 80px 40px; /* Top padding prevents header overlap */
      transition: margin-left 0.3s ease;
    }
    .content.collapsed {
      margin-left: 80px; /* Reduced margin when sidebar is collapsed */
    }
    
    /* Settings Container (Card Style) */
    .settings-container {
      background-color: #fff; /* White background to highlight content */
      padding: 30px; /* Internal spacing */
      margin: 20px auto; /* Vertical margin and horizontal centering */
      border-radius: 8px; /* Rounded corners */
      box-shadow: 0 4px 12px rgba(0,0,0,0.1); /* Subtle shadow for depth */
      max-width: 1200px; /* Maximum width for larger screens */
    }
    
    /* Section Header Styles */
    .settings-container h2 {
      color: #2c3e50; /* Dark blue color for headings */
      margin-bottom: 20px; /* Space below the heading */
    }
    .settings-container p {
      color: #666; /* Gray color for descriptive text */
      margin-bottom: 20px;
    }
    
    /* Tab Buttons Container */
    .settings-tabs {
      margin-bottom: 20px; /* Space below tab buttons */
    }
    /* Tab Button Styling */
    .tab-btn {
      padding: 10px 20px; /* Internal padding */
      background-color: #ddd; /* Gray background for inactive tabs */
      border: none; /* No border */
      border-radius: 4px; /* Rounded corners */
      color: #333; /* Dark text color */
      cursor: pointer; /* Pointer cursor on hover */
      margin-right: 10px; /* Right margin for separation */
      transition: background-color 0.3s ease, color 0.3s ease; /* Smooth transition */
    }
    /* Active Tab Button */
    .tab-btn.active {
      background-color: #20a967; /* Green background for active tab */
      color: #fff; /* White text for active tab */
    }
    
    /* Tab Content Styling */
    .tab-content {
      display: none; /* Hide all tabs by default */
    }
    .tab-content.active {
      display: block; /* Show active tab content */
    }
    
    /* Form Styling for Each Tab */
    .settings-form {
      margin-bottom: 20px; /* Space below each form */
    }
    .settings-form div {
      margin-bottom: 15px; /* Vertical spacing between form fields */
    }
    .settings-form label {
      display: block; /* Labels take a full line */
      margin-bottom: 5px; /* Space below the label */
      color: #333; /* Dark text color */
    }
    .settings-form input[type="text"],
    .settings-form input[type="email"],
    .settings-form input[type="password"],
    .settings-form input[type="file"],
    .settings-form select {
      width: 100%; /* Input fields occupy full width */
      padding: 10px; /* Internal spacing */
      border: 1px solid #ddd; /* Subtle border */
      border-radius: 4px; /* Rounded corners */
    }
    .settings-form button {
      padding: 10px 20px; /* Vertical & horizontal padding */
      background-color: #20a967; /* Green background */
      border: none; /* No border */
      border-radius: 4px; /* Rounded corners */
      color: #fff; /* White text */
      cursor: pointer; /* Pointer cursor */
      transition: background-color 0.3s ease; /* Smooth transition on hover */
    }
    .settings-form button:hover {
      background-color: #138852; /* Darker green on hover */
    }
  </style>

<body>
  <div class="content" id="content">
    <div class="settings-container">
      <!-- Section Title -->
      <h2>Settings</h2>
      <p>Manage your profile, account, notifications, and security settings.</p>
      
      <!-- Tab Buttons -->
      <div class="settings-tabs">
        <button class="tab-btn active" data-tab="profile-tab">Profile</button>
        <button class="tab-btn" data-tab="account-tab">Account</button>
        <button class="tab-btn" data-tab="notifications-tab">Notifications</button>
        <button class="tab-btn" data-tab="security-tab">Security</button>
      </div>
      
      <!-- Tab Content: Profile -->
      <div class="tab-content active" id="profile-tab">
        <form class="settings-form" action="save_profile.php" method="post" enctype="multipart/form-data">
          <h3>Edit Profile</h3>
          <!-- Full Name Field -->
          <div>
            <label for="full_name">Full Name</label>
            <input type="text" id="full_name" name="full_name" value="Current Name">
          </div>
          <!-- Email Field -->
          <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="email@example.com">
          </div>
          <!-- Phone Field -->
          <div>
            <label for="phone">Phone</label>
            <input type="text" id="phone" name="phone" value="305-000-0000">
          </div>
          <!-- Profile Picture Field -->
          <div>
            <label for="profile_picture">Profile Picture</label>
            <input type="file" id="profile_picture" name="profile_picture">
          </div>
          <button type="submit">Save Profile</button>
        </form>
      </div>
      
      <!-- Tab Content: Account -->
      <div class="tab-content" id="account-tab">
        <form class="settings-form" action="save_account.php" method="post">
          <h3>Account Settings</h3>
          <!-- Username Field -->
          <div>
            <label for="username">Username</label>
            <input type="text" id="username" name="username" value="current_username">
          </div>
          <!-- New Password Field -->
          <div>
            <label for="new_password">New Password</label>
            <input type="password" id="new_password" name="new_password" placeholder="Enter new password">
          </div>
          <!-- Confirm Password Field -->
          <div>
            <label for="confirm_password">Confirm Password</label>
            <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm new password">
          </div>
          <button type="submit">Update Account</button>
        </form>
      </div>
      
      <!-- Tab Content: Notifications -->
      <div class="tab-content" id="notifications-tab">
        <form class="settings-form" action="save_notifications.php" method="post">
          <h3>Notifications Settings</h3>
          <!-- Email Notifications Dropdown -->
          <div>
            <label for="email_notifications">Email Notifications</label>
            <select id="email_notifications" name="email_notifications">
              <option value="enabled">Enabled</option>
              <option value="disabled">Disabled</option>
            </select>
          </div>
          <!-- SMS Notifications Dropdown -->
          <div>
            <label for="sms_notifications">SMS Notifications</label>
            <select id="sms_notifications" name="sms_notifications">
              <option value="enabled">Enabled</option>
              <option value="disabled">Disabled</option>
            </select>
          </div>
          <button type="submit">Save Notifications</button>
        </form>
      </div>
      
      <!-- Tab Content: Security -->
      <div class="tab-content" id="security-tab">
        <form class="settings-form" action="save_security.php" method="post">
          <h3>Security Settings</h3>
          <!-- Two-Factor Authentication Dropdown -->
          <div>
            <label for="two_factor">Two-Factor Authentication</label>
            <select id="two_factor" name="two_factor">
              <option value="enabled">Enabled</option>
              <option value="disabled">Disabled</option>
            </select>
          </div>
          <!-- Security Question Field -->
          <div>
            <label for="security_question">Security Question</label>
            <input type="text" id="security_question" name="security_question" placeholder="Enter your security question">
          </div>
          <!-- Security Answer Field -->
          <div>
            <label for="security_answer">Security Answer</label>
            <input type="text" id="security_answer" name="security_answer" placeholder="Enter your answer">
          </div>
          <button type="submit">Save Security Settings</button>
        </form>
      </div>
      
    </div>
  </div>
  
  <?php include 'footer.php'; ?>
  
  <script>
    // JavaScript to handle tab switching
    const tabButtons = document.querySelectorAll('.tab-btn');
    const tabContents = document.querySelectorAll('.tab-content');
    
    tabButtons.forEach(btn => {
      btn.addEventListener('click', () => {
        // Remove active class from all tab buttons and hide all tab content
        tabButtons.forEach(button => button.classList.remove('active'));
        tabContents.forEach(content => content.classList.remove('active'));
        
        // Add active class to clicked button and show corresponding tab content
        btn.classList.add('active');
        const tabId = btn.getAttribute('data-tab');
        document.getElementById(tabId).classList.add('active');
        
        // Update tab button styles
        tabButtons.forEach(button => {
          if (button.classList.contains('active')) {
            button.style.backgroundColor = '#20a967';
            button.style.color = '#fff';
          } else {
            button.style.backgroundColor = '#ddd';
            button.style.color = '#333';
          }
        });
      });
    });
  </script>
</body>
