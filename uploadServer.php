<?php
// Include the database configuration file
include 'assets/php/dbConfig.php';
$statusMsg = '';

// File upload path
$targetDir = "assets/img/";


if(isset($_POST["upload"]) && !empty($_FILES["product_image"]["name"])){
    $fileName = basename($_FILES["product_image"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_type = $_POST['product_type'];
    $product_desc = $_POST['product_desc'];
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["product_image"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $insert = $db->query("INSERT into producttb (product_name, product_price ,product_desc, product_image, product_type) 
                                     VALUES ('$product_name','$product_price','$product_desc','".$fileName."','$product_type')");
            if($insert){
                $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
                header('location: index.php'); //redirect
            }else{
                $statusMsg = "File upload failed, please try again.";
            } 
        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
}else{

}

// Display status message
echo $statusMsg;
?>