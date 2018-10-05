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
    <center><div class="about_text" style="font-size: 35px; color: green;"> Herbal Plants </div></center>

 <div class="container" style="padding-top: 16px; padding-bottom: 30px;">   
Herbal plants are such types of plants, which are used in make medicine. These plants are useful and important plants in society of plants. Any parts of herbal plants can be used in medicine and its have many properties of medicinal. There have variety of herbal plant in environment and variable uses of herbal plant. Herbal plants grown in any of places or regions. Herbal plants are use for every creature being of our environment circle through few many years. In old days, this plant was used directly by the being and now it is use indirectly through the medicine. Every parts of herbal plants like root, branch, leaf, stems, seed, fruit and flower etc are used for medicine. Herbal plants are like Gooseberry or Emblic Myrobalan (amla), Ashoka Tree (ashoka), Winter cherry (Ashwagandha), Bengal quince or Stone apple (Bael), Country gooseberry (Bhumi Amla), Thyme leaved gratiola (Brahmi), Chiretta Plant (Chirata), Sugar destroyer (gurmar/Mera-singi) etc.
</div>
     <div class="row isotope-grid img_padding">
	<?php
	    $conn = mysqli_connect('localhost', 'root', '', 'project');
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT * FROM plants where category_id=5";
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