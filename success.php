<?php include 'header.php';?>
<style type="text/css">
    
    .msg{
        padding-bottom: 10%;
    }
</style>
<?php 

session_start();
    $conn = mysqli_connect('localhost', 'root', '', 'project');
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
        $user_id = $_SESSION['user_id'];
        $sql = "SELECT * FROM cart where user_id='$user_id'";
        $result = mysqli_query($conn, $sql);
$plant_id = array();
$plant_name = array();
$total=0;
        if (mysqli_num_rows($result) > 0) {
 
            while($row = mysqli_fetch_assoc($result)) {
                
            $plant_id[]= $row['plant_id'];

            $plant_name[]= $row['plant_name'];

            $total += $row['price'];


                }

            $plant_id = implode(',', $plant_id);
            $plant_name = implode(',', $plant_name);
        }

$sql1 = "INSERT INTO orders(user_id,plants_id,plant_name,amount) 
             VALUES ('$user_id', '$plant_id', '$plant_name','$total')";
             
if (mysqli_query($conn, $sql1)) {
   
} 
        
  ?>  
<div class="msg">
 <h1>Your payment has been successful.</h1> 
 <h3>Thanks For Shipping.</h3>
</div>
 <?php
          $sql_delete = "DELETE FROM cart WHERE user_id='$user_id'";
         if (mysqli_query($conn, $sql_delete)) {

           } else {
             echo "Error deleting record: " . mysqli_error($conn);
            }

 ?>
<?php include 'footer.php';?>
