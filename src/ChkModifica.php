<?php
session_start();
include("Connection.php");

$titolo=$_GET["titolo"];
$descrizione=$_GET["descrizione"];
$venditore=$_GET["venditore"];
$quantitaMag=$_GET["quantita"];
$prezzo=$_GET["prezzo"];

if (isset($titolo)&&$titolo!="") {
    $sqltitolo = "UPDATE prodotto SET titolo = '".$titolo."' WHERE id =".$_SESSION["idModProdotto"];
    echo $sqltitolo;
    #$conn->query($sqltitolo);
}
if (isset($descrizione)&&$descrizione!="") {
    $sqldescrizione = "UPDATE prodotto SET descrizione = '".$descrizione."' WHERE id =".$_SESSION["idModProdotto"];
    $conn->query($sqldescrizione);
}
if (isset($venditore)&&$venditore!="") {
    $sqlvenditore = "UPDATE prodotto SET venditore = '".$venditore."' WHERE id =".$_SESSION["idModProdotto"];
    $conn->query($sqlvenditore);
}
if (isset($quantitaMag)&&$quantitaMag!="") {
    $sqlquantitaMag = "UPDATE prodotto SET quantitaMag = '".$quantitaMag."'' WHERE id =".$_SESSION["idModProdotto"];
    $conn->query($sqlquantitaMag);
}
if (isset($prezzo)&&$prezzo!="") {
    $sqlprezzo = "UPDATE prodotto SET prezzo = '".$prezzo."' WHERE id =".$_SESSION["idModProdotto"];
    $conn->query($sqlprezzo);
}


header("location: index.php");



















?>