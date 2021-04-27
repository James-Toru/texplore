<?php

	session_start();

	require_once('./assets/php/CreateDb.php');
	include('./assets/php/contact.php');

	//Instance of creatdb class
	$database=new CreateDb("Texplore","Producttb");

	if(isset($_POST['add'])){
		if(isset($_SESSION['cart'])){

			$item_array_id = array_column($_SESSION['cart'], "product_id");

			if(in_array($_POST['product_id'], $item_array_id)){
				echo"<script>alert('Product is already added in the cart')</script>";
				echo "<script>window.location = 'index.php'</script>";
			}else{

				$count = count($_SESSION['cart']);
				$item_array = array(
					'product_id' =>$_POST['product_id']
				);

				$_SESSION['cart'][$count]= $item_array;
			}
		}else{
			$item_array = array(
				'product_id' =>$_POST['product_id']
			);
			//New session variable
			$_SESSION['cart'][0]= $item_array;
			print_r($_SESSION['cart']);
		}
	}

 ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta http-equiv="X-UA-Compatible" content="ie=edge" />
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
		<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
		<link rel="stylesheet" href="assets/css/style.css" />
		<link rel="stylesheet" href="assets/css/testimonial.css" />
		<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
		<title>Texplore</title>
		<link rel="icon" href="assets/img/icn.png">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
    	integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	</head>
	<body>
		<header>
			<div class="logo-container">
				<img src="assets/img/icon.png" alt="logo" />
				<a href="index.php"><h4 class="logo">Texplore</h4></a>
			</div>
			<nav>
				<ul class="nav-links">
					<li><a class="nav-link" href="products.php">Products</a></li>
					<li><a class="nav-link" href="#testimonials">About us</a></li>
					<li><a class="nav-link" href="#footer">Contact</a></li>
				</ul>
			</nav>
			<div class="cart">
				<a href="cart.php"><img src="assets/img/cart.svg" alt="cart" /></a>
				<?php
				if(isset($_SESSION['cart'])){
					$count = count($_SESSION['cart']);
					echo "<h6 class=\"cart_count\">$count</h6>";
				}else{
					echo "<h6 class=\"cart_count\">0</h6>";
				}
				?>
			</div>
		</header>
        
		<main>
			<section class="presentation">
				<div class="introduction">
					<div class="intro-text">
						<h1>Explore new possibilities</h1>
						<p>
							We're changing the world with technology!
						</p>
					</div>
				</div>
				<div class="cover">
					<img src="assets/img/matebook.png" alt="matebook" />
				</div>
				
			</section>
		<!-----Catalogue------>
		<section>
			<div class="intro-text">
				<h1>Check out our catalogue</h1>
				<p>Choose our various product types to see which one suits you best!</p>
			</div>
			<div class="row" >
				<div class="column">
				<div class="p-card" data-aos="fade-up">
					<div class="imgBx">
						<img src="assets/img/macair.png" alt="">
					</div>
					<div class="contentBx">
						<h3>Laptops</h3>
						<form id="catalogue-search" method="post" action="products.php">
							<input type="hidden" name="product" value="Laptop">
						<button class="shop" type="submit" name="psearch">Shop</button>
						</form>
						<?php
							  if (isset($_POST['psearch'])) {
								require_once('./assets/php/psearch.php');
								header('location: products.php'); //redirect
							  } 
						?>
					</div>
				</div>
				</div>

				<div class="column">
				<div class="p-card" data-aos="fade-up">
					<div class="imgBx">
						<img src="assets\img\Apple-iPhone-12-Pro-Max-removebg-preview.png" alt="">
					</div>
					<div class="contentBx">
						<h3>Phones</h3>
						<form id="catalogue-search" method="post" action="products.php">
							<input type="hidden" name="product" value="Phone">
						<button class="shop" type="submit" name="psearch">Shop</button>
						</form>
						<?php
							  if (isset($_POST['psearch'])) {
								require_once('./assets/php/psearch.php');
								header('location: products.php'); //redirect
							  } 
						?>
					</div>
				</div>
				</div>

				<div class="column">
				<div class="p-card" data-aos="fade-up">
					<div class="imgBx">
						<img src="assets/img/headset.png" alt="">
					</div>
					<div class="contentBx">
						<h3>Headsets</h3>
						<form id="catalogue-search" method="post" action="products.php">
							<input type="hidden" name="product" value="Headset">
						<button class="shop" type="submit" name="psearch">Shop</button>
						</form>
						<?php
							  if (isset($_POST['psearch'])) {
								require_once('./assets/php/psearch.php');
								header('location: products.php'); //redirect
							  } 
						?>
					</div>
				</div>
				</div>

				<div class="column">
				<div class="p-card" data-aos="fade-up">
					<div class="imgBx">
						<img src="assets/img/drone.png" alt="">
					</div>
					<div class="contentBx">
						<h3>Drones</h3>
						<form id="catalogue-search" method="post" action="products.php">
							<input type="hidden" name="product" value="Drone">
						<button class="shop" type="submit" name="psearch">Shop</button>
						</form>
						<?php
							  if (isset($_POST['psearch'])) {
								require_once('./assets/php/psearch.php');
								header('location: products.php'); //redirect
							  } 
						?>
					</div>
				</div>
				</div>
			</div>
		</section>
		<!---Background Image Content--->
			<img class="big-circle" src="assets/img/big-eclipse.svg" alt="" />
			<img class="medium-circle" src="assets/img/mid-eclipse.svg" alt="" />
			<img class="small-circle" src="assets/img/mid-eclipse.svg" alt="" />

		<!------Advert carousel------>
			<section class="advt-carousel">
				<div class="container-fluid p-0">
					<div class="site-slider">
						<div class="slider-one">
							<div class="slide">
								<img src="assets/img/slide1.jpg" alt="Banner 1">	
									<h2>Customize your setup</h2>
									<p>Try out a range of unique products</p>
							</div>	
							<div class="slide">
								<img src="assets/img/slide2.jpg" alt="Banner 2">
									<h2>Embrace the power</h2>
									<p>With new technology in the market</p>
							</div>
							<div class="slide">
								<img src="assets/img/slide3.jpg" alt="Banner 3">
									<h2>Explore new tech</h2>
									<p>Be the first to own newly released technology</p>
							</div>
						</div>
						<div class="slider-btn">
							<span class="prev position-top"><i class="fas fa-chevron-left"></i></span>
							<span class="next position-top right-0"><i class="fas fa-chevron-right"></i></span>
						</div>
					</div>
				</div>
			</section>
		
		<!---------Testimonial---------->
		<div class="intro-text" id="testimonials">
				<h1>Testimonials</h1>
				<p>Read what our satisfied customers and vendors have to say!</p>
			</div>
		<section class="spacer">
			
				<div class="testimonial-section">
					<div class="testi-user-img">
					<div class="swiper-container gallery-thumbs">
						  <div class="swiper-wrapper">
								  <div class="swiper-slide">
										<img class="u3" src="assets/img/testimonial1.jpg" alt="">
									</div>
						  <div class="swiper-slide">
							  <img class="u1" src="assets/img/testimonial2.jpg" alt="">
						  </div>
						  <div class="swiper-slide">
						  <img class="u2" src="assets/img/testimonial3.jpg" alt="">
						  </div>
					  
						  <div class="swiper-slide">
						  <img class="u4" src="assets/img/testimonial4.jpg" alt="">
						  </div>
						  
						  </div>
					  </div>
					</div>
					<div class="user-saying">
						  <div class="swiper-container testimonial">
								  <!-- Additional required wrapper -->
								  <div class="swiper-wrapper ">
									  <!-- Slides -->
									  <div class="swiper-slide">
										  <div class="quote">
												  <img class="quote-icon" src="https://md-aqil.github.io/images/quote.png" alt="">
											  <p>
													  “This is best and biggest unified platform
											  for tech items. We can easily buy what we need in one click of a button..“
											  </p>
											  <div class="name">-Rose Gould-</div>
											  <div class="designation">Web Developer</div>
											  
										  </div>
									  </div>
									  <div class="swiper-slide">
										  <div class="quote">
												<img class="quote-icon" src="https://md-aqil.github.io/images/quote.png" alt="">
											
											  <p>
													  “This is the go to place for all my technology needs. All the drones I use 
													  for work came from here..“
											  </p>
											  <div class="name">-Jane doe-</div>
											  <div class="designation">Photographer</div>
											  
										  </div>
									  </div>
									  <div class="swiper-slide">
										  <div class="quote">
												<img class="quote-icon" src="https://md-aqil.github.io/images/quote.png" alt="">
												  
											  <p>
													  “The best online sale platform for selling all my phones and laptops.
													  Fast,reliable and highly effective..“
											  </p>
											  <div class="name">-George Weasly-</div>
											  <div class="designation">Vendor</div>
											  
										  </div>
									  </div>
									  <div class="swiper-slide">
											  <div class="quote">
													<img class="quote-icon" src="https://md-aqil.github.io/images/quote.png" alt="">
												 
												  <p>
														  “Quality productx and service. Got my favorite headphones from here.
														  Best decision I have ever made..“
												  </p>
												  <div class="name">-Jerome Voom-</div>
												  <div class="designation">Music Producer</div>
												  
											  </div>
										  </div>
									  
								  </div>
								  <!-- If we need pagination -->
								  <div class="swiper-pagination swiper-pagination-white"></div>
							  
							  </div>
					</div>
				</div>
		</section>

		</main>
		
		<!-----Footer----->
		<section>
		<footer id="footer" data-aos="fade-up"  data-aos-offset="200" data-aos-duration="1000">
			<div class="main-content">
			  <div class="left box">
				<h2>About us</h2>
				<div class="content">
				  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam maiores voluptate consectetur nesciunt eveniet quod earum obcaecati placeat voluptates dolore.</p>
				  <div class="social">
					<a href="https://facebook.com"><span class="fab fa-facebook-f"></span></a>
					<a href="#"><span class="fab fa-twitter"></span></a>
					<a href="https://instagram.com"><span class="fab fa-instagram"></span></a>
					<a href="https://youtube.com/"><span class="fab fa-youtube"></span></a>
				  </div>
				</div>
			  </div>
	  
			  <div class="center box">
				<h2>Address</h2>
				<div class="content">
				  <div class="place">
					<span class="fas fa-map-marker-alt"></span>
					<span class="text">Nairobi, Kenya</span>
				  </div>
				  <div class="phone">
					<span class="fas fa-phone"></span>
					<span class="text">+2548123456</span>
				  </div>
				  <div class="email">
					<span class="fas fa-envelope"></span>
					<span class="text">texplore@tech.com</span>
				  </div>
				</div>
			  </div>
	  
			  <div class="right box">
				<h2>Contact us</h2>
				<div class="content">
				  <form action="index.php" method ="post">
					<div class="email">
					  <div class="text">Email *</div>
					  <input type="email" name="email" required>
					</div>
					<div class="msg">
					  <div class="text">Message *</div>
					  <textarea name ="message" rows="2" cols="25" required></textarea>
					</div>
					<div class="btn">
					  <button name="send" type="submit">Send</button>
					</div>
				  </form>
				</div>
			  </div>
			</div>
			<div class="bottom">
			  <center>
				<span class="credit">Created By <a href="#">Texplore</a> | </span>
				<span class="far fa-copyright"></span><span> 2021 All rights reserved.</span>
			  </center>
			</div>
		  </footer>
	   </section>
	   <script src="https://md-aqil.github.io/images/swiper.min.js"></script>
	    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
		<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
		<script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
		<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
		<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
		<script>
		  AOS.init({
			  offset: 400,
			  duration: 1000
		  });
		</script>
		<script src="assets/js/slider.js"></script>
		<script src="assets/js/swiper.js"></script>
	</body>
</html>
