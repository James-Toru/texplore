<?php include('uploadServer.php'); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta http-equiv="X-UA-Compatible" content="ie=edge" />
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="assets/css/style.css" />
		<link rel="stylesheet" href="assets/css/forms.css" />
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
				<a href="vendorindex.php"><h4 class="logo">Texplore</h4></a>
			</div>
			<nav>
				<ul class="nav-links">
					<li><a class="nav-link" href="products.php">Products</a></li>
					<li><a class="nav-link" href="vendorindex.php#footer">About us</a></li>
					<li><a class="nav-link" href="vendorindex.php#footer">Contact</a></li>
				</ul>
			</nav>
			<div class="add-products">
				<a href="upload.php"><i class="fas fa-plus-circle"></i></a>
			</div>
		</header>
        <main>
        <section class="upload-form">
            <form method="post" action="upload.php" enctype="multipart/form-data">
                <!--Validation errors-->
                <div class="upload-box">
                <h1>Upload New Products</h1>
                <div class="textbox">
                    <input type="text" placeholder="Enter Product Name" name="product_name" required >
                </div>
                <div class="textbox">
                    <input type="number" placeholder="Enter Product Price" onkeypress="return event.charCode >= 48" min="1" name="product_price" required >
                </div>
				<div class="textbox">
                    <input type="text" placeholder="Enter Type: Laptop,Phone,Headset" name="product_type" required >
                </div>
                <div class="textbox">
                    <textarea placeholder="Enter Product Description" name="product_desc" id="" cols="20" rows="5" required></textarea>
                </div>
                <div class="image-upload">
                   <label for="imageupload">Select Product Image</label> 
                   <span id="file-chosen"></span>
                   <input  id="imageupload" type="file" accept="image/*" onchange="showPreview(event);"  name="product_image">
                   <div class="imageupload-preview">
                       <img id="imageupload-preview">
                   </div>
                </div>

                <div class="upload-btn">
                <button type="submit" name="upload">Upload</button>
                </div>
                </div>
                </form>
            </section>
            <img class="big-circle" src="assets/img/big-eclipse.svg" alt="" />
			<img class="medium-circle" src="assets/img/mid-eclipse.svg" alt="" />
			<img class="small-circle" src="assets/img/mid-eclipse.svg" alt="" />
        </main>
        <script src="assets/js/imgPrev.js"></script>
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
