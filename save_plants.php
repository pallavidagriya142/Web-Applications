<?php
$conn = mysqli_connect('localhost', 'root', '', 'project');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if($_FILES['upfile']['name']!=""){
   $file_name =$_FILES['upfile']['name'];
	$file_tmp =$_FILES['upfile']['tmp_name'];
	}         			
move_uploaded_file($file_tmp,"images/".$file_name);
$category = $_POST['categories'];
$plants = $_POST['plant_name'];
$description = $_POST['description'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];

$sql = "INSERT INTO plants(category_id,plants_name,plants_image,description,price,quantity) 
             VALUES ('$category','$plants', '$file_name', '$description', '$price', '$quantity')";
             
if (mysqli_query($conn, $sql)) {
    // echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

?>