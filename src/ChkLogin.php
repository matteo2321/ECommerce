<?php 
session_start();
include("connection.php");

// check if form's credential are ok 
$mail = $_POST["mail"];
$password = $_POST["password"];

// query
$sql = "SELECT * from utenti where mail='". $mail ."'and password='".$password."'";

$result = $conn->query($sql);
if($result->num_rows > 0){
    $row = $result->fetch_assoc(); 
    $_SESSION["id"]=$row["id"];
    $_SESSION["nome"]=$row["nome"];
    $_SESSION["cognome"]=$row["cognome"];
    $_SESSION["indirizzo"]=$row["indirizzo"];
    $_SESSION["mail"]=$row["mail"];
    $_SESSION["password"]=$row["password"];
    $_SESSION["admin"]=$row["admin"];
    $_SESSION["username"]=$row["username"];
    

    header('Location: index.php');

}else{
    header('Location: index.php?msg=errore');
}
?>


