<?php
session_start();
// Incluir el header (abre <html> y <body>) y el sidebar
include 'cliheader.php';
include 'sidebar.php';
?>

<!-- Contenedor principal del contenido -->
<div class="content" id="content">
  <!-- Contenedor de las prescripciones -->
  <div class="prescriptions-container">
    <h2>My Prescriptions</h2>
    <p>
      Below is a list of your current prescriptions. Click "View Details" for more information.
    </p>
    
    <table>
      <thead>
        <tr>
          <th>Date Issued</th>
          <th>Medication</th>
          <th>Dosage</th>
          <th>Doctor</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <!-- Ejemplos de prescripciones. En producción, genera estas filas con datos dinámicos -->
        <tr>
          <td>2025-03-05</td>
          <td>Lisinopril</td>
          <td>10 mg daily</td>
          <td>Dr. Manuel Garcia Estrada</td>
          <td>Active</td>
          <td>
            <a href="prescription_details.php?id=1">
              View Details
            </a>
          </td>
        </tr>
        <tr>
          <td>2025-02-20</td>
          <td>Metformin</td>
          <td>500 mg twice daily</td>
          <td>Dr. Manuel Garcia Estrada</td>
          <td>Refill Needed</td>
          <td>
            <a href="prescription_details.php?id=2">
              View Details
            </a>
          </td>
        </tr>
        <tr>
          <td>2025-01-15</td>
          <td>Amlodipine</td>
          <td>5 mg daily</td>
          <td>Dr. Manuel Garcia Estrada</td>
          <td>Expired</td>
          <td>
            <a href="prescription_details.php?id=3">
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

<style>
  /* prescriptions.php styles */
  .content {
    margin-left: 220px;
    margin-top: 60px;
    padding: 40px;
    transition: margin-left 0.3s ease;
  }

  .content.collapsed {
    margin-left: 70px;
  }

  .prescriptions-container {
    background: #fff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    margin-bottom: 30px;
  }

  .prescriptions-container h2 {
    margin-top: 0;
    font-size: 2rem;
    color: #2c3e50;
    font-weight: bold;
  }

  .prescriptions-container p {
    margin-bottom: 20px;
    color: #666;
  }

  table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
  }

  th,
  td {
    padding: 15px 10px;
    text-align: left;
    border-bottom: 1px solid #e0e0e0;
  }

  th {
    background: #20a967;
    color: #fff;
    font-weight: normal;
    font-size: 1.5rem;
    font-weight: bold;
  }

  tbody tr:hover {
    background: #f1f1f1;
  }

  a {
    color: #20a967;
    text-decoration: none;
   /* font-weight: bold;*/  /* coloca el texto en negrita */
  }

  /* Responsive adjustments */
  @media (max-width: 768px) {
    .content {
      margin-left: 70px;
      padding: 20px;
    }

    th,
    td {
      padding: 12px 8px;
      font-size: 1.5rem;
    }

    .prescriptions-container {
      padding: 20px;
    }

    .prescriptions-container h2 {
      font-size: 1.8rem;
    }
  }
</style>
