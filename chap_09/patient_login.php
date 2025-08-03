<?php
include 'db.php';
session_start();

$error = ""; // To store login errors

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Prepare a secure query to prevent SQL Injection
    $stmt = $conn->prepare("SELECT id, full_name, password FROM patients WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        $hashed_password = $user['password'];
        
        // Debugging Output (Remove after testing)
        error_log("Stored Hashed Password: " . $hashed_password);
        error_log("Entered Password: chamod" . $password);

        if (password_verify($password, $hashed_password)) {
            $_SESSION['patient_logged_in'] = true;
            $_SESSION['patient_id'] = $user['id'];
            $_SESSION['patient_name'] = $user['full_name'];

            header("Location: dashboard.php");
            exit();
        } else {
            $error = "Invalid email or password!";
        }
    } else {
        $error = "Invalid email or password!";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Patient Login - ABC Hospital</title>
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
            min-height: 100vh;
        }

        header {
            background: #298b9d;
            padding: 15px 0;
            width: 100%;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 999;
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
            padding: 10px 20px;
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
            padding: 10px;
            text-decoration: none;
            display: block;
            border-bottom: 1px solid #eaeaea;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .container {
            background: #fff;
            padding: 40px;
            max-width: 350px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(29, 152, 193, 0.96);
            margin-top: 120px;
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
            margin-bottom: 5px;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .error-message {
            color: red;
            font-size: 14px;
            margin-bottom: 10px;
        }

        button {
            background: #28a745;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
            width: 100%;
            border-radius: 5px;
            font-size: 16px;
        }

        button:hover {
            background: #218838;
        }

        .register-link {
            margin-top: 15px;
        }

        .register-link a {
            color: #298b9d;
            text-decoration: none;
            font-weight: bold;
        }

        .register-link a:hover {
            text-decoration: underline;
        }

        footer {
            text-align: center;
            padding: 20px;
            background: #333;
            color: white;
            width: 100%;
            
            margin-top: 180px;
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

<div class="container">
    <h2>Patient Login</h2>

    <!-- Display error message if login fails -->
    <?php if (!empty($error)): ?>
        <p class="error-message"><?php echo $error; ?></p>
    <?php endif; ?>

    <form method="POST" action="">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder="Enter your password" required>

        <button type="submit">Login</button>
    </form>

    <div class="register-link">
        <p>Don't have an account? <a href="patient_register.php">Register here</a></p>
    </div>
</div>

<footer>
    <p>&copy; 2025 ABC Virtual Web App. All rights reserved.</p>
</footer>

</body>
</html>
