<?php
// Connect to database
$host = "localhost";
$user = "root";
$password = "";
$db = "appointments_db";

$conn = new mysqli($host, $user, $password, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Sanitize and collect form data
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$phone = $_POST['phone'] ?? '';
$appointment_date = $_POST['appointment_date'] ?? '';
$time_of_day = $_POST['time_of_day'] ?? '';
$confirmation_method = $_POST['confirmation_method'] ?? '';

// Insert into database
$sql = "INSERT INTO appointments (name, email, phone, appointment_date, time_of_day, confirmation_method)
        VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssss", $name, $email, $phone, $appointment_date, $time_of_day, $confirmation_method);

if ($stmt->execute()) {
    // echo "<h2>Appointment Booked Successfully!</h2>";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Appointment Booked</title>
  <link rel="icon" href="/Final/Data/Images/Logo/Logo.png" type="Image/x-icon" />
  <style>
    body {
      font-family: Arial, sans-serif;
      background-image: url('/Final/Data/Images/Appoiment/3.jpg');
      background-repeat: no-repeat;
      background-size: cover;
      background-attachment: scroll;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }
    .container {
      text-align: center;
      background-color: #fff;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    h1 {
      color: #4CAF50;
    }
    .footer {
      margin-top: 20px;
      font-size: 0.9em;
      color: #666;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Appointment Booked Successfully</h1>
    <p>Thank you, <strong><?php echo htmlspecialchars($name); ?></strong>!</p>
    <p>Your appointment is scheduled for <strong><?php echo htmlspecialchars($appointment_date); ?></strong> in the <strong><?php echo htmlspecialchars($time_of_day); ?></strong>.</p>
    <p>Confirmation will be sent via <strong><?php echo htmlspecialchars($confirmation_method); ?></strong>.</p>
    <a href="http://localhost/Final/data/Logout.php"><button>Back to Home</button></a>
    <div class="footer">
      <p>&copy; 2024 JT Parlour. All rights reserved.</p>
    </div>
  </div>
</body>
</html>
