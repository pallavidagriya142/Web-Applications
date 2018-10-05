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
<center><div class="about_text" style="font-size: 35px; color: green;">Flowering Plants</div></center>
<div class="container" style="padding-top: 16px;"><b>Flowering plants</b> are such type of plants, which have many verities plants of flowers. Flower plants are known as garden plants. These plants are growing by seeds, so these plants are called seed growing plants. Some flower plants are very rare to find and some are very casual. These plants produce fruits and then these fruits become make seeds. And again from these seeds, flower plants are growing. It is a cycle of flower plants. Flower plants are like Gerbera Plants, Roses Plants, Plumeria Plants (Red, Yellow, Black and White), Grafted Hybrid Adenium, Canna indica, Portlandia Grandiflora, Orchids, Brownea Grandiceps, Phalaenopsis Orchids, Bugambilia, Bel (Jasmine), Tagar (Crape Jasmin), Gulmohar (Royal Poinciana), Jaba (china rose or shoe flower), Jui (Jasmine Molle),   Kadam (Kadamba), Kunda (Star jasmine or kunda) etc.
</div>

    <div class="row isotope-grid img_padding">
	<?php
	    $conn = mysqli_connect('localhost', 'root', '', 'project');
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT * FROM plants where category_id=2";
         $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
            	?>
        
		    <div class="col-sm-4 col-md-4 col-lg-4 p-b-35 isotope-item women">
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