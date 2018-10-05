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
        padding-top: 3%;
        
}
</style>
 
<div class="main_divs">


<center><div class="about_text" style="font-size: 35px; color: green;">Aquatic Plants</div></center>
<div class="container" style="padding-top: 16px;"><b>Aquatic plants</b> (water plants) are an essential element in any garden pond. Aquatic plants are plants that have adapted to living in aquatic environments (saltwater or freshwater).Thousands of plant species live in freshwater habitats around the world: along edges, on the surface, or at the bottom of shallow lakes and ponds; in temporarily flooded low areas and meadows; at seeps and springs in hill regions; in flowing water of streams and rivers; rooted in waterlogged soils; and along any other natural or human-produced drainage system. "Freshwater wetlands" occur from below sea level to some very lofty alpine habitats, where water may persist throughout the year or where it can be very ephemeral. Normally we classify a freshwater wetland as a place where at least half of the species found there are truly aquatic plant species.</br></br>

    <b>Available only for local customers or clients....</b>
</div>

    <div class="row isotope-grid img_padding">
	<?php
	    $conn = mysqli_connect('localhost', 'root', '', 'project');
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT * FROM plants where category_id=1";
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
           $(this).attr("disabled", "disabled");
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