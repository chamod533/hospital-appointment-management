<?php
session_start();
include 'db.php'; // Include database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $subject = $conn->real_escape_string($_POST['subject']);
    $message = $conn->real_escape_string($_POST['message']);

    // Insert into database
    $query = "INSERT INTO contact_messages (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";

    if ($conn->query($query)) {
        $_SESSION['message'] = "Your message has been sent successfully!";
    } else {
        $_SESSION['message'] = "Error: " . $conn->error;
    }

    $conn->close();
    header("Location: contact_us.php");
    exit();
}
?>
