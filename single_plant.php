<?php include 'header.php'?>

<style>
    .main_divs {
        margin-top: 90px;
        padding-left: 20%;  
        padding-bottom: 10%;
    }

    .img_padding{
	padding-right: 50px;
    padding-left: 50px;
}

 

</style>
<div class="main_divs">
	  <div class="row isotope-grid">
	<?php
        $conn = mysqli_connect('localhost', 'root', '', 'project');
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $plant_id = $_GET['plant_id'];

        $sql = "SELECT * FROM plants where plants_id = '$plant_id'";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)) {	
    ?> 
      
		    <div class="col-sm-6 col-md-4 col-lg-4 p-b-10">
			    <div class="block2">
			        <div class="block2-pic hov-img1">
					    <img src="<?php echo "images/".$row['plants_image'];?>" alt="IMG-PRODUCT">
					</div>
				</div>
			</div>

			<div class="col-sm-6 col-md-6 col-lg-6">
			    <div class="block2">
			        <div class="about_text">
					    <p><u><?php echo $row['plants_name'];?></u></p></br>
					</div>  
				</div>

				<div>
					<P><?php echo $row['description'];?></P></br>
				</div>

				<div class="header-cart-item-info">
					<p>Small/Single - Rs.<?php echo $row['price'];?>/-</p></br>

					<p>Stock - More than <?php echo $row['quantity'];?> Pcs Each</p></br>
				</div>

				<div class="btn btn-success">
                    <button data-seq="<?php echo $row['plants_id'];?>" class="add_to_cart" >Add TO Cart</button>
                </div>
			</div> 
	 
    <?php
        }
    ?>
       </div>
</div>

     <div class="row isotope-grid img_padding">
     <?php
        $conn = mysqli_connect('localhost', 'root', '', 'project');
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT * FROM plants LIMIT 6";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)) {	
    ?> 

    <div class="col-sm-6 col-md-4 col-lg-4 p-b-10">
			    <div class="block2">
			        <div class="block2-pic hov-img1">
					    <img src="<?php echo "images/".$row['plants_image'];?>" alt="IMG-PRODUCT">
					</div>
					 <div class="about_text">
					    <p><u><?php echo $row['plants_name'];?></u></p></br>
					</div>
					<div>
					<P><?php echo $row['description'];?></P></br>
				</div>
				</div>
			</div>

<?php 
}
?>


</div>


    
<?php include 'footer.php'?>

<script type="text/javascript">
   $(document).ready(function(){
        $(".add_to_cart").click(function(){
            var plant_id = $(this).data('seq');

           $.ajax({
                    url : 'add_to_cart.php',
                    type: 'POST', 
                    data : {plant_id:plant_id}, 
                    success: function(data) {
                                       
                  }
                });
        }); 
    });
</script>