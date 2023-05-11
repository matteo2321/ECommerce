<?php
session_start();
include("Connection.php");


$titolo=$_GET["titolo"];
$descrizione=$_GET["descrizione"];
$venditore=$_GET["venditore"];
$quantitaMag=$_GET["quantita"];
$prezzo=$_GET["prezzo"];
echo $_GET["foto"];
if(isset($_GET["categoriapers"])&&$_GET["categoriapers"]){

    #CATEGORIA PERSONALIZZATA

    $sqlcatpers="SELECT idc FROM categoria WHERE nome=".$_GET["categoriapers"];
    $resultcatpers = $conn->query($sqlcatpers);
        if ($resultcatpers->num_rows > 0) {
            while ($rowcatpers = $resultcatpers->fetch_assoc()) {
                $idCategoria=$rowcatpers["idc"];
            }}





    $sqlpers="INSERT INTO prodotto(titolo, descrizione, venditore, quantitaMag, prezzo, IdCategoria, `IdFoto`) VALUES ($titolo,$descrizione,$venditore,$quantitaMag,$prezzo,$idCategoria,$idFoto)";
    $conn->query($sqlpers);

}else{



    #CATEGORIA NON PERSONALIZZATA

    $sqlcat="SELECT idc FROM categoria WHERE nome=".$_GET["categoria"];
    $resultsqlcat= $conn->query($sqlcat);
        if ($resultsqlcat->num_rows > 0) {
            while ($rowsqlcat = $resultsqlcat->fetch_assoc()) {
                $idCategoria=$rowsqlcat["idc"];
            }}






    $file = $_FILES['foto'];
    $uploadDir = '/imm';
    if (move_uploaded_file($file['"'.$titolo.'"'], $uploadDir . $file['"'.$titolo.'"'])) {
        echo 'File uploaded successfully!';
      } else {
        echo 'Error uploading file.';
      }







    $sqlfoto2="SELECT idf FROM foto WHERE path=".$_GET["categoria"];
    $resultsqlfoto2 = $conn->query($sqlsqlfoto2);
        if ($resultsqlfoto2->num_rows > 0) {
            while ($rowsqlfoto2 = $resultsqlfoto2->fetch_assoc()) {
                $idCategoria=$rowsqlfoto2["idf"];
            }}
            
    $sqlpers="INSERT INTO prodotto(titolo, descrizione, venditore, quantitaMag, prezzo, IdCategoria, `IdFoto`) VALUES ($titolo,$descrizione,$venditore,$quantitaMag,$prezzo,$idCategoria,$idFoto)";
    $conn->query($sqlpers);

}




$sql="INSERT INTO prodotto(titolo, descrizione, venditore, quantitaMag, prezzo, `IdCategoria`, `IdFoto`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]','[value-8]')"

?>