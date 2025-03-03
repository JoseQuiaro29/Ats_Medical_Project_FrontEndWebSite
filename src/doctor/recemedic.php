<?php
// recemedic.php
session_start();
// Include header and sidebar (assuming these files are in the same folder; adjust paths as needed)
include 'docheader.php';  // Contains the <head> and header
include 'sidebar.php';    // Contains the sidebar navigation
?>
<!-- Main content container -->
<div class="content" id="content" style="
  /* Top padding to avoid content being hidden by the fixed header */
  padding-top: 80px; 
  /* Left margin corresponding to the expanded sidebar width (220px) */
  margin-left: 220px; 
  transition: margin-left 0.3s ease;
">
  <!-- Main container for Medical Prescriptions -->
  <div class="recemedic-container" style="
    background-color: #fff;  /* White background to highlight the content */
    padding: 30px;           /* Internal spacing */
    margin: 20px auto;       /* Vertical margin and centered horizontally */
    border-radius: 8px;      /* Rounded corners */
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);  /* Subtle shadow for depth */
    max-width: 1200px;       /* Maximum width for large screens */
  ">
    <!-- Section header -->
    <div class="recemedic-header" style="margin-bottom: 20px;">
      <h2 style="color: #2c3e50;">Medical Prescriptions</h2>
      <p style="color: #666;">Manage medical prescriptions for the specialties of Nephrology and General Medicine.</p>
    </div>

    <!-- Filters and search area -->
    <div class="recemedic-filters" style="
      margin-bottom: 20px; 
      display: flex; 
      flex-wrap: wrap; 
      align-items: center;
    ">
      <!-- Input for searching by patient or medication -->
      <input type="text" placeholder="Search by patient or medication..." style="
        padding: 10px;                /* Internal spacing for the input */
        width: 300px;                 /* Fixed width */
        border: 1px solid #ddd;       /* Subtle border */
        border-radius: 4px;           /* Rounded corners */
        margin-right: 10px;           /* Right margin for separation */
      ">
      <!-- Dropdown to filter by specialty -->
      <select style="
        padding: 10px;                /* Internal spacing */
        border: 1px solid #ddd;       /* Subtle border */
        border-radius: 4px;           /* Rounded corners */
        margin-right: 10px;           /* Right margin */
      ">
        <option value="">All Specialties</option>
        <option value="nephrology">Nephrology</option>
        <option value="general_medicine">General Medicine</option>
      </select>
      <!-- Button to execute the search -->
      <button style="
        padding: 10px 20px;           /* Vertical & horizontal padding */
        background-color: #20a967;    /* Green background color */
        border: none;                 /* No border */
        border-radius: 4px;           /* Rounded corners */
        color: #fff;                  /* White text */
        cursor: pointer;              /* Pointer cursor on hover */
        margin-right: 10px;           /* Right margin */
      ">Search</button>
      <!-- Button to add a new prescription, aligned to the right -->
      <button style="
        padding: 10px 20px;           /* Internal spacing */
        background-color: #3498db;    /* Blue background color */
        border: none;                 /* No border */
        border-radius: 4px;           /* Rounded corners */
        color: #fff;                  /* White text */
        cursor: pointer;              /* Pointer cursor */
        margin-left: auto;            /* Pushes the button to the right */
      ">Add Prescription</button>
    </div>

    <!-- Medical Prescriptions Table -->
    <table style="
      width: 100%;                  /* Table occupies the full container width */
      border-collapse: collapse;    /* Removes space between cells */
    ">
      <!-- Table header -->
      <thead>
        <tr style="background-color: #20a967; color: #fff;">
          <!-- Each <th> defines a column with padding for better readability -->
          <th style="padding: 12px 8px; text-align: left;">Date</th>
          <th style="padding: 12px 8px; text-align: left;">Patient</th>
          <th style="padding: 12px 8px; text-align: left;">Specialty</th>
          <th style="padding: 12px 8px; text-align: left;">Medication</th>
          <th style="padding: 12px 8px; text-align: left;">Dose</th>
          <th style="padding: 12px 8px; text-align: left;">Instructions</th>
          <th style="padding: 12px 8px; text-align: left;">Actions</th>
        </tr>
      </thead>
      <!-- Table body with example prescription data -->
      <tbody>
        <!-- Example Row 1 -->
        <tr style="border-bottom: 1px solid #ddd;">
          <td style="padding: 12px 8px;">2025-04-10</td>
          <td style="padding: 12px 8px;">Ana Gonzalez</td>
          <td style="padding: 12px 8px;">Nephrology</td>
          <td style="padding: 12px 8px;">Losartan</td>
          <td style="padding: 12px 8px;">50 mg</td>
          <td style="padding: 12px 8px;">Take 1 tablet daily</td>
          <td style="padding: 12px 8px;">
            <!-- Action links: View, Edit, Delete -->
            <a href="#" style="color: #20a967; text-decoration: none; margin-right: 10px;">View</a>
            <a href="#" style="color: #3498db; text-decoration: none; margin-right: 10px;">Edit</a>
            <a href="#" style="color: #e74c3c; text-decoration: none;">Delete</a>
          </td>
        </tr>
        <!-- Example Row 2 -->
        <tr style="border-bottom: 1px solid #ddd;">
          <td style="padding: 12px 8px;">2025-04-11</td>
          <td style="padding: 12px 8px;">Luis Ramirez</td>
          <td style="padding: 12px 8px;">General Medicine</td>
          <td style="padding: 12px 8px;">Paracetamol</td>
          <td style="padding: 12px 8px;">500 mg</td>
          <td style="padding: 12px 8px;">Take 1 tablet every 8 hours</td>
          <td style="padding: 12px 8px;">
            <a href="#" style="color: #20a967; text-decoration: none; margin-right: 10px;">View</a>
            <a href="#" style="color: #3498db; text-decoration: none; margin-right: 10px;">Edit</a>
            <a href="#" style="color: #e74c3c; text-decoration: none;">Delete</a>
          </td>
        </tr>
        <!-- Example Row 3 -->
        <tr>
          <td style="padding: 12px 8px;">2025-04-12</td>
          <td style="padding: 12px 8px;">Maria Fernandez</td>
          <td style="padding: 12px 8px;">Nephrology</td>
          <td style="padding: 12px 8px;">Erythropoietin</td>
          <td style="padding: 12px 8px;">10,000 UI</td>
          <td style="padding: 12px 8px;">Administer subcutaneous injection weekly</td>
          <td style="padding: 12px 8px;">
            <a href="#" style="color: #20a967; text-decoration: none; margin-right: 10px;">View</a>
            <a href="#" style="color: #3498db; text-decoration: none; margin-right: 10px;">Edit</a>
            <a href="#" style="color: #e74c3c; text-decoration: none;">Delete</a>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  <!-- Include the footer for design consistency -->
  <?php include 'footer.php'; ?>
</div>
