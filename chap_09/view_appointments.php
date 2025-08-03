<?php
session_start();
include('db.php');

// Check if the user is logged in and has the correct role
if (!isset($_SESSION['user_role']) || !in_array($_SESSION['user_role'], ['doctors', 'receptionists'])) {
    header("Location: manage_appointments.php"); // Redirect if not authorized
    exit();
}

$role = $_SESSION['user_role'];
$username = $_SESSION['username'];

// Fetch appointments based on the role
if ($role === 'doctors') {
    $sql = "SELECT * FROM appointments WHERE doctor_name = '$username'";
} else { // Receptionist can view all appointments
    $sql = "SELECT * FROM appointments";
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/bootstrap.bundle.js" defer></script>
    <title>View Appointments</title>
   
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: rgb(235, 235, 240);
            color: #333;
        }

        header {
            background: #5cb85c;
            color: white;
            padding: 15px;
            text-align: center;
            font-size: 20px;
        }

        /* Navigation Bar */
        .navbar {
            background-color: rgb(42, 93, 164);
            overflow: hidden;
            display: flex;
            justify-content: center;
            padding: 10px;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            padding: 14px 20px;
            display: inline-block;
            font-size: 16px;
        }

        .navbar a:hover {
            background-color: rgb(30, 70, 130);
            border-radius: 5px;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h1 {
            text-align: center;
            color: rgb(42, 158, 108);
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: rgb(42, 93, 164);
            color: white;
        }

        .welcome {
            text-align: center;
            font-size: 18px;
            margin-top: 10px;
        }

        .logout {
            text-align: center;
            margin-top: 10px;
        }

        .logout a {
            color: red;
            text-decoration: none;
            font-weight: bold;
        }

        footer {
            text-align: center;
            padding: 20px;
            background: #333;
            color: white;
            margin-top: 200px;
        }

    </style>

</head>
<body>

<!-- Dynamic Navigation Bar -->
<div class="navbar">
    <?php if ($role === 'doctors') { ?>
        <a href="logout.php">Logout</a>
        
    <?php } else if ($role === 'receptionists') { ?>
        <a href="manage_appointments.php">Manage Appointments</a>
        <a href="patient_register.php">Register Patient</a>
        <a href="logout.php">Logout</a>
    <?php } ?>
</div>

<div class="container">
    <h1>View Appointments</h1>

    <p class="welcome">Welcome, <strong><?php echo $_SESSION['username']; ?></strong>! (Role - <strong><?php echo ucfirst($_SESSION['user_role']); ?></strong>)</p>
    

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Patient Name</th>
                <th>Doctor Name</th>
                <th>Date</th>
                <th>Time</th>
                <th>Reason</th>
                
                
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['patient_name']}</td>
                        <td>{$row['doctor_name']}</td>
                        <td>{$row['appointment_date']}</td>
                        <td>{$row['appointment_time']}</td>
                        <td>{$row['reason']}</td>";
                        
                    
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No appointments found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>



<footer>
    <p>&copy; 2025 ABC Virtual Web App. All rights reserved.</p>
</footer>


</body>
</html>
