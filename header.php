<!DOCTYPE html>
<html lang="en">
<head>
	<style type="text/css">
		
.cart-button
{
	/*border:solid white;*/
	position: absolute;
	top: -9px;
	right: 0px;
	height: 12px;
	width: 15px;
	font-size: 14px;
	color: white;
}

	</style>
	<title>GoGreen</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icon.jpg"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/linearicons-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
<!-- 	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css"> -->
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/MagnificPopup/magnific-popup.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
   <?php
                                session_start();
                                $conn = mysqli_connect('localhost', 'root', '', 'project');

                                $user_id = $_SESSION['user_id'];

                                $sql = "SELECT firstname, lastname FROM user WHERE user_id='$user_id'";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) == 1) {
                                 $row = mysqli_fetch_assoc($result); 
                                  $firstname = $row['firstname'];
                                  $lastname = $row['lastname'];	
                                }
                            ?> 

        <?php 

                                   $sql1 = "SELECT * FROM cart WHERE user_id='$user_id'";
                                $result1 = mysqli_query($conn, $sql1);
                                $count = 0;
                                if (mysqli_num_rows($result1) >= 1) {
                                	while($row = mysqli_fetch_assoc($result1)){
                                	$count++;
                                }
                            }
                                 ?>

<body class="animsition">
	
	<!-- Header -->
	<header class="header-v3">
		<!-- Header desktop -->
		<div class="container-menu-desktop trans-03">
			<div class="wrap-menu-desktop">
				<nav class="limiter-menu-desktop p-l-45">
					
					<!-- Logo desktop -->		
					<a href="#" class="logo" >
						<a href="index_user.php"><p style="font-size: 64px;color: white">GoGreen</p></a>
					</a>
    
					<!-- Menu desktop -->
					<div class="menu-desktop" style="margin-left:20px;">
						<ul class="main-menu">
							<li>
								<a href="index_user.php">Home</a>
							</li>

							<li>
								<a href="about.php">About</a>
							</li>

							<li>
								<a href="show.php">Product</a>
							</li> 

							<li>
								<a href="contact.php">Contact</a>
							</li>              
						</ul>
					</div>	

					<!-- Icon header -->
					                 <div class="wrap-icon-header flex-w flex-r-m h-full">	
						<div class="flex-c-m h-full p-r-25 ">   
                         
                               <li class="dropdown" style="color: white;">
                   <a class="dropdown-toggle" data-toggle="dropdown"><?php echo $firstname." ".$lastname?>
        </a>
        <ul class="dropdown-menu">
          <li><a href="order.php">My Account</a></li>
          <li><a href="logout.php">LogOut</a></li>
        </ul>
      </li>
						</div>
                                 
                               
                        <div class="flex-c-m h-full p-r-25 bor6">
                        	<div class="wrap-icon-header flex-w flex-r-m h-full m-r-15">
				<div class="flex-c-m h-full p-r-5">
					<div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 js-show-cart">
						<button class="cart-button"><?php echo $count?></button>
						<a href="cart.php"><i style="color: white;" class="zmdi zmdi-shopping-cart"></i></a>
					</div>
				</div>
			</div>
		</div>
		  </nav>
			</div>	
		</div>
	</header>


<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/slick/slick.min.js"></script>
	<script src="js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/isotope/isotope.pkgd.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/sweetalert/sweetalert.min.js"></script>	
<!--===============================================================================================-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
<!--===============================================================================================-->

<script type="text/javascript">
   $(document).ready(function(){
        
           
           $.ajax({
                url : 'manage-cart.php',
                type: 'POST', 
                data : {plant_id:plant_id}, 
                success: function(data) {  

                    $("#subtotal").html(data);                           
                }
            });
        }); 
    });
</script>
