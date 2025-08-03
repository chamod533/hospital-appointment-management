<?php
session_start();
if (!isset($_SESSION['patient_logged_in'])) {
    header("Location: patient_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Patient Dashboard</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; padding: 20px; }
        a { text-decoration: none; color: white; background: green; padding: 10px 15px; display: inline-block; }
    </style>
</head>
<body>

<h2>Welcome, <?= $_SESSION['patient_name'] ?></h2>
<p>You are logged in as a patient.</p>
<a href="logout.php">Logout</a>

</body>
</html>
