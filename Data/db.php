<?php
$d_host = 'localhost';
$d_user = "root";
$d_pass = "";
$d_name = "register";

$con = mysqli_connect($d_host, $d_user, $d_pass, $d_name);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
