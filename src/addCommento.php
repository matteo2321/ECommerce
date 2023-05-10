<?php
session_start();
include("Connection.php");
?>
<!DOCTYPE html>
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
    <title>Document</title>
</head>

<header>
        <nav>
            <ul>
                <div class="container mt-5">
                    <div class="row">
                        <div class="col">


                            <li><button class="btn" onclick="window.location.href = 'index.php?accessoricerca=0'">HOME</button></li>
                            <li><button class="btn" onclick="window.location.href = 'carrello.php'">CARRELLO</button></li>
                            <li><button class="btn" onclick="window.location.href = 'AccountRedirect.php'">
                                    <?php if (isset($_SESSION["id"])) {
                                        echo $_SESSION["nome"] . " " . $_SESSION["cognome"];
                                    } else {
                                        echo "Accedi";
                                    }

                                    ?></button></li>
                        </div>
                        <div class="col">
                            <div class="search-bar">
                                <form action="ricerca.php" method="GET">
                                    <input type="text" name="filtro" placeholder="Cerca prodotti..." /> 
                                    <button type="submit">Cerca</button>
                                </form>
                            </div>
                        </div>
            </ul>

        </nav>

    </header>


<body>
    <?php

    ?>
    <div class="container">
        <?php

        $id = $_GET["idprodotto"];
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
                echo '</div>';
                echo '</div>';
                echo '<hr>';
                echo '<div class="row">';
                echo '<div class="col-md-12">';
                echo '<h3>Dettagli del prodotto</h3><ul>';
                echo '<li>Venditore: ' . $row["venditore"] . '</li>';
                echo '<li>Modello: ' . $row["titolo"] . '</li></ul></div></div><hr>';
                echo "<h4>Scrivi cosa ne pensi di questo prodotto:</h4>";


            
        


                echo '<form action="ChkCommento.php"method="get">';
                $_SESSION["IdProdotto"]=$row["id"];
                ?>
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
                    <div class="text">
                        <textarea name="txt" cols="80" rows="5"></textarea>
                    </div>
                    <input type="submit" value="pubblica commento">
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