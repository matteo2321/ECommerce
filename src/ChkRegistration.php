<?php 
session_start();
include("connection.php");



$nome = $_POST['nome'];
$cognome = $_POST['cognome'];
$mail = $_POST['mail'];
$password = $_POST['password'];
$indirizzo = $_POST['indirizzo'];

$sql = "INSERT into utenti (nome, cognome,indirizzo,mail,password) 
        values('$nome','$cognome','$indirizzo','$mail','$password')";
      $conn->query($sql);
      header("location: Login.php");

?>