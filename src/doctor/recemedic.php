<?php
session_start();
include 'docheader.php';
include 'sidebar.php';
?>
<div class="content" id="content" style="padding-top: 80px; margin-left: 220px; transition: margin-left 0.3s ease;">
  <div class="recemedic-container" style="background-color: #fff; padding: 30px; margin: 20px auto; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); max-width: 1200px;">
    <div class="recemedic-header" style="margin-bottom: 20px;">
      <h2 style="color: #2c3e50;">Medical Prescriptions</h2>
      <p style="color: #666;">Manage medical prescriptions for the specialties of Nephrology and General Medicine.</p>
    </div>
    <div class="recemedic-filters" style="margin-bottom: 20px; display: flex; flex-wrap: wrap; align-items: center;">
      <input type="text" placeholder="Search by patient or medication..." style="padding: 10px; width: 300px; border: 1px solid #ddd; border-radius: 4px; margin-right: 10px;">
      <select style="padding: 10px; border: 1px solid #ddd; border-radius: 4px; margin-right: 10px;">
        <option value="">All Specialties</option>
        <option value="nephrology">Nephrology</option>
        <option value="general_medicine">General Medicine</option>
      </select>
      <button style="padding: 10px 20px; background-color: #20a967; border: none; border-radius: 4px; color: #fff; cursor: pointer; margin-right: 10px;">Search</button>
      <button style="padding: 10px 20px; background-color: #3498db; border: none; border-radius: 4px; color: #fff; cursor: pointer; margin-left: auto;">Add Prescription</button>
    </div>
    <table style="width: 100%; border-collapse: collapse;">
      <thead>
        <tr style="background-color: #20a967; color: #fff;">
          <th style="padding: 12px 8px; text-align: left;">Date</th>
          <th style="padding: 12px 8px; text-align: left;">Patient</th>
          <th style="padding: 12px 8px; text-align: left;">Specialty</th>
          <th style="padding: 12px 8px; text-align: left;">Medication</th>
          <th style="padding: 12px 8px; text-align: left;">Dose</th>
          <th style="padding: 12px 8px; text-align: left;">Instructions</th>
          <th style="padding: 12px 8px; text-align: left;">Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr style="border-bottom: 1px solid #ddd;">
          <td style="padding: 12px 8px;">2025-04-10</td>
          <td style="padding: 12px 8px;">Ana Gonzalez</td>
          <td style="padding: 12px 8px;">Nephrology</td>
          <td style="padding: 12px 8px;">Losartan</td>
          <td style="padding: 12px 8px;">50 mg</td>
          <td style="padding: 12px 8px;">Take 1 tablet daily</td>
          <td style="padding: 12px 8px;">
            <a href="#" style="color: #20a967; text-decoration: none; margin-right: 10px;">View</a>
            <a href="#" style="color: #3498db; text-decoration: none; margin-right: 10px;">Edit</a>
            <a href="#" style="color: #e74c3c; text-decoration: none;">Delete</a>
          </td>
        </tr>
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
  <?php include 'footer.php'; ?>
</div>
