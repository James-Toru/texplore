<?php include('vserver.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Texplore Login</title>
    <link rel="icon" href="assets/img/icn.png">
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/forms.css" />
    <link rel="stylesheet" href="assets/css/loader.css" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<body>
    <div class="login-header">
        <img src="assets/img/icon.png" alt="logo" />
        <h1>Texplore</h1>
    </div>
    <form method="post" action="vlogin.php">
        <!--Validation errors-->
        <?php include('errors.php'); ?>
        <div class="login-box">
        <h1>Login</h1>
        <div class="textbox">
            <i class="fas fa-user"></i>
            <input type="text" name="vusername" placeholder="Username" required>
        </div>

        <div class="textbox">
            <i class="fas fa-lock"></i>
            <input type="password" name="vpassword" placeholder="Password" required>
        </div>
        <div class="upload-btn">
        <button type="submit" name="vlogin">Login</button>
        </div>
        <div class="redirect">
            <p>
                Not yet a Vendor? <a href="vregister.php">Sign up</a>
            </p>
        </div>
        </div>
    </form>
    <img class="big-circle" src="assets/img/big-eclipse.svg" alt="" />
	<img class="medium-circle" src="assets/img/mid-eclipse.svg" alt="" />
	<img class="small-circle" src="assets/img/mid-eclipse.svg" alt="" />
<script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
</body>
</html>