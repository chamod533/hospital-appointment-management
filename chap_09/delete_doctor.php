<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Delete the doctor
        $query = "DELETE FROM doctors WHERE doctorid = $id";
        if ($conn->query($query) === TRUE) {
            echo "<script>alert('Doctor deleted successfully!');</script>";
            header('Location: admin_dashboard.php');
            exit();
        } else {
            echo "Error: " . $conn->error;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Doctor</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background: #ffffff;
            padding: 20px 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 100%;
            max-width: 400px;
        }

        h2 {
            margin-bottom: 20px;
            color: #d9534f;
        }

        p {
            margin-bottom: 20px;
            color: #555;
        }

        .btn {
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-danger {
            background-color: #d9534f;
            color: #ffffff;
        }

        .btn-danger:hover {
            background-color: #c9302c;
        }

        .btn-secondary {
            background-color: #6c757d;
            color: #ffffff;
            margin-left: 10px;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }

        a {
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Confirm Delete</h2>
        <p>Are you sure you want to delete this doctor?</p>
        <form method="POST">
            <button type="submit" class="btn btn-danger">Yes, Delete</button>
            <a href="admin_dashboard.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>
