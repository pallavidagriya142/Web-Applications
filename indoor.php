<?php include 'header.php';?> 

<style>
    /*.sidenav {
        height: 87.6%;
        width: 220px;
        position: absolute;
        z-index: 1;
        top: 83px;
        left: 0;
        background-color: green;
        overflow-x: hidden;
        padding-top: 20px;
    }

   .sidenav a {
        padding: 6px 8px 6px 16px;
	    text-decoration: none;
	    font-size: 25px;
	    color: #f1f1f1;
	    display: block;
    }*/


    .img_padding{
    padding-right: 40px;
    padding-left: 40px;
    padding-top: 20px;
}


    .main_divs {
        margin-top: 90px;
        padding-right: 20px;
        padding-left: 20px;
        
    }

 /*   .sidenav a:hover {
	    color: black;
    }*/

    .fix_divs {
        height: 100vh;
        overflow-x: auto;
    }

</style>


  <!--  <div class="sidenav">
   	    <a href="aquatic.php">Aquatic Plants</a>
   	    <a href="flower.php">Flowering Plants</a>
	    <a href="fruits.php">Fruits Plants</a>
   	    <a href="hanging.php">Hanging Plants</a>
	    <a href="herbs.php">Herbal plants</a>
	    <a href="indoor.php">Indoor Plants</a>
        <a href="palm.php">Palm Plants</a>
         <a href="bonsai.php">Bonsai</a>
        <a href="timber.php">Timber Plants</a>

    </div> -->

<div class="main_divs">
    <center><div class="about_text" style="font-size: 35px; color: green;">Indoor Plants</div></center>
    <div class="container" style="padding-top: 16px; padding-bottom: 16px;"><b>It’s time to give new life to your interior.</b></br>
<b>
Indoor plant</b> is a plant that is grown indoors in places such as residences and offices. Indoor plants not only help clean the environment around them, but they are commonly grown for decorative purposes, positive psychological effects, or health reasons such as indoor air purification.


Indoor plants not only provide a nice aesthetic quality in the home, but they can have actual benefits on health. Many plants filter toxins like formaldehyde, xylene and toluene, which can seep into the home from building materials and paint. Beyond cleaning the air, plants can reduce stress and symptoms of depression. We have an exceptional range of quality indoor plants which sets us apart from other nurseries and our well trained & knowledgeable staffs provide you the specialized garden services. Major factors that should be considered when caring for houseplants are moisture, light, soil mixture, temperature, humidity, fertilizers, potting, and pest control. Our staff guidelines for houseplant care. For specific houseplant needs, the tags that sometimes come with plants are notoriously unhelpful and generic. Specific care information may be found widely online and in books.</div>

    <div class="row isotope-grid img_padding">

	<?php
	    $conn = mysqli_connect('localhost', 'root', '', 'project');
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT * FROM plants where category_id=6";
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
                    data : {plant_id:plant_id,}, 
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