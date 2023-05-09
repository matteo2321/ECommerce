<?php
session_start();
include("Connection.php");
?>
<!DOCTYPE html>
<html lang="en">

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
    <title>Document</title>
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
    <?php

    ?>
    <div class="container">
        <div class="row">

            <?php

            $idprodotto = $_GET["idprodotto"];
            $idutente = $_SESSION["id"];


            $sql = "SELECT * from prodotto as p join foto as f on p.IdFoto=idf join categoria as c on p.IdCategoria=idc where p.id=" . $idprodotto;
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="col-md-6">';
                    echo '<img src="' . $row["path"] . '" class="img-fluid rounded-top" alt="">';
                    echo "</div>";
                    echo '<div class="col-md-6">';
                    echo "<h3>" . $row["titolo"] . "</h3>";
                    echo "<p>" . $row["descrizione"] . "</p>";
                    echo "</div>";
                    echo "<h4>Scrivi cosa ne pensi di questo prodotto:</h4>";



            ?>


                    <form action="ChkCommento.php" method="get">
                        <div class="rating">
                            <input type="radio" id="star5" name="rating" value="5" />
                            <label for="star5" title="5 stars"></label>
                            <input type="radio" id="star4" name="rating" value="4" />
                            <label for="star4" title="4 stars"></label>
                            <input type="radio" id="star3" name="rating" value="3" />
                            <label for="star3" title="3 stars"></label>
                            <input type="radio" id="star2" name="rating" value="2" />
                            <label for="star2" title="2 stars"></label>
                            <input type="radio" id="star1" name="rating" value="1" />
                            <label for="star1" title="1 star"></label>
                        </div>
                    </form>











            <?php

                }
            }
            ?>

        </div>
    </div>


    </div>



</body>

</html>