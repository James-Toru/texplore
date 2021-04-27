<?php
	session_start();
	require_once('./assets/php/CreateDb.php');
	require_once('./assets/php/component.php');
	include('./assets/php/contact.php');

	$db = new CreateDb("Texplore", "Producttb");

	if(isset($_POST['remove'])){
		if($_GET['action'] == 'remove'){
			foreach($_SESSION['cart'] as $key=>$value){
				if($value['product_id']==$_GET['id']){
					unset($_SESSION['cart'][$key]);
              		echo "<script>window.location = 'cart.php'</script>";
				}
			}
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta http-equiv="X-UA-Compatible" content="ie=edge" />
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="assets/css/style.css" />
		<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
		<title>Texplore</title>
		<link rel="icon" href="assets/img/icn.png">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <script src="assets/js/main.js" async></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


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
					<li><a class="nav-link" href="#footer">About us</a></li>
					<li><a class="nav-link" href="#footer">Contact</a></li>
				</ul>
			</nav>
			<div class="cart">
				<a href="cart.html"><img src="assets/img/cart.svg" alt="cart" /></a>
			</div>
		</header>

		<main class="cart-page">
            <h2 class="section-header">CART</h2>
            <div class="cart-row-header">
                <span class="cart-header cart-column">ITEM</span>
                <span class="cart-header cart-column">PRICE</span>
                <span class=" cart-header cart-column">QUANTITY</span>
            </div>
            <div class="cart-items">
                <?php
				$total=0;
					$product_id = array_column($_SESSION['cart'], 'product_id');

					$result = $db ->getData();
					while($row = mysqli_fetch_assoc($result)){
						foreach($product_id as $id){
							if($row['id'] == $id){
								cartElement($row['product_image'],$row['product_name'],$row['product_price'],$row['id']);
								$total = $total + (int)$row['product_price'];
							}
						}
					}
				?>
            </div>
            <div class="cart-total">
                <strong class="cart-total-title">Total:</strong>
                <span class="cart-total-price">Ksh<?php echo $total; ?></span>
            </div>
            <button class="btn btn-primary btn-purchase" type="button">PURCHASE</button>
        </section>
            <img class="big-circle" src="assets/img/big-eclipse.svg" alt="" />
			<img class="medium-circle" src="assets/img/mid-eclipse.svg" alt="" />
			<img class="small-circle" src="assets/img/mid-eclipse.svg" alt="" />
        </main>
		<!----Footer--->
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
				  <form action="cart.php" method ="post">
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

		<script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
		<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
		<script>
		  AOS.init({
			  offset: 400,
			  duration: 1000
		  });
		</script>
	</body>
</html>
