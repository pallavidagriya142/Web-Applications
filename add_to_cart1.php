<?php
$conn = mysqli_connect('localhost', 'root', '', 'project');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

session_start();
$plant_id = $_POST['plant_id'];

$sql = "DELETE FROM cart WHERE plant_id='$plant_id'";
if (mysqli_query($conn, $sql)) 


$id = $_SESSION['user_id'];
$sql2 = "SELECT * FROM cart where user_id=".$id;
$result2 = mysqli_query($conn, $sql2);

if (mysqli_num_rows($result2) > 0) {
	$count = 0;
	$price =array();
    while($row = mysqli_fetch_assoc($result2)) {
        
         $price[] = $row['price'];
         $count++;
    }

  $total = array_sum($price);

print_r("SubTotal =".$total."/-");
}
?>