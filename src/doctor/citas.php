<?php
// citas.php
session_start();
// Include header (docheader.php) which contains meta tags, CSS links, etc.
include 'docheader.php';
// Include the sidebar for navigation
include 'sidebar.php';
?>
<!-- Main content container -->
<div class="content" id="content" style="
  /* Space to prevent content from being hidden behind the fixed header */
  padding-top: 80px; 
  /* Left margin according to the sidebar's expanded width (220px) */
  margin-left: 220px; 
  transition: margin-left 0.3s ease;
">
  <!-- Appointments container with card design -->
  <div class="appointments-container" style="
    background-color: #fff; /* White background to highlight the content */
    padding: 30px; /* Internal spacing */
    margin: 20px auto; /* Vertical margin and horizontal centering */
    border-radius: 8px; /* Rounded corners */
    box-shadow: 0 4px 12px rgba(0,0,0,0.1); /* Subtle shadow for depth */
    max-width: 1200px; /* Maximum width for large screens */
  ">
    <!-- Header for the appointments section -->
    <div class="appointments-header" style="margin-bottom: 20px;">
      <h2 style="color: #2c3e50;">Scheduled Appointments</h2>
      <p style="color: #666;">View and manage your teleconsultation appointments.</p>
    </div>

    <!-- Search filter (optional) -->
    <div class="appointments-filters" style="margin-bottom: 20px;">
      <!-- Input to search by patient or specialty -->
      <input type="text" placeholder="Search by patient, specialty..." style="
        padding: 10px;                /* Internal spacing */
        width: 300px;                 /* Fixed width */
        border: 1px solid #ddd;       /* Subtle border */
        border-radius: 4px;           /* Rounded corners */
      ">
      <!-- Button to perform the search -->
      <button style="
        padding: 10px 20px;           /* Vertical & horizontal padding */
        background-color: #20a967;    /* Background color */
        border: none;                 /* No border */
        border-radius: 4px;           /* Rounded corners */
        color: #fff;                  /* White text */
        margin-left: 10px;            /* Left margin */
        cursor: pointer;              /* Pointer cursor on hover */
      ">Search</button>
    </div>

    <!-- Appointments table -->
    <table style="
      width: 100%;                  /* Table occupies full width of the container */
      border-collapse: collapse;    /* Removes space between cells */
    ">
      <!-- Table header -->
      <thead>
        <tr style="background-color: #20a967; color: #fff;">
          <th style="padding: 12px 8px; text-align: left;">Time</th>
          <th style="padding: 12px 8px; text-align: left;">Patient</th>
          <th style="padding: 12px 8px; text-align: left;">Specialty</th>
          <th style="padding: 12px 8px; text-align: left;">Status</th>
          <th style="padding: 12px 8px; text-align: left;">Actions</th>
        </tr>
      </thead>
      <!-- Table body with example appointments -->
      <tbody>
        <tr style="border-bottom: 1px solid #ddd;">
          <td style="padding: 12px 8px;">09:00 AM</td>
          <td style="padding: 12px 8px;">John Perez</td>
          <td style="padding: 12px 8px;">Nephrology</td>
          <td style="padding: 12px 8px;">Confirmed</td>
          <td style="padding: 12px 8px;">
            <!-- Links for viewing details or canceling the appointment -->
            <a href="#" style="color: #20a967; text-decoration: none; margin-right: 10px;">View</a>
            <a href="#" style="color: #e74c3c; text-decoration: none;">Cancel</a>
          </td>
        </tr>
        <tr style="border-bottom: 1px solid #ddd;">
          <td style="padding: 12px 8px;">10:30 AM</td>
          <td style="padding: 12px 8px;">Mary Lopez</td>
          <td style="padding: 12px 8px;">General Medicine</td>
          <td style="padding: 12px 8px;">Pending</td>
          <td style="padding: 12px 8px;">
            <a href="#" style="color: #20a967; text-decoration: none; margin-right: 10px;">View</a>
            <a href="#" style="color: #e74c3c; text-decoration: none;">Cancel</a>
          </td>
        </tr>
        <tr>
          <td style="padding: 12px 8px;">02:00 PM</td>
          <td style="padding: 12px 8px;">Carlos Martinez</td>
          <td style="padding: 12px 8px;">Nephrology</td>
          <td style="padding: 12px 8px;">Confirmed</td>
          <td style="padding: 12px 8px;">
            <a href="#" style="color: #20a967; text-decoration: none; margin-right: 10px;">View</a>
            <a href="#" style="color: #e74c3c; text-decoration: none;">Cancel</a>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  <!-- Include the footer -->
  <?php include 'footer.php'; ?>
</div>
