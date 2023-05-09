<?php
session_start();
$_SESSION["ricerca"]=$_GET["filtro"];
header("location: index.php");

?>