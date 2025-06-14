<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<link rel="icon" href="\Final\Data\Images\Logo/Logo.png" type="Image/x-icon" />
<body background="\Final\Data\Images\Appoiment/5.jpg" 
      style="background-repeat: no-repeat; background-size: cover; background-attachment: scroll;">

    <div style="max-width: 300px; margin: 0 auto; padding: 20px; background-color: #f9f9f9; border: 1px solid #ccc; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
        <h2 style="text-align: center; color: #Blue;">Login</h2>
        <form method="post" action="login.php">
          <div class="textBoxdiv">
            <input type="text" placeholder="username" name="username">
</div>
<div class="textBoxdiv">
<input type="password" placeholder="password" name="password">
</div>
<input type="submit" value="Login" name="login_Btn">
        <div style="text-align: center; margin-top: 10px;">
            <p>Don't have an account? <a href="signup.php" style="color: #4CAF50; text-decoration: none;">Sign up</a></p>
        </div>
    </div>
</body>
</html>
<?php
$conn = mysqli_connect("localhost", "root", "");
if(isset($_POST['login_Btn'])){
$username=$_POST['username'];
$password=$_POST['password'];
$sql= "SELECT * FROM websitelogin.logindetails WHERE username = '$username'";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)){
$resultPassword = $row['password'];
if($password == $resultPassword) {
header('Location:http://localhost/Final/data/Logout.php');
}else{
echo "<script>
alert('Login unsuccessful');
</script>";
}
}
}
?>