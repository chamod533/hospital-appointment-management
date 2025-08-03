<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/bootstrap.bundle.js" defer></script>
    <title>Welcome to ABC Virtual Web App</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }

        /* Header & Navigation Bar */
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

        /* Image Container */
        .container {
            max-width: 100%;
            margin: 0 auto;
            padding: 6px;
            text-align: center;
            background: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .container img {
            width: 100%;
            height: 550px;
            object-fit: cover;
        }


        .services-section {
        text-align: center;
        padding: 40px 20px;
        background: #f4f4f9;
        }

        .head h2{
        font-size: 30px;

        }

        .services-container {
        display: flex;
        justify-content: center;
        gap: 20px;
        max-width: 1100px;
        margin: auto;
        }

        .service-card {
        background: #5ca8dc;
        border-radius: 10px;
        padding: 20px;
        text-align: center;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        width: 30%;
        }

        .service-card img {
        width: 100%;
        height: 180px;
        border-radius: 10px;
        }

        .service-card h3 {
        margin-top: 10px;
        font-size: 20px;
        color: #0a3d62;
        }

       .service-card p {
       font-size: 14px;
       color: #333;
       }

    .service-card a {
    display: inline-block;
    margin-top: 10px;
    text-decoration: none;
    background: #002e5b;
    color: white;
    padding: 10px 15px;
    border-radius: 5px;
    font-weight: bold;
}

.service-card a:hover {
    background: #0056b3;
}

        /* Footer */
 footer {
    text-align: center;
    padding: 20px;
    background: #333;
    color: white;
    margin-top: 230px;
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

        <!-- Contact Us moved to the right -->
        
           
    </nav>
</header>

<!-- Image -->
<!-- Welcome Image Section (No Changes) -->
<div class="container">
    <img src="images/Blue White Modern Online Business Webinar Banner 111111111111.png" alt="Hospital">
</div>

<!-- Service Cards Section (Added Below Image) -->
<section class="services-section">
<div class="head">
    <h2>Our Health Services</h2>
    <div>
    <div class="services-container">
        <div class="service-card">
            <img src="images/home-image.jpg" alt="Doctor Services">
            <h3>Services</h3>
            <p>Comprehensive care for all your health needs by experienced doctors.</p>
            <a href="about_us.php">Click Here</a>
        </div>

        <div class="service-card">
            <img src="images/booking-appointments-online.jpg" alt="Book Appointments">
            <h3>Book Appointments</h3>
            <p>Specialized care for infants, children, and adolescents.</p>
            <a href="appointment_form.php">Click Here</a>
        </div>

        <div class="service-card">
            <img src="images/Patricia-Szasz-1-6.avif" alt="Specialist">
            <h3>Specialist</h3>
            <p>State-of-the-art diagnostic tools for accurate medical results.</p>
            <a href="medical_specialists.php">Click Here</a>
        </div>
    </div>
</section>

<footer>
    <p>&copy; 2025 ABC Virtual Web App. All rights reserved.</p>
</footer>

</body>
</html>
