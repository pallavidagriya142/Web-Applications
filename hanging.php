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
        padding-top: 20px;
        
    }

</style>

<div class="main_divs">
   <center><div class="about_text" style="font-size: 35px; color: green;"> Hanging Plants </div></center>

  <div class="container" style="padding-top: 16px; padding-bottom: 30px;">
If you want to decorate with most beautiful look, you need hanging plants to beautify your house. Hanging plants are such type of plants, which are used for decorates in house or any resort or garden. These plants are grown in basket or container as hanging position. It can be manage in any free and available spaces. The leaves and branches of these plants are growing up and these are in hanging position. Hanging plants are getting back a room’s design. The maintenance of hanging plants is so difficult and exclusive. You need special take care of these plants.  Hanging plants are like Ferns, Wandering Jew, Ivy, Petunia, Portulaca and Verbena etc.</div>


     <div class="row isotope-grid img_padding">
	<?php
	    $conn = mysqli_connect('localhost', 'root', '', 'project');
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT * FROM plants where category_id=4";
         $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
            	?>
       
		    <div class="col-sm-4 col-md-4 col-lg-4 p-b-35 isotope-item women">
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
                        <div class="col-sm-6"><button class="btn btn-warning">View More</button>
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