<?php
session_start();
include("Connection.php");


$titolo = $_GET["titolo"];
$descrizione = $_GET["descrizione"];
$venditore = $_GET["venditore"];
$quantitaMag = $_GET["quantita"];
$prezzo = $_GET["prezzo"];
echo $_GET["foto"];
if (isset($_GET["categoriapers"]) && $_GET["categoriapers"] != "") {

    #CATEGORIA PERSONALIZZATA

    $sqlcatpers = "SELECT * FROM categoria WHERE nome=" . $_GET["categoriapers"];
    $resultcatpers = $conn->query($sqlcatpers);
    if ($resultcatpers->num_rows > 0) {
        while ($rowcatpers = $resultcatpers->fetch_assoc()) {
            $idCategoria = $rowcatpers["idc"];
        }
    }

    $target_dir = "imm/";
    $target_file = $target_dir . basename($_FILES["foto"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }





    $sqlfoto = "SELECT idf FROM foto WHERE path='" . $target_dir . basename($_FILES["foto"]["name"]) . "'";
    $resultsqlfoto = $conn->query($sqlfoto);
    if ($resultsqlfoto->num_rows > 0) {
        while ($rowsqlfoto = $resultsqlfoto->fetch_assoc()) {
            $idFoto = $rowsqlfoto["idf"];
        }
    }




    $sqlpers = "INSERT INTO prodotto(titolo, descrizione, venditore, quantitaMag, prezzo, IdCategoria, IdFoto) VALUES ($titolo,$descrizione,$venditore,$quantitaMag,$prezzo,$idCategoria,$idFoto)";
    $conn->query($sqlpers);
} else {



    #CATEGORIA NON PERSONALIZZATA

    $sqlcat = "SELECT idc FROM categoria WHERE nome=" . $_GET["categoria"];
    $resultsqlcat = $conn->query($sqlcat);
    if ($resultsqlcat->num_rows > 0) {
        while ($rowsqlcat = $resultsqlcat->fetch_assoc()) {
            $idCategoria = $rowsqlcat["idc"];
        }
    }





    $target_dir = "imm/";
    $target_file = $target_dir . basename($_FILES["foto"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }






    $sqlfoto2 = "SELECT idf FROM foto WHERE path='" . $target_dir . basename($_FILES["foto"]["name"]) . "'";
    $resultsqlfoto2 = $conn->query($sqlsqlfoto2);
    if ($resultsqlfoto2->num_rows > 0) {
        while ($rowsqlfoto2 = $resultsqlfoto2->fetch_assoc()) {
            $idCategoria = $rowsqlfoto2["idf"];
        }
    }

    $sqlpers = "INSERT INTO prodotto(titolo, descrizione, venditore, quantitaMag, prezzo, IdCategoria, IdFoto) VALUES ($titolo,$descrizione,$venditore,$quantitaMag,$prezzo,$idCategoria,$idFoto)";
    $conn->query($sqlpers);
}
