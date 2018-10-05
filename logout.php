<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "project");

session_destroy();
header('location: login-user.php');
?>