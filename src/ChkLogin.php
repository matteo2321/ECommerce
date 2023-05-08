<?php 
session_start();
include("Connection.php");

// check if form's credential are ok 
$email = $_POST["email"];
$password = $_POST["password"];

// query
$sql = "SELECT * from utente where email='". $email ."'and password='".$password."'";

$result = $conn->query($sql);
if($result->num_rows > 0){
    $row = $result->fetch_assoc(); 
    $_SESSION["id"]=$row["id"];
    $_SESSION["nome"]=$row["nome"];
    $_SESSION["cognome"]=$row["cognome"];
    $_SESSION["indirizzo"]=$row["indirizzo"];
    $_SESSION["email"]=$row["email"];
    $_SESSION["password"]=$row["password"];
    $_SESSION["admin"]=$row["admin"];
    

    header('Location: index.php');

}else{
    header('Location: index.php?msg=errore');
}
?>


