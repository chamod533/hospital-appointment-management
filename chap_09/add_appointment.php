<?php
session_start();
include 'db.php';

// Check if the user is logged in as admin or receptionist
if (!isset($_SESSION['user_role']) || ($_SESSION['user_role'] !== 'admin' && $_SESSION['user_role'] !== 'receptionists')) {
    header('Location: login.php'); // Redirect unauthorized users
    exit();
}

$error = "";
$success = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $patient_name = trim($_POST['patient_name']);
    $doctor_name = trim($_POST['doctor_name']);
    $appointment_date = $_POST['appointment_date'];
    $appointment_time = $_POST['appointment_time'];

    // Check if any field is empty
    if (empty($patient_name) || empty($doctor_name) || empty($appointment_date) || empty($appointment_time)) {
        $error = "All fields are required!";
    } else {
        // Check for duplicate appointments (same doctor, date, and time)
        $check_query = "SELECT * FROM appointments WHERE doctor_name = ? AND appointment_date = ? AND appointment_time = ?";
        $stmt = $conn->prepare($check_query);
        $stmt->bind_param("sss", $doctor_name, $appointment_date, $appointment_time);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $error = "This time slot is already booked for the selected doctor!";
        } else {
            // Insert new appointment into the database
            $insert_query = "INSERT INTO appointments (patient_name, doctor_name, appointment_date, appointment_time) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($insert_query);
            $stmt->bind_param("ssss", $patient_name, $doctor_name, $appointment_date, $appointment_time);

            if ($stmt->execute()) {
                $success = "Appointment added successfully!";
            } else {
                $error = "Error: " . $stmt->error;
            }
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Appointment</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/bootstrap.bundle.js" defer></script>
</head>
<style>


    /* General Page Styling */
body {
    font-family: Arial, sans-serif;
    background-color: #f8f9fa;
    margin: 0;
    padding: 0;
}

/* Container */
.container {
    max-width: 600px;
    background: #ffffff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.84);
}

/* Header */
h1 {
    text-align: center;
    color: #333;
}

/* Form Styling */
form {
    margin-top: 20px;
}

.form-label {
    font-weight: bold;
    color: #555;
}

.form-control {
    border-radius: 5px;
    border: 1px solid #ccc;
    padding: 8px;
}

/* Alert Messages */
.alert {
    text-align: center;
    font-weight: bold;
    padding: 10px;
    border-radius: 5px;
}

.alert-danger {
    background: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
}

.alert-success {
    background: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
}

/* Buttons */
.btn {
    padding: 10px 15px;
    border-radius: 5px;
    font-size: 16px;
    text-align: center;
}

.btn-success {
    background-color: #4a4a8c;
    color: white;
    border: none;
}

.btn-success:hover {
    background-color: #218838;
}

.btn-secondary {
    background-color: #6c757d;
    color: white;
    border: none;
}

.btn-secondary:hover {
    background-color: #5a6268;
}

/* Responsive Design */
@media (max-width: 768px) {
    .container {
        max-width: 90%;
    }
}

</style>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Add New Appointment</h1>

        <?php if (!empty($error)) { echo "<div class='alert alert-danger'>$error</div>"; } ?>
        <?php if (!empty($success)) { echo "<div class='alert alert-success'>$success</div>"; } ?>

        <form action="add_appointment.php" method="POST">
            <div class="mb-3">
                <label for="patient_name" class="form-label">Patient Name</label>
                <input type="text" class="form-control" id="patient_name" name="patient_name" required>
            </div>

            <div class="mb-3">
                <label for="doctor_name" class="form-label">Doctor Name</label>
                <input type="text" class="form-control" id="doctor_name" name="doctor_name" required>
            </div>

            <div class="mb-3">
                <label for="appointment_date" class="form-label">Appointment Date</label>
                <input type="date" class="form-control" id="appointment_date" name="appointment_date" required>
            </div>

            <div class="mb-3">
                <label for="appointment_time" class="form-label">Appointment Time</label>
                <input type="time" class="form-control" id="appointment_time" name="appointment_time" required>
            </div>

            <button type="submit" class="btn btn-success">Add Appointment</button>
            <a href="manage_appointments.php" class="btn btn-secondary">Back</a>
        </form>
    </div>
</body>
</html>
