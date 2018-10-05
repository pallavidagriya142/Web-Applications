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
$city = $_POST['city'];
$garden = $_POST['garden'];
$address = $_POST['address'];
$contect = $_POST['contect'];

$sql = "INSERT INTO location(city, garden, address, contect_no, location_image) 
             VALUES ('$city','$garden', '$address', '$contect', '$file_name')";
             
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
echo "success";
?>