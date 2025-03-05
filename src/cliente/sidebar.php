<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar</title>
    <!-- Include Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <h3>Menu</h3>
            
        </div>
        <ul>
            <li>
                <a href="cliente_dashboard.php" class="<?php if (basename($_SERVER['PHP_SELF']) == 'cliente_dashboard.php') echo 'active'; ?>">
                    <i class="fas fa-tachometer-alt"></i><span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="appointments.php" class="<?php if (basename($_SERVER['PHP_SELF']) == 'appointments.php') echo 'active'; ?>">
                    <i class="fas fa-calendar-alt"></i><span>My Appointments</span>
                </a>
            </li>
            <li>
                <a href="book_appointment.php" class="<?php if (basename($_SERVER['PHP_SELF']) == 'book_appointment.php') echo 'active'; ?>">
                    <i class="fas fa-plus-circle"></i><span>Book Appointment</span>
                </a>
            </li>
            <li>
                <a href="prescriptions.php" class="<?php if (basename($_SERVER['PHP_SELF']) == 'prescriptions.php') echo 'active'; ?>">
                    <i class="fas fa-prescription-bottle-alt"></i><span>My Prescriptions</span>
                </a>
            </li>
            <li>
                <a href="chat.php">
                    <i class="fas fa-comments"></i><span>Chat</span>
                </a>
            </li>
            <li>
                <a href="notifications.php">
                    <i class="fas fa-bell"></i><span>Notifications</span>
                </a>
            </li>
            <li>
                <a href="settings.php">
                    <i class="fas fa-cog"></i><span>Settings</span>
                </a>
            </li>
            <li>
                <a href="../../login.php">
                    <i class="fas fa-sign-out-alt"></i><span>Logout</span>
                </a>
            </li>
        </ul>
    </div>
    <script>
        const toggleBtnClient = document.getElementById('toggleSidebarBtn');
        const sidebarClient = document.getElementById('sidebar');
        
        toggleBtnClient.addEventListener('click', () => {
            sidebarClient.classList.toggle('collapsed');
        });
    </script>
</body>
</html>
