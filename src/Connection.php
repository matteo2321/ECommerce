<?php   // file per connettere lo script al db
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecommerce";

//create connection 
$conn = new mysqli($servername,$username,$password,$dbname);
//check connection  
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);    //alias exit (die)
}
?>