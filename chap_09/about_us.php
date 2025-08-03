<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us </title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }

        header {
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
            max-width: 900px;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.77);
            border-radius: 8px;
            text-align: center;
        }

        h1 {
            color: #2a5da4;
        }

        .team {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }

        .team-member {
            background:rgb(182, 205, 237);
            padding: 15px;
            border-radius: 8px;
        }

        footer {
            text-align: center;
            padding: 20px;
            background: #333;
            color: white;
            margin-top: 200px;
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
    <h1>About ABC Hospital</h1>
    <p>Welcome to ABC Hospital, a leading healthcare provider committed to delivering world-class medical services.</p>
    
    <h2>Our Mission</h2>
    <p>To provide high-quality, compassionate, and affordable healthcare services to our community.</p>

    <h2>Our Team</h2>
    <div class="team">
        <div class="team-member">
            <h3>Dr. Sanath Bandara</h3>
            <p>Chief Medical Officer</p>
        </div>
        <div class="team-member">
            <h3>Dr. Kumara silva</h3>
            <p>Head of Surgery</p>
        </div>
        <div class="team-member">
            <h3>Dr. Aravinda rathnayake</h3>
            <p>Senior Cardiologist</p>
        </div>
    </div>

    <h2>Why Choose Us?</h2>
    <ul>
        <li>State-of-the-art medical facilities</li>
        <li>Experienced and compassionate doctors</li>
        <li>24/7 emergency services</li>
        <li>Affordable and patient-centric care</li>
    </ul>
</div>

<footer>
    <p>&copy; 2025 ABC Virtual Web App. All rights reserved.</p>
</footer>


</body>
</html>
