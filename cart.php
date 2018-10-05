<?php include 'header.php';?>
<?php
	$conn = mysqli_connect('localhost', 'root', '', 'project');
        $user_id = $_SESSION['user_id'];
        $sql = "SELECT * FROM cart where user_id='$user_id'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
        	$no 	= 1;
		    $total 	= 0;
            while($row = mysqli_fetch_assoc($result)) {
            	?>
<style>
   .main_divs{
   	margin-top: 100px;
   }

   .price{
    	padding-top: 15px;
    }

    .img_padding{
        padding-right: 40px;
        padding-left: 40px;
        padding-top: 20px;
        
}

.btn1{
	 margin-bottom: 3%;
     margin-left: 81%;
    width: 16%;
    margin-top: 27px;
}

.form-control{
    width: 50%;
    border-color: black;
}
</style>
 
<div class="main_divs">
    <div class="row isotope-grid">
		<div class="col-sm-2 col-md-2 col-lg-2 p-b-10 isotope-item women">
			<div class="block2">
			    <div class="block2-pic hov-img1">
				    <img src="<?php echo "images/".$row['plant_image'];?>" alt="IMG-PRODUCT">
				</div>
			</div>
		</div>

		<div class="col-sm-2 col-md-2 col-lg-2 p-b-10 isotope-item women">
			<div class="block2">
			    <div class="about_text">
					<p><u><?php echo $row['plant_name'];?></u></p></br>
				</div>
			</div>
		</div>
					  
        <div class="col-sm-2 col-md-2 col-lg-2 p-b-10 isotope-item women">
            <div class="about_text">
            	<p><u>Price</u></p>
            </div>

            <div class="header-cart-item-info price">
                <p>Small/Single - Rs.<?php echo $row['price'];?>/-</p>
            </div> 
        </div>

        <div class="col-sm-2 col-md-2 col-lg-2 p-b-10 isotope-item women">
            <div class="block2">
                <div class="about_text">
                    <input type="number" name="quantity" value="1" class="form-control">
                </div>
            </div>
        </div>
            
        <div class="col-sm-2 col-md-2 col-lg-2 p-b-10 isotope-item women">
            <div class="btn btn-success">
                <button data-seq="<?php echo $row['plant_id'];?>" class="add_to_cart1">
                Delete</button>
            </div>
        </div> 
    </div> 

		<?php
		      $price  = $row['price'] == 0 ? '' : number_format($row['price']);

		      $total += $row['price'];
			$no++;
             }
         ?>
		<p id="subtotal" align="right" style="font-size: 30px;">SubTotal =<?php echo  number_format($total)?>.00/-</p>


</div>
    <div>
<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_blank">

		<!-- Identify your business so that you can collect the payments. -->
<input type="hidden" name="business" value="sisodiyayogesh55-facilitator@gmail.com">

<!-- Specify a Buy Now button. -->
<!-- <input type="hidden" name="cmd" value="_xclick"> -->
<input type="hidden" name="cmd" value="_cart">
<input type="hidden" name="upload" value="1">

    <?php
$user_id = $_SESSION['user_id'];
$sql1 = "SELECT * FROM cart WHERE user_id='$user_id'"; 
$result1 = mysqli_query($conn, $sql1);

if (mysqli_num_rows($result1) > 0) {
	$count=1;
	 while($row = mysqli_fetch_assoc($result1)) {
	 	 
	
?>	

<input type="hidden" name="item_name_<?php echo $count; ?>" value="<?php echo $row['plant_name']; ?>">
<input type="hidden" name="item_number_<?php echo $count; ?>" value="<?php echo $row['plant_id']; ?>">
<input type="hidden" name="amount_<?php echo $count; ?>" value="<?php echo $row['price']; ?>">
<input type="hidden" name="quantity_<?php echo $count; ?>" value="1">

<?php $count++; 
}
	}
?>

<input type="hidden" name="currency_code" value="USD">
<input type="hidden" name="return" value="http://localhost/project/success.php"/>
<input type="hidden" name="cancel_return" value="http://localhost/project/cancel.php"/>
	<button type="submit" name="submit" class="btn btn1 p-b-10  btn-success" id="checkout">CheckOut</button>
</form>

	</div>

       <?php
        }
         else{
        ?>
        <div style="padding-top: 100px;padding-bottom: 13%;">
        <h1>YOUR CART IS EMPTY</h1>
    </div>
    
        <?php
             }
        ?>

<?php include 'footer.php';?>

<script type="text/javascript">
   $(document).ready(function(){
        $(".add_to_cart1").click(function(){
        	var vp = $(this);
            var plant_id = $(this).data('seq');
           
           $.ajax({
                    url : 'add_to_cart1.php',
                    type: 'POST', 
                    data : {plant_id:plant_id}, 
                    success: function(data) {  

                        $("#subtotal").html(data);    
                                               
                  }
                });
           jQuery(vp).closest('.row').css('display','none');
        }); 
    });
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$("#checkout").click(function(){

			window.location.href = "checkout.php";
		});

	});
</script>
