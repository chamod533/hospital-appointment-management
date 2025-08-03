<?php
include('db.php');

// Get the appointment ID and status from the form
$appointment_id = $_POST['appointment_id'];
$status = $_POST['status'];

// Update the appointment status
$sql = "UPDATE appointments SET status = '$status' WHERE id = $appointment_id";

if ($conn->query($sql) === TRUE) {
    echo "Appointment status updated successfully!";
    header("Location: view_appointments.php?role=receptionist"); // Redirect back to the appointments page
} else {
    echo "Error updating status: " . $conn->error;
}
?>
