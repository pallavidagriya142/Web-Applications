<?php
$conn = mysqli_connect('localhost', 'root', '', 'project');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$id = $_GET['id'];

$sql = "DELETE FROM plants where plants_id = '$id'";
$result = mysqli_query($conn, $sql);

if (!$result) {
	die ('SQL Error: ' . mysqli_error($conn));
}
else {
	header('location:update_plants.php');
}
?>