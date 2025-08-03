<?php
session_start();
include 'db.php';

// Check if admin is logged in


// Initialize messages
$success = $error = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $contact = filter_var($_POST['contact'], FILTER_SANITIZE_NUMBER_INT);
    $password = $_POST['password'];

    

        // Check if email or contact already exists
        $checkQuery = "SELECT * FROM receptionists WHERE email='$email' OR contact='$contact'";
        $result = $conn->query($checkQuery);
        
        if ($result->num_rows > 0) {
            $error = "Email or Contact Number already exists!";
        } else {
            // Insert receptionist into database
            $query = "INSERT INTO receptionists (name, email, contact, password) VALUES ('$name', '$email', '$contact', '$password')";
            if ($conn->query($query)) {
                $success = "Receptionist registered successfully!";
            } else {
                $error = "Error: " . $conn->error;
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Register Receptionist</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to bottom right, rgb(56, 157, 133), rgb(73, 189, 195));
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-container {
            background: white;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 400px;
            text-align: center;
        }
        h2 {
            margin-bottom: 20px;
            color: #333;
            text-align: center;
            font-size: 24px;
        }
        label {
            display: block;
            text-align: left;
            font-weight: bold;
            margin-top: 10px;
            color: #333;
        }
        input {
            width: 95%;
            padding: 10px;
            margin: 5px 0 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }
        button {
            width: 100%;
            padding: 12px;
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
        .error {
            color: red;
            font-size: 14px;
            margin-top: 10px;
        }
        .message {
            color: green;
            font-size: 14px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Register Receptionist</h2>
        <form method="POST" action="">
            <label for="name">Full Name</label>
            <input type="text" name="name" id="name" placeholder=" Full Name" required>

            <label for="email">Email Address</label>
            <input type="email" name="email" id="email" placeholder=" Email Address" required>

            <label for="contact">Contact Number</label>
            <input type="text" name="contact" id="contact" placeholder="Contact Number" required>

            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder=" Password (Min 6 chars, 1 uppercase, 1 number)" required>

            <button type="submit">Register</button>
        </form>
        <?php 
            if ($success) { 
                echo "<p class='message'>$success</p>"; 
            } elseif ($error) { 
                echo "<p class='error'>$error</p>"; 
            }
        ?>
    </div>
</body>
</html>
