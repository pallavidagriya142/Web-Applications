<!DOCTYPE html>
<html lang="en">
<head>
	<title>GoGreen</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icon.jpg"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
<style type="text/css">
.input-container {
    display: -ms-flexbox; /* IE10 */
    display: flex;
    width: 100%;
}


body, html {
    height: 100%;
    font-family: Arial, Helvetica, sans-serif;
}

* {
    box-sizing: border-box;
}

.bg-img {
    /* The image used */
    background-image: url("images/background-learner.jpg");

    min-height: 700px;

    /* Center and scale the image nicely */
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}

/* Add styles to the form container */
.container {
    position: absolute;
    right: 0;
    margin: 40px;
    max-width: 400px;
    padding: 16px;
    background-color: white;
    margin-top: 50px;
    min-height: 500px;
}

/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 10px;
  
    border: none;
    background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
    background-color: #ddd;
    outline: none;
}

/* Set a style for the submit button */
.btn {
    background-color: #4CAF50;
    color: white;
    padding: 16px 20px;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
   
}

.btn:hover {
    opacity: 1;
}

/*	.container{
		max-width: 700px;
	}
	body
	{
		background:linear-gradient(lightgreen,white);
	}
	h1{
		padding-top: 20px;
		padding-bottom: 20px;
		color: black;
		text-shadow: 0px 2px 4px gray;
	}

	.pas{

		width: 40%;
		border-bottom-color: grey;
		margin-bottom: 10px;
		margin-top: 10px;
		background-color: transparent;
	}
    input
    {
    	border-top-color: transparent;
    	border-left-color: transparent;
    	border-right-color: transparent;: 
    }
     label
     {
     	font-weight: bold;
     	padding-right: 10px;
     }
     .btn
     {
     	position: relative;
     	left: 290px;
     }*/
</style>

</head>
<body class="animsition bg-img">
	<div class="container">

        <center><h1>Sign-Up</h1></center>

            	<!-- <label for="firstname">FirstName</label> -->
                <input type="text" id="firstname" class="pas" placeholder="Firstname" autocomplete="off"></br>
                <span id="fnameError" style="color: Red; display: none">*Enter Valid Name.</span></br>
         
                <!-- <label for="lastname">LastName</label> -->
                <input type="text" id="lastname" class="pas" placeholder="Lastname" autocomplete="off"></br>
                <span id="lnameError" style="color: Red; display: none">*Enter Valid Last-Name.</span></br>
           
           
                    <!-- <label for="email">Email-ID</label> -->
                    <input type="text" id="email" class=" pas" placeholder="Email-ID"></br>
                    <span id="emailError" style="color: Red; display: none">*Enter Valid Email.</span></br>
                
                    <!-- <label for="pwd1">Password</label> -->
                    <input type="password" id="password1" class=" pas" placeholder="Password"></br>
                    <span id="passError" style="color: Red; display: none">*Enter Strong Password.</span></br>
               

               <!-- <label for="pwd2">confirm Password</label> -->
               <input type="password" id="password2" class="pas" placeholder="Confirm Password..."></br>
               <span id="sameError" style="color: Red;"></span></br>

             <button class="btn btn-success" id="registration">Submit</button>
        </div>
      

 <!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>

<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/slick/slick.min.js"></script>
	<script src="js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script src="vendor/parallax100/parallax100.js"></script>
	<script>
        $('.parallax100').parallax100();
	</script>
<!--===============================================================================================-->
	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
	<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
		        delegate: 'a', // the selector for gallery item
		        type: 'image',
		        gallery: {
		        	enabled:true
		        },
		        mainClass: 'mfp-fade'
		    });
		});
	</script>
<!--===============================================================================================-->
	<script src="vendor/isotope/isotope.pkgd.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/sweetalert/sweetalert.min.js"></script>
	<script>
		$('.js-addwish-b2').on('click', function(e){
			e.preventDefault();
		});

		$('.js-addwish-b2').each(function(){
			var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-b2');
				$(this).off('click');
			});
		});

		$('.js-addwish-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-detail');
				$(this).off('click');
			});
		});

		/*---------------------------------------------*/

		$('.js-addcart-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});
	</script>
<!--===============================================================================================-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

 <!--===============================================================================================-->	
  <script>
	$(document).ready(function(){

		// for placeholder

           $('#firstname').focusin(function()
           {
           	 $(this).attr('placeholder','');
           	 $(this).css('outline','none');
           });
            $('#firstname').focusout(function()
            {
            	$(this).attr('placeholder','Firstname');
            })
             $('#lastname').focusin(function()
           {
           	 $(this).attr('placeholder','');
           	 $(this).css('outline','none');
           });
            $('#lastname').focusout(function()
            {
            	$(this).attr('placeholder','Lastname')
            })
             $('#email').focusin(function()
           {
           	 $(this).attr('placeholder','');
           	 $(this).css('outline','none');
           });
            $('#email').focusout(function()
            {
            	$(this).attr('placeholder','Email-ID')
            })
             $('#password1').focusin(function()
           {
           	 $(this).attr('placeholder','');
           	 $(this).css('outline','none');
           });
            $('#password1').focusout(function()
            {
            	$(this).attr('placeholder','Password')
            })
             $('#password2').focusin(function()
           {
           	 $(this).attr('placeholder','');
           	 $(this).css('outline','none');
           });
            $('#password2').focusout(function()
            {
            	$(this).attr('placeholder','Confirm Password')
            })

		// end
 		$("#registration").click(function(){
 			
 			

            var firstname = $("#firstname").val();
            var lastname = $("#lastname").val();
            var email= $("#email").val();
            var password1= $("#password1").val();
            var password2= $("#password2").val();

             var isValid = false;
 			var regex = /^\d{10}$/;
            var char = /^[a-zA-Z]+$/;
            var add = /^[0-9a-zA-Z]+$/;
            var mail = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
     

           if(isValid == char.test(firstname)){    
           	 $("#fnameError").css("display", !isValid ? "block" : "none").fadeOut(3000);
               return isValid;
           }
           

 			else  if(isValid == char.test(lastname)){    
           	 $("#lnameError").css("display", !isValid ? "block" : "none").fadeOut(3000);
               return isValid;
           }

 			else  if(isValid == mail.test(email)){    
           	 $("#emailError").css("display", !isValid ? "block" : "none").fadeOut(3000);
               return isValid;
           }

 			else  if(isValid == add.test(password1)){    
           	 $("#passError").css("display", !isValid ? "block" : "none").fadeOut(3000);
               return isValid;
           }
 			
 			else if(password1 != password2){
 			   document.getElementById("sameError").innerHTML = "*Enter Same Password.";
 			}

 			else{

           
 				 $.ajax({
					url : 'php/registration.php',
                    type: 'POST', 
                    data : {firstname:firstname,lastname:lastname,email:email,password1:password1,password2:password2}, 
                    success: function(data) {
                             //alert(data);	
                             window,location.href = "login-user.php";
				  }
				});
 			}
 		});
 	});
 </script>
      
</body>
</html>
	