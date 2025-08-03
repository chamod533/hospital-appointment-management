<?php
session_start();
include 'db.php';

// Check if the admin is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: ');
    exit();
}

// Get the appointment ID from the URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Fetch appointment details
    $query = "SELECT * FROM appointments WHERE id = $id";
    $result = $conn->query($query);
    $appointment = $result->fetch_assoc();
}

// Update the appointment details
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $patient_name = $_POST['patient_name'];
    $doctor_name = $_POST['doctor_name'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    $update_query = "UPDATE appointments SET patient_name = '$patient_name', doctor_name = '$doctor_name', appointment_date = '$date', appointment_time = '$time' WHERE id = $id";

    if ($conn->query($update_query)) {
        header('Location: manage_appointments.php');
        exit();
    } else {
        $error = "Failed to update appointment.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Appointment</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .form-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Edit Appointment</h2>
        <?php if (isset($error)) : ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="patient_name" class="form-label">Patient Name</label>
                <input type="text" id="patient_name" name="patient_name" class="form-control" value="<?= $appointment['patient_name'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="doctor_name" class="form-label">Doctor Name</label>
                <input type="text" id="doctor_name" name="doctor_name" class="form-control" value="<?= $appointment['doctor_name'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="date" id="date" name="date" class="form-control" value="<?= $appointment['appointment_date'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="time" class="form-label">Time</label>
                <input type="time" id="time" name="time" class="form-control" value="<?= $appointment['appointment_time'] ?>" required>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
        </form>
    </div>
    <script src="js/bootstrap.bundle.js"></script>
</body>
</html>
