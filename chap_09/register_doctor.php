<?php
// Include database connection
include 'db.php';

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $specialty = $_POST['specialty'];
    $contact = $_POST['contact'];
    $work_hours = $_POST['work_hours'];

    // Insert into database
    $sql = "INSERT INTO doctors (name, specialty, contact, work_hours) VALUES ('$name', '$specialty', '$contact', '$work_hours')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Doctor registered successfully!');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Register Doctor</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to bottom right,rgb(56, 157, 133),rgb(73, 189, 195));
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            color: #555;
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            box-sizing: border-box;
        }

        textarea {
            resize: none;
        }

        button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background: #6a11cb;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        button:hover {
            background: #2575fc;
        }

        button:active {
            transform: scale(0.98);
        }




    </style>
</head>

<body>


<div class="container">
    <h2>Register Doctor</h2>
    <form method="POST" action="">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" required>

        <label for="specialty">Specialty</label>
        <input type="text" id="specialty" name="specialty" required>

        <label for="contact">Contact Information</label>
        <input type="text" id="contact" name="contact" required>

        <label for="work_hours">Work Hours/Schedule</label>
        <textarea id="work_hours" name="work_hours" rows="3" required></textarea>

        <button type="submit">Register Doctor</button>
    </form>
</div>

</body>
</html>
