<?php 
session_start();
include("Connection.php");



$nome = $_POST['nome'];
$cognome = $_POST['cognome'];
$email = $_POST['email'];
$password = $_POST['password'];
$indirizzo = $_POST['indirizzo'];

$sql = "INSERT into utente (nome, cognome,indirizzo,email,password) 
        values('$nome','$cognome','$indirizzo','$email','$password')";
      $conn->query($sql);
      header("location: Login.php");

?>