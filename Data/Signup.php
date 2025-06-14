<?php
session_start();

include("db.php"); // Ensure db.php contains your database connection code

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and sanitize form inputs
    $firstname = htmlspecialchars($_POST['firstname']);
    $lastname = htmlspecialchars($_POST['lastname']);
    $gender = htmlspecialchars($_POST['gender']);
    $phone = htmlspecialchars($_POST['phone']);
    $address = htmlspecialchars($_POST['address']);
    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['pass'];
    $repassword = $_POST['repass'];

    // Validate inputs
    if (empty($firstname) || empty($lastname) || empty($gender) || empty($phone) || empty($address) || empty($email) || empty($password) || empty($repassword)) {
        $errors[] = "Please fill all fields";
    } elseif ($password !== $repassword) {
        $errors[] = "Passwords do not match";
    } else {
        // Check if email already exists
        $query = "SELECT * FROM form WHERE email = ?";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);

        if (mysqli_stmt_num_rows($stmt) > 0) {
            $errors[] = "Email already exists";
        } else {
            // Hash the password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Insert user data into database
            $insert_query = "INSERT INTO form (fname, lname, gender, pnum, address, email, psw) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $insert_stmt = mysqli_prepare($con, $insert_query);
            mysqli_stmt_bind_param($insert_stmt, "sssssss", $firstname, $lastname, $gender, $phone, $address, $email, $hashed_password);

            if (mysqli_stmt_execute($insert_stmt)) {
                $_SESSION['message'] = "Registration successful";
                header("Location: login.php"); // Redirect to login page after successful registration
                exit();
            } else {
                $errors[] = "Registration failed";
            }

            mysqli_stmt_close($insert_stmt);
        }

        mysqli_stmt_close($stmt);
    }
}

mysqli_close($con);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JT Parlour Signup Page</title>
    <!-- Add your favicon link -->
    <link rel="icon" href="/Final/Data/Images/Logo/Logo.png" type="image/x-icon">
</head>
<body background="\Final\Data\Images\Appoiment/7.jpg" 
      style="background-repeat: no-repeat; background-size: cover; background-attachment: scroll;">
      <table>
<tr><td>
<table width="100%" border="0" align="center" cellpadding="40px">
<tr>
<td> 
<h1><font face="MS Reference Sans Serif" size="5" color="#007FFF">  Sighup Page </font></h1>
<form method="post" action="signup.php">
        <label>Firstname:</label>
        <input type="text" name="firstname" required size="15"><br><br>

        <label>Lastname:</label>
        <input type="text" name="lastname" required size="15"><br><br>

        <label>Gender:</label><br><br>
        <input type="radio" id="male" name="gender" value="male" required>
        <label for="male">Male</label><br>
        <input type="radio" id="female" name="gender" value="female" required>
        <label for="female">Female</label><br>
        <input type="radio" id="other" name="gender" value="other" required>
        <label for="other">Other</label><br><br>

        <label>Phone:</label>
        <input type="text" name="phone" required size="10"><br><br>

        <label>Address:</label><br>
        <textarea cols="40" rows="3" name="address" required></textarea><br><br>

        <label>Email:</label>
        <input type="email" name="email" required><br><br>

        <label>Password:</label>
        <input type="password" name="pass" required><br><br>

        <label>Re-type password:</label>
        <input type="password" name="repass" required><br><br>

       <center> <input type="submit" value="Signup"> </center>
    </form>
</td>
</tr>
</table>
</td></tr>
</table>
      <br><br>
    <?php if (!empty($errors)) : ?>
        <ul>
            <?php foreach ($errors as $error) : ?>
                <li><?= $error ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?> 
   
</body>
</html>
