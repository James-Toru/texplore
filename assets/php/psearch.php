<?php
// (A) DATABASE CONFIG 
define('DB_HOST', 'localhost');
define('DB_NAME', 'Texplore');
define('DB_CHARSET', 'utf8');
define('DB_USER', 'root');
define('DB_PASSWORD', '');

// (B) CONNECT TO DATABASE
try {
  $pdo = new PDO(
    "mysql:host=".DB_HOST.";charset=".DB_CHARSET.";dbname=".DB_NAME,
    DB_USER, DB_PASSWORD, [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]
  );
} catch (Exception $ex) { exit($ex->getMessage()); }

// (C) SEARCH
$product=$_POST['product'];
$stmt = $pdo->prepare("SELECT * FROM `producttb` WHERE `product_type` LIKE ?");
$stmt->execute(["%".$_POST['psearch']."$product%"]);
$results = $stmt->fetchAll();
