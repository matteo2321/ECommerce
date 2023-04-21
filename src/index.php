<!DOCTYPE html>
<?php
session_start();
include("Connection.php");

?>

<html>

<head>
    <title>ECommerce</title>
    <link rel="stylesheet" href="homepage.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="#">Carrello</a></li>
                <li><a href="AccountRedirect.php"><?php //echo $_SESSION["nome"].$_SESSION["cognome"];?></a></li>
            </ul>
        </nav>
        <div class="search-bar">
            <form action="/ricerca.php" method="GET"> <!-- Aggiungi l'URL di destinazione per la pagina di ricerca PHP nel campo 'action' -->
                <input type="text" name="q" placeholder="Cerca prodotti..." /> <!-- Aggiungi il nome del campo di ricerca come 'q' e il placeholder desiderato -->
                <button type="submit">Cerca</button>
            </form>
        </div>
    </header>
    <div class="banner">
        <div class="banner-container">
            <div class="banner-item">Elemento 1</div>
            <div class="banner-item">Elemento 2</div>
            <div class="banner-item">Elemento 3</div>
        </div>
    </div>
    <br>
    <div class="container">
        <h3 class="text-center">Altri Prodotti....</h3>
        <div class="row">




        </div>

    </div>

    <footer>
        <p>ECommerce. Tutti i diritti riservati.</p>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>