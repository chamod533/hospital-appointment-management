<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical Specialists - ABC Hospital</title>
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
            align-items: center;
            gap: 10px;
        }

        .nav-links a, .dropbtn {
            text-decoration: none;
            color: white;
            font-weight: bold;
            padding: 12px 20px;
            border-radius: 25px;
            transition: all 0.3s ease;
            background-color: #4cae4c;
            font-size: 16px;
            border: none;
            cursor: pointer;
        }

        .nav-links a:hover, .dropbtn:hover {
            background: #3d8f3d;
        }

        .dropdown {
            position: relative;
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

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }

        .container {
            max-width: 900px;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.84);
            border-radius: 8px;
            text-align: center;
        }

        .specialists {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }

        .specialist {
            background: #eef;
            padding: 15px;
            border-radius: 8px;
            width: 250px;
        }

        .doctor-img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            display: block;
            margin: 0 auto 10px;
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
    <h1>Our Medical Specialists</h1>
    <p>Meet our team of expert doctors and specialists providing world-class medical care.</p>

    <div class="specialists">
        <div class="specialist">
            <img src="images/portrait-mature-therapist-sitting-table-looking-camera_1098-18156.avif" alt="Dr. John Smith" class="doctor-img">
            
            
            <h3>Dr. Aravinda rathnayake</h3>
            <p>Cardiologist</p>
            <hr>
            <p>Specializing in heart health, Dr. Aravinda rathnayake diagnoses and treats conditions such as hypertension, heart disease, and arrhythmias. He focuses on preventive care and lifestyle management to improve cardiovascular health.

            </p>
        </div>
        <div class="specialist">
            <img src="images/handsome-indian-male-doctor-holding-empty-white-or-blank-dropper-bottle-photo.jpg" alt="Dr. Emily Johnson" class="doctor-img">
            <h3>Dr. Senaka Rajapakse</h3>
            <p>Neurologist</p>
            <hr>
            <p>A specialist in nervous system disorders, Dr. Senaka Rajapakse treats conditions such as migraines, epilepsy, and neurodegenerative diseases like Parkinson’s and Alzheimer’s. She uses advanced diagnostic techniques to ensure accurate treatment.

            </p>
        </div>
        <div class="specialist">
            <img src="images/360_F_185395570_wUzaCFaFP6Nm7NxWvk5xCMLAdh12nSCZ.jpg" alt="Dr. David Brown" class="doctor-img">
            <h3>Dr. Thilak Rajapaksha</h3>
            <p>Orthopedic Surgeon</p>
            <hr>
            <p>Dr. Thilak Rajapaksha specializes in musculoskeletal issues, including fractures, joint replacements, and sports injuries. He provides both surgical and non-surgical treatments to improve mobility and reduce pain.
                
            </p>
        </div>
        <div class="specialist">
            <img src="images/images.jpg" alt="Dr. Sarah Miller" class="doctor-img">
            <h3>Dr. Udaya Ranawaka</h3>
            <p>Dermatologist</p>
        
            <hr>
            <p>With expertise in skin health, Udaya Ranawaka treats conditions like acne, eczema, psoriasis, and skin cancer. She also provides cosmetic dermatology services, including anti-aging treatments and skin rejuvenation.

            </p>
        </div>
        <div class="specialist">
            <img src="images/01.jpg" alt="Dr. Robert Wilson" class="doctor-img">
            <h3>Dr. Kumaran Ratnam</h3>
            <p>Pediatrician</p>
            <hr>
            <p>Dedicated to children's health, Dr. Kumaran Ratnam provides care for infants, children, and adolescents. He focuses on preventive care, vaccinations, and developmental health to ensure children's well-being.
                
            </p>
        </div>
        <div class="specialist">
            <img src="images/Dr._Priyangika_Jayasinghe-removebg-preview.png" alt="Dr. Olivia Davis" class="doctor-img">
            <h3>Dr. Anil Jasinghe</h3>
            <p>Ophthalmologist</p>
            <hr>
            <p>Specializing in eye health, Dr. Anil Jasinghe diagnoses and treats conditions like cataracts, glaucoma, and vision impairments. She provides surgical and non-surgical treatments to help patients maintain optimal vision.
                
            </p>

        </div>
    </div>
</div>

<footer>
    <p>&copy; 2025 ABC Virtual Web App. All rights reserved.</p>
</footer>

</body>
</html>
