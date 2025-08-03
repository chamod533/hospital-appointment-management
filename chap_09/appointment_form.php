<?php
// Include database connection
include 'db.php'; // Ensure the correct path to db.php

// Test connection
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Fetch doctors for dropdown
$sql = "SELECT name, specialty, work_hours FROM doctors";
$result = $conn->query($sql);

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $patient_name = $_POST['patient_name'];
    $contact_info = $_POST['contact_info'];
    $doctor_name = $_POST['doctor_name'];
    $appointment_date = $_POST['appointment_date'];
    $appointment_time = $_POST['appointment_time'];
    $reason = $_POST['reason'];

    // Insert into database
    $sql = "INSERT INTO appointments (patient_name, contact_info, doctor_name, appointment_date, appointment_time, reason) 
            VALUES ('$patient_name', '$contact_info', '$doctor_name', '$appointment_date', '$appointment_time', '$reason')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Appointment booked successfully!');</script>";
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
    <title>Book Appointment</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: rgb(234, 234, 234);
            color: #333;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            min-height: 100vh;
        }

        header {
            width: 100%;
            background: rgb(36, 138, 151);
            color: white;
            padding: 15px 0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
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
            margin: 0;
            font-size: 22px;
        }
        /* Pulse Animation */
@keyframes pulse {
    0%, 100% {
        transform: scale(1);
    }
    50% {
        transform: scale(1.1);
    }
}

.logo img {
    animation: pulse 2s infinite;
}


        .nav-links {
            display: flex;
          justify-content: flex-end; /* Pushes items to the right */
           align-items: center;
          gap: 10px; /* Reduce gap to remove excessive space */
         flex-grow: 1; /* Allows items to take up remaining space */
         }

        .nav-links a {
            text-decoration: none;
            color: white;
            font-weight: bold;
            padding: 12px 20px;
            border-radius: 25px;
            transition: all 0.3s ease;
            background-color: #4cae4c;
            font-size: 16px;
        }

        .nav-links a:hover {
            background: #3d8f3d;
        }

        /* Dropdown container */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        /* Dropdown button */
        .dropbtn {
            background-color: #4cae4c;
            color: white;
            font-weight: bold;
            padding: 12px 20px;
            border: none;
            cursor: pointer;
            border-radius: 25px;
            font-size: 16px;
        }

        /* Dropdown content (hidden by default) */
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: white;
            min-width: 160px;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
            border-radius: 5px;
            z-index: 1;
        }

        /* Dropdown links */
        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        /* Show dropdown on hover */
        .dropdown:hover .dropdown-content {
            display: block;
        }

        /* Change color on hover */
        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }
        

        .container {
            background: #ffffff;
            width: 95%;
            max-width: 550px;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.83);
            text-align: center;
            margin: 20px auto;
        }

        h2 {
            color: #4a4a8c;
            margin-bottom: 15px;
            font-size: 1.6rem;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        label {
            text-align: left;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input, select, textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 0.9rem;
            box-sizing: border-box;
            background: #f9f9f9;
        }

        select {
    max-width: 100%;
    padding: 8px;
    font-size: 14px;
}

        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color:rgb(74, 15, 137);
            background: #fff;
        }

        button {
            padding: 10px 15px;
            background:rgb(41, 183, 62);
            color: #fff;
            font-size: 0.9rem;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }

      

        textarea {
            resize: none;
        }

        footer {
            text-align: center;
            padding: 20px;
            background: #333;
            color: white;
            margin-top: 100px;
            width: 100%;
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

        <!-- Wrap all links except Contact Us -->
        <div class="nav-links">
            <a href="welcome.php">Home</a>
            <a href="appointment_form.php">Book Appointment</a>
            <a href="medical_specialists.php">Medical Specialists</a>

            <!-- Dropdown for Register/Login -->
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

    <h2>Book Appointment</h2>
    <form method="POST" action="">
        <label for="patient_name">Patient Name</label>
        <input type="text" id="patient_name" name="patient_name" required>

        <label for="contact_info">Contact Information</label>
        <input type="text" id="contact_info" name="contact_info" required>

        <label for="doctor_name">Doctor's Name</label>
        <select id="doctor_name" name="doctor_name" required>
            <option value="">-- Select Doctor --</option>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['name'] . "'>" . $row['specialty'] . " - " . $row['name'] . " (" . $row['work_hours'] . ")</option>";
                }
            }
            ?>
        </select>


        <label for="appointment_date">Appointment Date</label>
        <input type="date" id="appointment_date" name="appointment_date" required>

        <label for="appointment_time">Appointment Time</label>
        <input type="time" id="appointment_time" name="appointment_time" required>

        <label for="reason">Reason for Appointment</label>
        <textarea id="reason" name="reason" rows="3" required></textarea>

        <button type="submit">Book Appointment</button>
    </form>
</div>

<footer>
    <p>&copy; 2025 ABC Virtual Web App. All rights reserved.</p>
</footer>

</body>
</html>
