<?php
// patients.php
session_start();
include 'docheader.php';  // Contains the <head> and header of the page
include 'sidebar.php';    // Contains the sidebar navigation
?>
<!-- Main content container -->
<div class="content" id="content" style="
  /* Space to prevent content from being hidden behind the fixed header */
  padding-top: 80px;
  /* Left margin adjusted according to the expanded sidebar width (220px) */
  margin-left: 220px;
  transition: margin-left 0.3s ease;
">
  <!-- Patients section container -->
  <div class="patients-container" style="
    background-color: #fff; /* White background to highlight the content */
    padding: 30px;          /* Internal spacing */
    margin: 20px auto;      /* Vertical margin and horizontal centering */
    border-radius: 8px;     /* Rounded corners */
    box-shadow: 0 4px 12px rgba(0,0,0,0.1); /* Subtle shadow for depth */
    max-width: 1200px;      /* Maximum width for large screens */
  ">
    <!-- Section header -->
    <div class="patients-header" style="margin-bottom: 20px;">
      <h2 style="color: #2c3e50;">Patients List</h2>
      <p style="color: #666;">Manage the details and appointments of your registered patients.</p>
    </div>

    <!-- Filters and search -->
    <div class="patients-filters" style="
      margin-bottom: 20px;
      display: flex;
      flex-wrap: wrap;
      align-items: center;
    ">
      <!-- Input for search -->
      <input type="text" placeholder="Search by name, email, or phone..." style="
        padding: 10px;               /* Internal spacing for the input */
        width: 300px;                /* Fixed width for the input */
        border: 1px solid #ddd;      /* Subtle border */
        border-radius: 4px;          /* Rounded corners */
        margin-right: 10px;          /* Right margin for separation */
      ">
      <!-- Button to perform the search -->
      <button style="
        padding: 10px 20px;
        background-color: #20a967;   /* Green background */
        border: none;                /* No border */
        border-radius: 4px;          /* Rounded corners */
        color: #fff;                 /* White text */
        cursor: pointer;             /* Pointer cursor on hover */
      ">Search</button>
      <!-- Button to add a new patient (aligned to the right) -->
      <button style="
        padding: 10px 20px;
        background-color: #3498db;   /* Blue background */
        border: none;
        border-radius: 4px;
        color: #fff;
        cursor: pointer;
        margin-left: auto;           /* Pushes the button to the right */
      ">Add Patient</button>
    </div>

    <!-- Patients table -->
    <table style="
      width: 100%;                 /* Table occupies full width of the container */
      border-collapse: collapse;   /* Removes space between cells */
    ">
      <!-- Table header -->
      <thead>
        <tr style="background-color: #20a967; color: #fff;">
          <!-- Each <th> defines a column with padding for better readability -->
          <th style="padding: 12px 8px; text-align: left;">Photo</th>
          <th style="padding: 12px 8px; text-align: left;">Name</th>
          <th style="padding: 12px 8px; text-align: left;">Age</th>
          <th style="padding: 12px 8px; text-align: left;">Gender</th>
          <th style="padding: 12px 8px; text-align: left;">Phone</th>
          <th style="padding: 12px 8px; text-align: left;">Email</th>
          <th style="padding: 12px 8px; text-align: left;">Last Consultation</th>
          <th style="padding: 12px 8px; text-align: left;">Actions</th>
        </tr>
      </thead>
      <!-- Table body with example patient data -->
      <tbody>
        <!-- Row 1: Patient data -->
        <tr style="border-bottom: 1px solid #ddd;">
          <td style="padding: 12px 8px;">
            <!-- Profile image with adjusted size and rounded borders -->
            <img src="path/to/patient1.jpg" alt="Patient 1" style="
              width: 40px; 
              height: 40px; 
              border-radius: 50%; 
              object-fit: cover;
            ">
          </td>
          <td style="padding: 12px 8px;">John Perez</td>
          <td style="padding: 12px 8px;">35</td>
          <td style="padding: 12px 8px;">Male</td>
          <td style="padding: 12px 8px;">305-123-4567</td>
          <td style="padding: 12px 8px;">john@example.com</td>
          <td style="padding: 12px 8px;">2025-02-10</td>
          <td style="padding: 12px 8px;">
            <!-- Action links: View, Edit, Delete -->
            <a href="#" style="color: #20a967; text-decoration: none; margin-right: 10px;">View</a>
            <a href="#" style="color: #3498db; text-decoration: none; margin-right: 10px;">Edit</a>
            <a href="#" style="color: #e74c3c; text-decoration: none;">Delete</a>
          </td>
        </tr>
        <!-- Row 2 -->
        <tr style="border-bottom: 1px solid #ddd;">
          <td style="padding: 12px 8px;">
            <img src="path/to/patient2.jpg" alt="Patient 2" style="
              width: 40px; 
              height: 40px; 
              border-radius: 50%; 
              object-fit: cover;
            ">
          </td>
          <td style="padding: 12px 8px;">Mary Lopez</td>
          <td style="padding: 12px 8px;">42</td>
          <td style="padding: 12px 8px;">Female</td>
          <td style="padding: 12px 8px;">305-987-6543</td>
          <td style="padding: 12px 8px;">mary@example.com</td>
          <td style="padding: 12px 8px;">2025-01-28</td>
          <td style="padding: 12px 8px;">
            <a href="#" style="color: #20a967; text-decoration: none; margin-right: 10px;">View</a>
            <a href="#" style="color: #3498db; text-decoration: none; margin-right: 10px;">Edit</a>
            <a href="#" style="color: #e74c3c; text-decoration: none;">Delete</a>
          </td>
        </tr>
        <!-- Row 3 -->
        <tr>
          <td style="padding: 12px 8px;">
            <img src="path/to/patient3.jpg" alt="Patient 3" style="
              width: 40px; 
              height: 40px; 
              border-radius: 50%; 
              object-fit: cover;
            ">
          </td>
          <td style="padding: 12px 8px;">Carlos Martinez</td>
          <td style="padding: 12px 8px;">29</td>
          <td style="padding: 12px 8px;">Male</td>
          <td style="padding: 12px 8px;">305-456-7890</td>
          <td style="padding: 12px 8px;">carlos@example.com</td>
          <td style="padding: 12px 8px;">2025-03-05</td>
          <td style="padding: 12px 8px;">
            <a href="#" style="color: #20a967; text-decoration: none; margin-right: 10px;">View</a>
            <a href="#" style="color: #3498db; text-decoration: none; margin-right: 10px;">Edit</a>
            <a href="#" style="color: #e74c3c; text-decoration: none;">Delete</a>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  <!-- Include the footer to maintain design consistency -->
  <?php include 'footer.php'; ?>
</div>
