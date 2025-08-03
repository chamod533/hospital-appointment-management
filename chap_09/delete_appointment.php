<?php
session_start();
include 'db.php';

// Check if the admin is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit();
}

// Get the appointment ID from the URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Delete the appointment
    $delete_query = "DELETE FROM appointments WHERE id = $id";

    if ($conn->query($delete_query)) {
        header('Location: manage_appointments.php');
        exit();
    } else {
        echo "Failed to delete appointment.";
    }
}
?>
