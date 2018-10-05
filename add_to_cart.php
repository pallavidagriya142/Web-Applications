<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'project');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

 $plant_id = $_POST['plant_id'];


$sql = "SELECT * FROM plants where plants_id='$plant_id'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
         $plant_name =  $row["plants_name"];
         $plant_image = $row["plants_image"];
         $price = $row['price'];
    }
}
           $user_id = $_SESSION['user_id'];
    
$sql1 = "INSERT INTO cart(plant_id,user_id,plant_name,plant_image,price) 
             VALUES ('$plant_id', '$user_id', '$plant_name', '$plant_image', '$price')";
             
if (mysqli_query($conn, $sql1)) {

} 


$sql2 = "SELECT * FROM cart where user_id='$user_id'";
$result2 = mysqli_query($conn, $sql2);

if (mysqli_num_rows($result2) > 0) {
	$count = 0;
    while($row = mysqli_fetch_assoc($result2)) {
        $count++;
    }
}
echo $count;
?>