<?php
    session_start();

    $vusername = "";
    $vemail = "";
    $errors = array();

    //connect to DB
    $database = mysqli_connect('localhost','root','','texplore') or die($database);

    //User Registration
    if (isset($_POST['vregister'])) {
    $vusername = mysqli_real_escape_string($database, $_POST['vusername']);
    $vemail = mysqli_real_escape_string($database, $_POST['vemail']);
    $vpassword_1 = mysqli_real_escape_string($database, $_POST['vpassword_1']);
    $vpassword_2 = mysqli_real_escape_string($database, $_POST['vpassword_2']);

    //confirm values
    if(empty($vusername)){
        array_push($errors, "Username is required");
    }
    if(empty($vemail)){
        array_push($errors, "Email is required");
    }
    if(empty($vpassword_1)){
        array_push($errors, "Password is required");
    }
    
    if($vpassword_1 != $vpassword_2){
        array_push($errors, "The passwords do not match");
    }


    //upload to database
    if(count($errors) == 0){
        $vpassword = md5($vpassword_1);
        $vsql = "INSERT INTO vendors (vusername, vemail, vpassword) 
                    VALUES ('$vusername', '$vemail', '$vpassword')";
        mysqli_query($database,$vsql);
        $_SESSION['vusername'] = $vusername;
        $_SESSION['vsuccess'] = "You are now logged in";
        header('location: vlogin.php'); //redirect
    }
}

    //login
    if(isset($_POST['vlogin'])){
        $vusername = mysqli_real_escape_string($database, $_POST['vusername']);
        $vpassword = mysqli_real_escape_string($database, $_POST['vpassword']);

        if(empty($vusername)){
            array_push($errors, "Username is required");
        }
        if(empty($vpassword)){
            array_push($errors, "Password is required");
        }
        if(count($errors)== 0){
            $vpassword = md5($vpassword);
            $vquery = "SELECT * FROM vendors WHERE vusername='$vusername' AND vpassword='$vpassword'";
            $result = mysqli_query($database,$vquery);
            if(mysqli_num_rows($result) == 1){
                $_SESSION['vusername'] = $vusername;
                $_SESSION['success'] = "You are now logged in";
                header('location: vendorindex.php'); //redirect
            }else{
                array_push($errors,"The Username or Password is invalid");
            }
            
        }
    }

    if(isset($_GET['logout'])){
        session_destroy();
        unset($_SESSION['vusername']);
        header('location: vlogin.php');
    }
?>