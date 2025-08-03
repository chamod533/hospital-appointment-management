<?php
session_start();

// Check if admin is logged in
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: admin_login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/bootstrap.bundle.js" defer></script>
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color:#4eedb0;
            padding: 20px;
        }
        .dashboard-container {
            max-width: 800px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.62);
        }
        h2 {
            margin-bottom: 20px;
        }
        ul {
            list-style: none;
            padding: 0;
        }
        li {
            margin: 10px 0;
        }
        a {
            text-decoration: none;
            color: #5cb85c;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <h2>Welcome, Admin</h2>
        <ul>
            <li><a href="manage_doctors.php" class='btn btn-warning btn-sm'>Manage Doctors</a></li>
            <li><a href="manage_receptionists.php" class='btn btn-warning btn-sm'>Manage Receptionists</a></li>
            <li><a href="manage_appointments.php" class='btn btn-warning btn-sm'>Manage Appointments</a></li>
            <li><a href="logout.php" class='btn btn-danger btn-sm'>Logout</a></li>
        </ul>
    </div>
</body>
</html>
