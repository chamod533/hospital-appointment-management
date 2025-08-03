<?php
include 'db.php';

$id = null; // Initialize $id to avoid undefined variable error
$doctor = []; // Initialize $doctor to avoid undefined variable warnings

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the doctor's data
    $query = "SELECT * FROM doctors WHERE doctorid = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $doctor = $result->fetch_assoc();
    } else {
        echo "<script>alert('Doctor not found.');</script>";
        // Redirect or handle error as needed
    }
    $stmt->close();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $id !== null) {
    $name = $_POST['name'];
    $specialty = $_POST['specialty'];
    $contact = $_POST['contact'];
    $work_hours = $_POST['work_hours'];

    // Update the doctor's record
    $updateQuery = "UPDATE doctors SET name=?, specialty=?, contact=?, work_hours=? WHERE doctorid=?";
    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param("ssssi", $name, $specialty, $contact, $work_hours, $id);

    if ($stmt->execute()) {
        echo "<script>alert('Doctor record updated successfully!');</script>";
        header('Location: admin_dashboard.php');
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Doctor</title>
    <style>
        /* Same CSS as provided */

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        h2 {
            text-align: center;
            color: #4a4a8c;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #4a4a8c;
            color: #ffffff;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #333;
        }



    </style>
</head>
<body>
    <div class="form-container">
        <h2>Edit Doctor</h2>
        <form method="POST">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($doctor['name'] ?? ''); ?>" required>

            <label for="specialty">Specialty</label>
            <input type="text" id="specialty" name="specialty" value="<?php echo htmlspecialchars($doctor['specialty'] ?? ''); ?>" required>

            <label for="contact">Contact</label>
            <input type="text" id="contact" name="contact" value="<?php echo htmlspecialchars($doctor['contact'] ?? ''); ?>" required>

            <label for="work_hours">Work Hours</label>
            <input type="text" id="work_hours" name="work_hours" value="<?php echo htmlspecialchars($doctor['work_hours'] ?? ''); ?>" required>

            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>





















