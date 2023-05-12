<?php
session_start();
include("Connection.php");

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $categoria = $_GET["categoriapers"];

    $logFile = fopen("log.log", "a");
    $message = date("Y-m-d H:i:s") . $categoria;
    fwrite($logFile, $message . "\n");
    fclose($logFile);



    $sql = "INSERT INTO categoria (nome) VALUES ('".$categoria."')";
    $conn->query($sql);
}

?>