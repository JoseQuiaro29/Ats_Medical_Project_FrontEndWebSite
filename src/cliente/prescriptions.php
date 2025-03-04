<?php
session_start();
// Incluir el header (abre <html> y <body>) y el sidebar
include 'cliheader.php';
include 'sidebar.php';
?>

<!-- Contenedor principal del contenido -->
<div class="content" style="
  margin-left: 220px;  /* Espacio para el sidebar fijo */
  margin-top: 60px;    /* Evita que quede detrás del header de 60px */
  padding: 40px;       /* Espaciado interno */
  transition: margin-left 0.3s ease;
">
  <!-- Contenedor de las prescripciones -->
  <div class="prescriptions-container" style="
    background: #fff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    margin-bottom: 30px;
  ">
    <h2 style="margin-top: 0; font-size: 2rem; color: #2c3e50;">My Prescriptions</h2>
    <p style="margin-bottom: 20px; color: #666;">
      Below is a list of your current prescriptions. Click "View Details" for more information.
    </p>
    
    <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
      <thead>
        <tr style="background: #20a967; color: #fff;">
          <th style="padding: 15px 10px; text-align: left;">Date Issued</th>
          <th style="padding: 15px 10px; text-align: left;">Medication</th>
          <th style="padding: 15px 10px; text-align: left;">Dosage</th>
          <th style="padding: 15px 10px; text-align: left;">Doctor</th>
          <th style="padding: 15px 10px; text-align: left;">Status</th>
          <th style="padding: 15px 10px; text-align: left;">Action</th>
        </tr>
      </thead>
      <tbody>
        <!-- Ejemplos de prescripciones. En producción, genera estas filas con datos dinámicos -->
        <tr style="border-bottom: 1px solid #e0e0e0;">
          <td style="padding: 15px 10px;">2025-03-05</td>
          <td style="padding: 15px 10px;">Lisinopril</td>
          <td style="padding: 15px 10px;">10 mg daily</td>
          <td style="padding: 15px 10px;">Dr. Manuel Garcia Estrada</td>
          <td style="padding: 15px 10px;">Active</td>
          <td style="padding: 15px 10px;">
            <a href="prescription_details.php?id=1" style="
              color: #20a967;
              text-decoration: none;
              font-weight: bold;
            ">
              View Details
            </a>
          </td>
        </tr>
        <tr style="border-bottom: 1px solid #e0e0e0;">
          <td style="padding: 15px 10px;">2025-02-20</td>
          <td style="padding: 15px 10px;">Metformin</td>
          <td style="padding: 15px 10px;">500 mg twice daily</td>
          <td style="padding: 15px 10px;">Dr. Manuel Garcia Estrada</td>
          <td style="padding: 15px 10px;">Refill Needed</td>
          <td style="padding: 15px 10px;">
            <a href="prescription_details.php?id=2" style="
              color: #20a967;
              text-decoration: none;
              font-weight: bold;
            ">
              View Details
            </a>
          </td>
        </tr>
        <tr>
          <td style="padding: 15px 10px;">2025-01-15</td>
          <td style="padding: 15px 10px;">Amlodipine</td>
          <td style="padding: 15px 10px;">5 mg daily</td>
          <td style="padding: 15px 10px;">Dr. Manuel Garcia Estrada</td>
          <td style="padding: 15px 10px;">Expired</td>
          <td style="padding: 15px 10px;">
            <a href="prescription_details.php?id=3" style="
              color: #20a967;
              text-decoration: none;
              font-weight: bold;
            ">
              View Details
            </a>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

<?php include '../doctor/footer.php'; ?>

<!-- jQuery & Bootstrap JS (CDN) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
