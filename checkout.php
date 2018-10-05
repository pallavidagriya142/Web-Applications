<?php include 'add_to_cart1.php'?>

<?php include 'header.php'?>


<style type="text/css">
	.pay{
		
		width:100%;
	}

	input[type=text], input[type=month], select {
    width: 100%;
    padding: 10px;
    margin: 5px 0 22px 0;
    border: #000000;
    background: #ffffff;
 }
   .container1 {
    border-radius: 5px;
    background-color: 	#D3D3D3;
    padding: 16px;
	margin: 30px auto 10px auto;
	max-width:600px
 } 

</style>
<!-- <div class="main_divs container1">
	<center><h1>CONFIRM ORDER</h1></center></br>



<label>CARD TYPE</label>
<select id="type">
  		<option>VISA</option>
  		<option>MASTERCARD</option>
  		<option>DISCOVER</option>
  		<option>AMERICAN EXPRESS</option>
  		<option>NONE</option>
 </select>

<label>CARD NUMBER</label>
<input type="text" id="card_no" name="card_no" placeholder="Valid card number">
 <span id="cardError" style="color: Red; display: none">*Enter Valid Card-no.</span>

<label>EXPIRY DATE</label>
<div class="row">
  <div class="col-sm-6">
  	<select type="text" name="month" id="month">
  		<option>JANURAY</option>
  		<option>FEBARUARY</option>
  		<option>MARCH</option>
  		<option>APRIL</option>
  		<option>MAY</option>
  		<option>JUNE</option>
  		<option>JULY</option>
  		<option>AUGUST</option>
  		<option>SEPTEMBER</option>
  		<option>OCTOMBER</option>
  		<option>NOVEMBER</option>
  		<option>DECEMBER</option>
  	</select>
  	</div>
  <div class="col-sm-6">
  	<select type="text" name="year" id="year">
  		<option>2018</option>
  		<option>2019</option>
  		<option>2020</option>
  		<option>2021</option>
  		<option>2022</option>
  		<option>2023</option>
  	</select>
  	</div>

</div>

<label>CVV CODE</label>
<input type="text" name="cv" id="cvv" placeholder="CVV">
 <span id="cvvError" style="color: Red; display: none">*Enter Valid Card-no.</span></br>

<input type="hidden" id="amount" value="<?php //print_r($total)?>">

<button type="submit" id="submit" class="btn pay btn-success">Pay</button>
</div>
</div>
</div> -->

<div class="main_divs container1">
	<center><h1>CONFIRM ORDER</h1></center></br>

	<?php 	

$user_id = $_SESSION['user_id'];
$sql1 = "SELECT * FROM cart WHERE user_id='$user_id'"; 
$result1 = mysqli_query($conn, $sql1);

?>
	<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_blank">

		<!-- Identify your business so that you can collect the payments. -->
<input type="hidden" name="business" value="priyanka.prixlrit-facilitator@gmail.com">

<!-- Specify a Buy Now button. -->
<!-- <input type="hidden" name="cmd" value="_xclick"> -->
<input type="hidden" name="cmd" value="_cart">
<input type="hidden" name="upload" value="1">

<?php

if (mysqli_num_rows($result1) > 0) {
	$array = array();
	$count=1;
	 while($row = mysqli_fetch_assoc($result1)) {
	 	 
	
?>

<!-- Specify details about the item that buyers will purchase. -->

<input type="hidden" name="item_name_<?php echo $count; ?>" value="<?php echo $row['plant_name']; ?>">
<input type="hidden" name="item_number_<?php echo $count; ?>" value="<?php echo $row['plant_id']; ?>">
<input type="hidden" name="amount_<?php echo $count; ?>" value="<?php echo $row['price']; ?>">
<input type="hidden" name="quantity_<?php echo $count; ?>>" value="1">

<?php $count++; 
}
	}
?>
<input type="hidden" name="currency_code" value="USD">
<input type="hidden" name="return" value="http://localhost/project/success.php"/>
<input type="hidden" name="cancel_return" value="http://localhost/project/cancel.php"/>
<!-- Display the payment button. -->
<input type="image" name="submit" border="0"
src="paypal_button.png"
alt="PayPal - The safer, easier way to pay online" target="_blank">
<img alt="" border="0" width="1" height="1"
src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >

</form>
</div>




<?php include 'footer.php'?>

<script type="text/javascript">
	// document.getElementById('date').value = Date();

	 $(document).ready(function(){
	 	$("#submit").click(function(){
	 		var cardtype = $("#type").val();
	 		var card_no = $("#card_no").val();
	 		var cv = $("#cvv").val();
			var month = $("#month").val();
			var year = $("#year").val();
			var amount = $("#amount").val();



	 		var isValid = false;
	 		var cardno = /^\d{16}$/;
	 		var cvv = /^\d{3}$/;

	 		if(isValid == cardno.test($("#card_no").val())){    
           	 $("#cardError").css("display", !isValid ? "block" : "none").fadeOut(3000);
               return isValid;
           }
           else if(isValid == cvv.test($("#cvv").val())){
           	$("#cvvError").css("display", !isValid ? "block" : "none").fadeOut(3000);
               return isValid;
           }

             else{
            $.ajax({
                    url : 'pay.php',
                    type: 'POST', 
                    data : {cardtype:cardtype,card_no:card_no,cv:cv,month:month,year:year,amount:amount}, 
                    success: function(data) {
alert(data);
                    
                    		window.location.href = "success.php";
                   
                       
                                     
                  }
                });
        }
	 	});

	 });
</script>