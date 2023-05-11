<?php
session_start();
include("Connection.php");

$nome = $_GET["nome"];
echo $_GET["nome"];

// esegui la query per l'inserimento della categoria
$sql = "INSERT INTO categoria (nome) VALUES ('".$nome."')";
$conn->query($sql);

?>