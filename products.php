<?php

	session_start();

	require_once('./assets/php/CreateDb.php');
	require_once('./assets/php/component.php');
    include('./assets/php/contact.php');

	//Instance of creatdb class
	$database=new CreateDb("Texplore","Producttb");

	if(isset($_POST['add'])){
		if(isset($_SESSION['cart'])){

			$item_array_id = array_column($_SESSION['cart'], "product_id");

			if(in_array($_POST['product_id'], $item_array_id)){
				echo"<script>alert('Product is already added in the cart')</script>";
                echo "<script>window.location = 'products.php'</script>";
			}else{

				$count = count($_SESSION['cart']);
				$item_array = array(
					'product_id' =>$_POST['product_id']
				);

				$_SESSION['cart'][$count]= $item_array;
                echo "<script>window.location = 'products.php'</script>";
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
		<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
		<link rel="stylesheet" href="assets/css/style.css" />
		<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
		<title>Texplore</title>
		<link rel="icon" href="assets/img/icn.png">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
    	integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<script src="assets/js/main.js" async></script>
	</head>
	<body>
		<header>
			<div class="logo-container">
				<img src="assets/img/icon.png" alt="logo" />
				<a href="index.php"><h4 class="logo">Texplore</h4></a>
			</div>
			<nav>
            <form id="products-search" method="post" action="products.php">
				<div id="searchProducts" class ="search-box">
                    
                    <input class="search-txt" type="text" name="search" placeholder="Type to Search Product" required>
                    <a href="javascript:{}" onclick="document.getElementById('products-search').submit(); return false;" class ="search-btn" >
                    <i class="fas fa-search"></i>
                    </a>
                   
                </div>
                 </form>
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
			<!-----Catalogue------>
			<div class="intro-text">
				<h1>Check out our catalogue</h1>
				<p>Browse our impressive catalogue and find the tech that suits you!</p>
			</div>
			<section id="products">
			<?php 
			    if (isset($_POST['psearch'])) {
                    require_once "./assets/php/psearch.php";
                    if (count($results) > 0) {
                        foreach($results as $row){
                            component($row['product_name'],$row['product_price'],$row['product_desc'],$row['product_image'],$row['id']);
                        }
                    }else { echo "No results found"; }
                }
                if (isset($_POST['search'])) {
                    require_once "./assets/php/search.php";
                    if (count($results) > 0) {
                        foreach($results as $row){
                            component($row['product_name'],$row['product_price'],$row['product_desc'],$row['product_image'],$row['id']);
                        }
                    }else { echo "No results found"; }
                }
        
            ?>

            <div class="intro-text">
				<p>Take a look at all the products we have</p>
			</div>
            <?php
            $result= $database ->getData();
            while($row = mysqli_fetch_assoc($result)){
                component($row['product_name'],$row['product_price'],$row['product_desc'],$row['product_image'],$row['id']);
            }
			?>
			</section>
		   <!---Background Image Content--->
			<img class="big-circle" src="assets/img/big-eclipse.svg" alt="" />
			<img class="medium-circle" src="assets/img/mid-eclipse.svg" alt="" />
			<img class="small-circle" src="assets/img/mid-eclipse.svg" alt="" />


		</main>
		
		<!-----Footer----->
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
				  <form action="products.php" method ="post">
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
				<span class="far fa-copyright"></span><span> 2021 All rights reserved |</span>
				<span class="credit"> <a href="landing.html">Logout</a></span>
			  </center>
			</div>
		  </footer>
	   </section>

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
	</body>
</html>
