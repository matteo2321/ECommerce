<?php
session_start();
include("Connection.php");




//CONTROLLI



$text = $_GET['txt'];
$rating = $_GET['rating'];
$IdUtente = $_SESSION["id"];
$IdProdotto = $_SESSION["IdProdotto"];

$sql = "INSERT into commento (text, stelle,IdUtente,IdProdotto) 
        values('$text','$rating','$IdUtente','$IdProdotto')";
      $conn->query($sql);
      header("location: prodotto.php?id=".$_SESSION['IdProdotto']);

?>






