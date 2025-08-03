<!-- login.php -->
<?php
session_start();
include 'db.php'; // Ensure this file connects to your database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query to check if the user exists
    $query = "SELECT * FROM users WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user) {
        $_SESSION['user_role'] = $user['role']; // Store user role in session
        $_SESSION['username'] = $user['username'];

        // Redirect both doctors and receptionists to view_appointment.php
        header("Location: view_appointments.php");
        exit();
    } else {
        $error = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<style>
 body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to bottom right, rgb(56, 157, 133), rgb(73, 189, 195));
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            background: white;
            padding: 50px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(9, 9, 9, 0.79);
            text-align: center;
            
        }

        h2 {
            margin-bottom: 20px;
        }

        input[type="text"], input[type="password"] {
            width: 350px;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }


        .btn {
            padding: 10px 20px;
            background-color: #5cb85c;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn {
            padding: 10px 20px;
            background-color: #5cb85c;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #4cae4c;
        }
        .error {
            color: red;
            margin-top: 10px;
        }
 
</style>




<body>
    <div class="login-container">
    <h2>Login (Docter / Receptionist)</h2>

    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="POST">
        <label>Username - </label>
        <input type="text" name="username" required>
        <br>
        <label>Password -</label>
        <input type="password" name="password" required>
        <br>
        <button type="submit" class="btn">Login</button>
    </form>
    </div>
</body>
</html>
