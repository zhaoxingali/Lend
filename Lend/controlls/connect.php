<?php 
header("content-Type: text/html; charset=Utf-8");
$servername = "localhost";
$username = "root";
$password = "";
$dbase = "lend";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbase", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   	if(@$conn->connect_error) {
  		die("Connection failed: " . $conn->connect_error);
   	}    
}
catch(PDOException $e){
	echo $e->getMessage();
}
 ?>

