<?php
session_start();
include("Connection.php");
?>
<html>

<head>
    <link rel="stylesheet" href="homepage.css">
    <link rel="stylesheet" href="homepage.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>


<header>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="carrello.php">Carrello</a></li>
            <li><a href="AccountRedirect.php">account<?php //echo $_SESSION["nome"].$_SESSION["cognome"];
                                                        ?></a></li>
        </ul>
    </nav>
    <div class="search-bar">
        <form action="/ricerca.php" method="GET"> <!-- Aggiungi l'URL di destinazione per la pagina di ricerca PHP nel campo 'action' -->
            <input type="text" name="q" placeholder="Cerca prodotti..." /> <!-- Aggiungi il nome del campo di ricerca come 'q' e il placeholder desiderato -->
            <button type="submit">Cerca</button>
        </form>
    </div>
</header>

<body>






    <div class="container">

        <?php

            $id = $_GET["id"];
            $sql = "SELECT * from prodotto as p join foto as f on p.IdFoto=idf join categoria as c on p.IdCategoria=idc where p.id=" . $id;


            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                echo '<div class="row">';
                echo '<div class="col-md-6">';
                echo "<img src='" . $row["path"] . "' class='card-img-top' alt='Immagine prodotto' border='2px'>";
                echo '</div>';
                echo '<div class="col-md-6">';
                echo '<h1>' . $row["titolo"] . '</h1>';
                echo '<p>' . $row["descrizione"] . '</p>';

                echo '<p><strong>Prezzo: </strong>' . $row["prezzo"] . '€</p>';
                echo '<button type="button" class="btn btn-primary btn-lg">Aggiungi al carrello</button>';
                echo '</div>';
                echo '</div>';
                echo '<hr>';
                echo '<div class="row">';
                echo '<div class="col-md-12">';
                echo '<h3>Dettagli del prodotto</h3><ul>';
                echo '<li>Venditore: ' . $row["venditore"] . '</li>';
                echo '<li>Modello: ' . $row["titolo"] . '</li></ul></div></div><hr>';
                echo '<div class="row">';
                echo '<div class="col-md-12">';
                echo '<h3>Commenti</h3>';
                $sql2="SELECT * from commento as c join utente as u on c.IdUtente=u.id join prodotto as p on c.IdProdotto =p.id where p.id= ".$id;
                $result = $conn->query($sql2);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<div class="table-responsive-sm">';
                            echo '<table class="table table-primary">';
                            echo '<tbody><tr class="">';
                            echo '<td scope="row">'.$row["nome"].'</td>';
                            echo '<td scope="row">'.$row["cognome"].'</td>';
                            echo '<td scope="row">'.$row["stelle"].'</td>';
                            echo '<td scope="row">'.$row["text"].'</td>';
                            echo '</tr></tbody></table></div>';

                            
                        }

                    }else{
                        echo '<p>Ancora nessun commento...</p>';
                    }


                echo '<a href="addCommento.php?idprodotto='.$row["id"].'"class="button">Scrivi un commento...</a>';
                	

            }
        } else echo "ERRORE";






        ?>
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>