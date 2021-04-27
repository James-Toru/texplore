<?php
    session_start();

    $username = "";
    $email = "";
    $errors = array();

    //connect to DB
    $db = mysqli_connect('localhost','root','','texplore') or die($db);

    //User Registration
    if (isset($_POST['register'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

    //confirm values
    if(empty($username)){
        array_push($errors, "Username is required");
    }
    if(empty($email)){
        array_push($errors, "Email is required");
    }
    if(empty($password_1)){
        array_push($errors, "Password is required");
    }
    
    if($password_1 != $password_2){
        array_push($errors, "The passwords do not match");
    }


    //upload to database
    if(count($errors) == 0){
        $password = md5($password_1);
        $sql = "INSERT INTO users (username, email, password) 
                    VALUES ('$username', '$email', '$password')";
        mysqli_query($db,$sql);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        header('location: login.php'); //redirect
    }
}

    //login
    if(isset($_POST['login'])){
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $password = mysqli_real_escape_string($db, $_POST['password']);

        if(empty($username)){
            array_push($errors, "Username is required");
        }
        if(empty($password)){
            array_push($errors, "Password is required");
        }
        if(count($errors)== 0){
            $password = md5($password);
            $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
            $result = mysqli_query($db,$query);
            if(mysqli_num_rows($result) == 1){
                $_SESSION['username'] = $username;
                $_SESSION['success'] = "You are now logged in";
                header('location: index.php'); //redirect
            }else{
                array_push($errors,"The Username or Password is invalid");
            }
            
        }
    }
?>