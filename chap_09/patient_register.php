<?php
include 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO patients (full_name, email, password) VALUES ('$full_name', '$email', '$password')";

    if ($conn->query($sql)) {
        header("Location: welcome.php");
        exit();
    } else {
        echo "Registration failed: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Document</title>
</head>
<style>
 
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        header {
            background: #298b9d;
            padding: 15px 0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            position: fixed;
            top: 0;
            left: 0;
        }

        nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            max-width: 1100px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .logo {
            display: flex;
            align-items: center;
        }

        .logo img {
            width: 50px;
            height: 50px;
            margin-right: 10px;
            border-radius: 35px;
        }

        .logo h3 {
            color: white;
            font-size: 22px;
            margin: 0;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .nav-links a, .dropbtn {
            text-decoration: none;
            color: white;
            font-weight: bold;
            padding: 12px 20px;
            border-radius: 25px;
            transition: all 0.3s ease;
            background-color: #4caf50;
            font-size: 16px;
            border: none;
            cursor: pointer;
        }

        .nav-links a:hover, .dropbtn:hover {
            background: #3d8f3d;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: white;
            min-width: 160px;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
            border-radius: 5px;
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }

        .container {
            background: #fff;
            padding: 40px;
            max-width: 330px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(29, 152, 193, 0.96);
            margin-top: 160px;
            text-align: center;
            width: 90%;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            text-align: left;
            font-weight: bold;
            margin-bottom: 2px;
        }

        input[type="Full Name"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        

        input {
            width: 95%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background: #28a745;
            color: white;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
            width: 100%;
            border-radius: 5px;
        }

        button:hover {
            background: #218838;
        }
        

        footer {
            text-align: center;
            padding: 20px;
            background: #333;
            color: white;
            width: 100%;
            
            margin-top: 70px;
        }

        
        
        

    </style>
    </head>
<body>

<header>
    <nav>
        <div class="logo">
            <img src="images/hospital-logo-vector_1277164-14305.avif" alt="ABC Hospital Logo">
            <h3>ABC Hospital</h3>
        </div>
        <div class="nav-links">
            <a href="welcome.php">Home</a>
            <a href="appointment_form.php">Book Appointment</a>
            <a href="medical_specialists.php">Medical Specialists</a>
            <div class="dropdown">
                <button class="dropbtn">Join us ▼</button>
                <div class="dropdown-content">
                    <a href="patient_register.php">Register</a>
                    <a href="patient_login.php">Login</a>
                </div>
            </div>
            <a href="about_us.php">About Us</a>
            <a href="contact_us.php">Contact Us</a>
        </div>
    </nav>
</header>
    <div class="container" >
    <form method="POST">
    <h2>Patient Registration</h2>
    <label for="text">Full name:</label>
        <input type="text" id="text" name="text" placeholder="Full Name" required><br>

    <label for="email" id="email">Email:</label>
        <input type="email" name="email" placeholder="Email" required><br>

    <label for="password" id="password">password:</label>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit">Register</button>
    </form>

    <div class="register-link">
        <p>You have an account? <a href="patient_login.php">Login here</a></p>
    </div>
    </div>

    <footer>
    <p>&copy; 2025 ABC Virtual Web App. All rights reserved.</p>
</footer>
 

</body>
</html>