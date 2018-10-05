<?php include 'header.php';?> 

<style>
    .main_divs {
        margin-top: 90px;
        padding-right: 20px;
        padding-left: 20px;
        
    }


    .img_padding{
        padding-right: 40px;
        padding-left: 40px;
        padding-top: 10%;
        
}

</style>

<div class="main_divs">
    <center><div class="about_text" style="font-size: 35px; color: green;">Fruit Plants </div></center>
<div class="container" style="padding-top: 16px;"><b> Fruit plants </b> are such plants, which are very common and variable. These types of plants bring fruits, which are utilized by human being and animal. From seeds these types of plants are growing. Some fruit plants are very infrequent to reach and some plants are normal. Fruit plants are finding to tropical areas from deserted areas. Two types of fruit plants are indoor fruit plants and outdoor fruit plants. Fruit plants are like as Mango Plants, Guava Plants, Chikoo Plants, Banana Plants, Jackfruit Plants, Lemon Plants, Pomegranate Plants, Coconut Plants, Grapes Plants, Fig Plants, Plum Plants, Date Plants, Cucumber Plants, Watermelon Plants, Apple Plants, Papaya Plants, Litchi plants and Rose Apple Plants etc. Fruit are used as food. Fruits plants have many verity and many places have many variable fruits. Any and every human being utilize these fruits as their own interest.</br></br>
  <b>Fruit Plants are available at before Summer Season (from March 2014)...</b>
</div>
     <div class="row isotope-grid img_padding">
	<?php
	    $conn = mysqli_connect('localhost', 'root', '', 'project');
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT * FROM plants where category_id=3";
         $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
            	?>
       
		    <div class="col-sm-6 col-md-4 col-lg-4 p-b-35 isotope-item women">
			<!-- Block2 -->
			    <div class="block2">
			        <div class="block2-pic hov-img0">
					    <img src="<?php echo "images/".$row['plants_image'];?>" alt="IMG-PRODUCT">
					</div>
				</div>
			
			    <div class="block2">
			        <div class="about_text">
					    <p><u><?php echo $row['plants_name'];?></u></p></br>
					</div>

					<div>    
					    <p><?php echo $row['description'];?></p></br>
					</div>  

                    <div class="header-cart-item-info">
                        <p>Small/Single - Rs.<?php echo $row['price'];?>/-</p>
                    </div> 

                    <div class="header-cart-item-info">
                        <p>Stock - More than <?php echo $row['quantity'];?>Pcs Each</p></br>
                    </div>

                   <div class="row">
                        <div class="col-sm-6">
                            <div class="view_more" data-seq="<?php echo $row['plants_id'];?>">
                                <button class="btn btn-warning">View More</button>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="btn btn-success">
                                <button data-seq="<?php echo $row['plants_id'];?>" class="add_to_cart" >Add TO Cart</button>
                            </div>
                        </div>
                    </div>  
                </div>
			</div>
		<?php
             }
         }
		?>
    </div>
</div>
<?php include 'footer.php';?>

<script type="text/javascript">
   $(document).ready(function(){
        $(".add_to_cart").click(function(){
            var plant_id = $(this).data('seq');



           $.ajax({
                    url : 'add_to_cart.php',
                    type: 'POST', 
                    data : {plant_id:plant_id}, 
                    success: function(data) {
                        alert("Successfully inserted into cart");

                        $('.cart-button').text(data);
                                     
                  }
                });
        }); 
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $(".view_more").click(function(){
            var plant_id = $(this).data('seq');
              window.location.href = "single_plant.php?plant_id="+plant_id;
        }); 
    });
</script>