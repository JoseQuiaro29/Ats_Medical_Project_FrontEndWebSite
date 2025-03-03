<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cliente Dashboard</title>
    <link rel="stylesheet" href="../../css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
      .toggle-btn {
        background: none;
        border: none;
        color: #fff;
        font-size: 1.5rem;
        cursor: pointer;
        padding: 0;
        margin-right: 10px;
      }
      .sidebar ul li a i {
        margin-right: 10px;
      }
      .sidebar.collapsed {
        width: 60px;
      }
      .sidebar.collapsed h3,
      .sidebar.collapsed ul li a span {
        display: none;
      }
      .sidebar ul li a {
        display: flex;
        align-items: center;
        text-decoration: none;
        color: #333;
        padding: 8px;
        border-radius: 4px;
        width: 100%;
        justify-content: flex-start; /* Align items to the start */
      }
      .sidebar.collapsed ul li a {
        justify-content: center; /* Center the icon */
      }
    </style>
</head>
<body style="background-color: #f0f0f0;">
    <div class="sidebar" id="sidebar">
        <h3>Menu</h3>
        <ul>
            <li><a href="#"><i class="fas fa-calendar-alt"></i><span>Agendar</span></a></li>
            <li><a href="#"><i class="fas fa-user"></i><span>Usuario</span></a></li>
        </ul>
    </div>
    <div class="content" id="content">
        <div class="header">
            <button class="toggle-btn" id="toggle-btn">&#9776;</button> <!-- Three bars symbol as button -->
            <img src="path/to/user/image.jpg" alt="User Image" width="30" height="30">
            <span>Nombre del Usuario</span>
            <a href="logout.php">Cerrar Sesión</a>
        </div>
        <h2>Bienvenido al Dashboard del Cliente</h2>
        <?php include '../../footer.php'; ?>
    </div>
</body>
</html>
