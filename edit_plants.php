<?php include 'index-header.php';?>
<?php
$conn = mysqli_connect('localhost', 'root', '', 'project');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

$id = $_GET['id'];

$sql = "SELECT * FROM plants where plants_id = '$id'";
$result = mysqli_query($conn, $sql);

if (!$result) {
	die ('SQL Error: ' . mysqli_error($conn));
}
  
           while($row = mysqli_fetch_assoc($result)) {
		     $price= $row["price"];
			 $quantity=$row["quantity"];
		   }  

if(isset($_POST['update'])){

 $price= $_POST["price"];
$quantity=$_POST["quantity"];

$sql = "UPDATE plants SET price='$price', quantity='$quantity' WHERE plants_id='$id'";

if (mysqli_query($conn, $sql)) {
    header('location:update_plants.php');
}
}
?>

<style type="text/css">
	 .main_divs{
              margin-top: 8%;
    padding-bottom: 16px;
   }

    .container1{
    margin-left: 400px;
    width: 60%;
}


	input[type=text],input[type=file],input[type=number], select{
    width: 70%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical;
    background-color: lightgray;
}

input[type=text]:focus, input[type=file]:focus, select:focus {
    background-color: #ddd;
    outline: none;
}

input[type=text]:hover, input[type=file]:hover, select:hover {
    background-color: #ddd;
}

.btn{
  width: 70%;
}
</style>

<div class="main_divs">
	<div class="container1">
	<body>
		<form method="post" action="#">
		    <label>Enter New Price</label>
		    <input type="number" class="form-control" name="price" value="<?php echo $price;?>">
       
            <label>Enter New Quantity</label>
		    <input type="number" class="form-control" name="quantity" value="<?php echo $quantity;?>">
		    <button type="submit" class="btn btn-success" name="update">Update</button>
	    </form>
	</body></div>
</div>

<?php include 'index.php';?>