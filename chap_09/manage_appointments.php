<?php
session_start();
include 'db.php';

// Check if the user is logged in as admin or receptionist
if (!isset($_SESSION['user_role']) || ($_SESSION['user_role'] !== 'admin' && $_SESSION['user_role'] !== 'receptionists')) {
    header('Location: login.php'); // Redirect unauthorized users
    exit();
}

// Fetch all appointments from the database
$query = "SELECT * FROM appointments ORDER BY appointment_date ASC";
$result = $conn->query($query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Appointments</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/bootstrap.bundle.js" defer></script>
</head>

<style>
footer {
    text-align: center;
    padding: 20px;
    background: #333;
    color: white;
    margin-top: 230px;
        }

     

</style>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Manage Appointments</h1>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Appointment ID</th>
                    <th>Patient Name</th>
                    <th>Doctor</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Actions</th>
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
                                <td>
                                    <a href='edit_appointment.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
                                    <a href='delete_appointment.php?id={$row['id']}' class='btn btn-danger btn-sm'>Delete</a>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6' class='text-center'>No appointments found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <a href="add_appointment.php" class="btn btn-primary">Add New Appointment</a>
    </div>

    <footer>
    <p>&copy; 2025 ABC Virtual Web App. All rights reserved.</p>
</footer>
</body>
</html>
