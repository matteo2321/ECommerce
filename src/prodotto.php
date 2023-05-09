<?php
session_start();
include("Connection.php");
?>
<html>

<head>
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
                <div class="container mt-5">
                    <div class="row">
                        <div class="col">


                            <li><div class="container" id="bottoni"><div class="center"><button id="bottoniveri" class="btn" onclick="window.location.href = 'index.php';">
                            <svg width="180px" height="60px" viewBox="0 0 180 60" class="border">
                                        <polyline points="179,1 179,59 1,59 1,1 179,1" class="bg-line" />
                                        <polyline points="179,1 179,59 1,59 1,1 179,1" class="hl-line" />
                                    </svg>
                                    <span>HOME</span></button></div></div></li>
                            <li><div class="container" id="bottoni"><div class="center"><button id="bottoniveri" class="btn" onclick="window.location.href = 'carrello.php';"><svg width="180px" height="60px" viewBox="0 0 180 60" class="border">
                                        <polyline points="179,1 179,59 1,59 1,1 179,1" class="bg-line" />
                                        <polyline points="179,1 179,59 1,59 1,1 179,1" class="hl-line" />
                                    </svg>
                                    <span>CARRELLO</span></button></div></div></li>
                            <li><div class="container" id="bottoni"><div class="center"><button id="bottoniveri" class="btn" onclick="window.location.href = 'AccountRedirect.php';"><svg width="180px" height="60px" viewBox="0 0 180 60" class="border">
                                        <polyline points="179,1 179,59 1,59 1,1 179,1" class="bg-line" />
                                        <polyline points="179,1 179,59 1,59 1,1 179,1" class="hl-line" />
                                    </svg>
                                    <span>
                                    <?php if (isset($_SESSION["id"])) {
                                        echo $_SESSION["nome"] . " " . $_SESSION["cognome"];
                                    } else {
                                        echo "Accedi";
                                    }

                                    ?></span></button></div></div></li>
                        </div>
                        <div class="col">
                            <div class="search-bar">
                                <form action="ricerca.php" method="GET"> 
                                    <input type="text" name="q" placeholder="Cerca prodotti..." /> <!-- Aggiungi il nome del campo di ricerca come 'q' e il placeholder desiderato -->
                                    <button type="submit">Cerca</button>
                                </form>
                            </div>
                        </div>
            </ul>

        </nav>

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
                echo '<a href="addCommento.php?idprodotto=' . $row["id"] . '"class="button">Scrivi un commento...</a>';
                echo '<br><br>';

                $sql2 = "SELECT * from commento as c join utente as u on c.IdUtente=u.id join prodotto as p on c.IdProdotto =p.id where p.id= " . $id;
                $result = $conn->query($sql2);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<div>';
                        echo '<table>';
                        echo '<tbody><tr>';
                        echo '<td>' . $row["nome"] . '</td>';
                        echo '<td>' . $row["cognome"] . '</td>';
                        echo '<td>';
                        for ($i = 0; $i < $row["stelle"]; $i++) {
                            echo "&#11088;";
                        }
                        echo "</td>";



                        echo '<td>' . $row["text"] . '</td>';
                        echo '</tr></tbody></table></div>';
                    }
                } else {
                    echo '<p>Ancora nessun commento...</p>';
                }
            }
        } else echo "ERRORE";






        ?>
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>