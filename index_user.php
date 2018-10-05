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
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
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

                             <li class="dropdown" style="color: white;">
        <a class="dropdown-toggle" data-toggle="dropdown"><?php echo $firstname." ".$lastname?>
        </a>
        <ul class="dropdown-menu">
          <li><a href="order.php">My Account</a></li>
          <li><a href="logout.php">LogOut</a></li>
        </ul>
      </li>
                            
						</div>
                                 
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
		
                           	<!-- <a href="logout.php" class="btn btn-success">LogOut</a> -->
						</div>
					</div>
				</nav>
			</div>	
		</div>
	</header> 




	<section class="section-slide">
		<div class="wrap-slick1 rs2-slick1">
			<div class="slick1">
				<div class="item-slick1" style="background-image: url(images/background9.jpg);">
					
                    <div class="flex-col-c-m h-full p-t-100 p-b-60 respon5">
							<span class="ltext-104 txt-center cl0 respon2">
								Decorate Your Garden</br> With GoGreen	
	 				        </span>							
					</div>
				</div>

				<div class="item-slick1" style="background-image: url(images/background1.jpg);" data-caption>
				</div>

				<div class="item-slick1" style="background-image: url(images/background2.jpg);" data-caption>
				</div>

				<div class="item-slick1" style="background-image: url(images/background3.jpg);" data-caption>
				</div>
			</div>
        </div>

		<div class="wrap-slick1-dots p-lr-10"></div>
	</section>

    
    <!-- About Us-->
    <div class="p-b-10 container bgimage">
		<h1 class="cl5 p-t-50" style="color: green;">Your gardening specialist.</h1>

            <div class="row">
				<div class="col-sm-8 about_text">
				   GOGreen shop is more than a nursery. Step into a sanctuary filled with gardening inspiration, garden ideas, indigenous and flowering plants. Transform your indoor living space into a green oasis filled with luscious indoor plants, paired with stylish indoor pots and beautiful containers.GoGreen Shop strives to offer you the very best instore and online gardening experience, with our quality product offering and personal service, we’ll meet your gardening needs and offer you real solutions to enhance your indoor and outdoor living spaces. In just one visit, you can totally transform your home and garden with GoGreen shop.
				</div>

				<div class="col-sm-4"><img src="images/garden_icons.png"></div>	
			</div>
	    </div>
	</div>
	

	



	<!-- Banner -->
	<div class="sec-banner bg0 p-t-50 p-b-15">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					
					<center>
						<div class="p-b-15"><h3 style="color: green;">Indoor Plants</h3>
					</div>
					<div class="">
						<img src="images/begonia.png">

						<div class="p-t-10">
							<p style="padding-left: 34px;">It’s time to give new life to your interior. Indoor plant is a plant that is grown indoors in places such as residences and offices. Indoor plants not only help clean the environment around them.</p>
						</div>
					</div>
					<div class="p-t-10 p-b-50">
					 <a class="btn btn-warning" style="color: white;" href="indoor.php" >View More</a>
                      </div>
				</center>
				</div>

				<div class="col-md-4">
					<center>
						<div class="p-b-15"><h3 style="color: green;">Flowering Plants</h3></div>
					<div class="">
						<img src="images/roses-plants.png">

						<div class="p-t-10">
						<p style="margin-left: 34px;">Flowering plants are such type of plants, which have many verities flowers. These are known as garden plants. These plants are growing by seeds, so these are called seed growing plants.</p>
					</div>
						</div>
						<div class="p-t-10 p-b-50">
						<a class="btn btn-warning" style="color: white;" href="flower.php" >View More</a>
                        </div>
					</center>
					</div>

					<div class="col-md-4">
					<center>
						<div class="p-b-15"><h3 style="color: green;">Decorative Plants</h3></div>
					<div class="">
						<img src="images/ferns.png">

						<div class="p-t-10">
						<p style="padding-left: 34px;">We offer decorative plants that fit any style and budget and also beautify your home with the display of aesthetic features including: flowers, leaves, scent, overall foliage texture.</p>
					</div>
						</div>
						<div class="p-t-10 p-b-50">
						<a class="btn btn-warning" style="color: white;" href="hanging.php" >View More</a>
					</div>
					</center>
					</div>
				</div>
			</div>
		</div>

 	



	<!-- Footer -->
	<footer class="bg3 p-t-75 p-b-32">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-lg-4">
						<center>
					<h4 class="stext-301 cl0 p-b-30">
						Customer Service
					</h4>

					<ul>
						<li class="p-b-10">
							<a href="index_user.php" class="stext-107 cl7 hov-cl1 trans-04">
								Home
							</a>
						</li>

						<li class="p-b-10">
							<a href="about.php" class="stext-107 cl7 hov-cl1 trans-04">
								About
							</a>
						</li>

						<li class="p-b-10">
							<a href="show.php" class="stext-107 cl7 hov-cl1 trans-04">
								Plants
							</a>
						</li>

						<li class="p-b-10">
							<a href="contect.php" class="stext-107 cl7 hov-cl1 trans-04">
								Contect Us
							</a>
						</li>
					</ul>
				</center>
				</div>

				<div class="col-sm-6 col-lg-4">
					<h4 class="stext-301 cl0 p-b-30">
						PROFILE
					</h4>

					<p class="stext-107 cl7">
					Step into a sanctuary filled with gardening inspiration, garden ideas, indigenous and flowering plants, plus a wide selection of on-trend flower pots, top quality bird feeders. Transform your indoor living space into a green oasis filled with luscious indoor plants, paired with stylish indoor pots and beautiful containers.
				  </p>
				</div>



				<div class="col-sm-6 col-lg-4">
					<h4 class="stext-301 cl0 p-b-30">
						CONTECT US
					</h4>

					<p class="stext-107 cl7 size-201">
						Any questions? Let us know in store at 8th floor, 379 Hudson St, New York, NY 10018 or call us on (+1) 96 716 6879
					</p>

					 <div class="p-t-27">
					 	<h4 class="stext-301 cl0 p-b-9">
						CONNECT WITH-
					</h4>
						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-facebook"></i>
						</a>

						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-instagram"></i>
						</a>

						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-pinterest-p"></i>
						</a>
					</div>
				</div>
			</div>
		</div>
	</footer>

	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

	<!-- Modal1 -->
	<div class="wrap-modal1 js-modal1 p-t-60 p-b-20">
		<div class="overlay-modal1 js-hide-modal1"></div>

		<div class="container">
			<div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
				<button class="how-pos3 hov3 trans-04 js-hide-modal1">
					<img src="images/icons/icon-close.png" alt="CLOSE">
				</button>

				<div class="row">
					<div class="col-md-6 col-lg-7 p-b-30">
						<div class="p-l-25 p-r-30 p-lr-0-lg">
							<div class="wrap-slick3 flex-sb flex-w">
								<div class="wrap-slick3-dots"></div>
								<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

								<div class="slick3 gallery-lb">
									<div class="item-slick3" data-thumb="images/product-detail-01.jpg">
										<div class="wrap-pic-w pos-relative">
											<img src="images/product-detail-01.jpg" alt="IMG-PRODUCT">

											<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/product-detail-01.jpg">
												<i class="fa fa-expand"></i>
											</a>
										</div>
									</div>

									<div class="item-slick3" data-thumb="images/product-detail-02.jpg">
										<div class="wrap-pic-w pos-relative">
											<img src="images/product-detail-02.jpg" alt="IMG-PRODUCT">

											<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/product-detail-02.jpg">
												<i class="fa fa-expand"></i>
											</a>
										</div>
									</div>

									<div class="item-slick3" data-thumb="images/product-detail-03.jpg">
										<div class="wrap-pic-w pos-relative">
											<img src="images/product-detail-03.jpg" alt="IMG-PRODUCT">

											<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/product-detail-03.jpg">
												<i class="fa fa-expand"></i>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-md-6 col-lg-5 p-b-30">
						<div class="p-r-50 p-t-5 p-lr-0-lg">
							<h4 class="mtext-105 cl2 js-name-detail p-b-14">
								Lightweight Jacket
							</h4>

							<span class="mtext-106 cl2">
								$58.79
							</span>

							<p class="stext-102 cl3 p-t-23">
								Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat.
							</p>
							
							<!--  -->
							<div class="p-t-33">
								<div class="flex-w flex-r-m p-b-10">
									<div class="size-203 flex-c-m respon6">
										Size
									</div>

									<div class="size-204 respon6-next">
										<div class="rs1-select2 bor8 bg0">
											<select class="js-select2" name="time">
												<option>Choose an option</option>
												<option>Size S</option>
												<option>Size M</option>
												<option>Size L</option>
												<option>Size XL</option>
											</select>
											<div class="dropDownSelect2"></div>
										</div>
									</div>
								</div>

								<div class="flex-w flex-r-m p-b-10">
									<div class="size-203 flex-c-m respon6">
										Color
									</div>

									<div class="size-204 respon6-next">
										<div class="rs1-select2 bor8 bg0">
											<select class="js-select2" name="time">
												<option>Choose an option</option>
												<option>Red</option>
												<option>Blue</option>
												<option>White</option>
												<option>Grey</option>
											</select>
											<div class="dropDownSelect2"></div>
										</div>
									</div>
								</div>

								<div class="flex-w flex-r-m p-b-10">
									<div class="size-204 flex-w flex-m respon6-next">
										<div class="wrap-num-product flex-w m-r-20 m-tb-10">
											<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div>

											<input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product" value="1">

											<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div>
										</div>

										<button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
											Add to cart
										</button>
									</div>
								</div>	
							</div>

							<div class="flex-w flex-m p-l-100 p-t-40 respon7">
								<div class="flex-m bor9 p-r-10 m-r-11">
									<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100" data-tooltip="Add to Wishlist">
										<i class="zmdi zmdi-favorite"></i>
									</a>
								</div>

								<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Facebook">
									<i class="fa fa-facebook"></i>
								</a>

								<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Twitter">
									<i class="fa fa-twitter"></i>
								</a>

								<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Google Plus">
									<i class="fa fa-google-plus"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

    <!-- <div class="container">
	<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      
      <div class="modal-content">
        <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal">&times;</button>  
          <h4 class="modal-title">LogIn</h4>
        </div>
        <div class="modal-body">
      <label for="email"><b>Email:</b></label>
      <input type="text" class="form-control" placeholder="Enter Email" id="email1" required></br>

      <label for="pwd"><b>Password:</b></label>
      <input type="password" class="form-control" placeholder="Enter Password" id="password" required><br>
	  
	  <label>Remember Me:</label> 
	  <input type="checkbox" id="rememberme" value="1"><br></br>

      <button type="submit" class="btn btn-success" id="login_user">Login</button>
	  </br></br>
	  <div class="row">
	  <div class="col-sm-8">Not yet a member? <a href="form2.php">Sign up</a></div>
	  <div class="col-sm-4"><a href="reset.php">forgot password</a></div>
	  </div>	
        </div>
         <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
 -->


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



</body>
</html>