<?php
$db = mysqli_connect('localhost','root','','texplore') or die($db);

if (isset($_POST['send'])) {
    $email =  mysqli_real_escape_string($db, $_POST['email']);
    $message = mysqli_real_escape_string($db, $_POST['message']);

    $sql = "INSERT INTO contact (email, message) 
                    VALUES ('$email', '$message')";
    mysqli_query($db,$sql);}
        

?>