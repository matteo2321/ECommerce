<!DOCTYPE html>
<?php
session_start();
include("Connection.php");


if (isset($_SESSION["ricerca"])) {
    $filtroUser=$_SESSION["ricerca"];
}
elseif ($_GET["accessoricerca"]==0) {
    $filtroUser="";
    
}
?>

<html>

<head>
    <title>ECommerce</title>
    <link rel="stylesheet" href="homepage.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

</head>

<body>

    <header>
        <nav>
            <ul>
                <div class="container mt-5">
                    <div class="row">
                        <div class="col">


                            <li><div class="container" id="bottoni"><div class="center"><button id="bottoniveri" class="btn" onclick="window.location.href = 'index.php?accessoricerca=0';">
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
                                    echo $_GET["accessoricerca"];

                                    ?></span></button></div></div></li>
                        </div>
                        <div class="col">
                            <div class="search-bar">
                                <form action="ricerca.php" method="GET"> <!-- Aggiungi l'URL di destinazione per la pagina di ricerca PHP nel campo 'action' -->
                                    <input type="text" name="filtro" placeholder="Cerca prodotti..." /> <!-- Aggiungi il nome del campo di ricerca come 'q' e il placeholder desiderato -->
                                    <button type="submit">Cerca</button>
                                </form>
                            </div>
                        </div>
            </ul>

        </nav>

    </header>
    <div class="banner">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <img class="slide" src="imm\lenovo_thinkbook_16.jpg" alt="Slide 1">
                    <div class="carousel-caption">
                        <h3>Slide 1</h3>
                        <p>Some text here</p>
                    </div>
                </div>

                <div class="item">
                    <img class="slide" src="imm\Logitech G203 LIGHTSYNC.jpg" alt="Slide 2">
                    <div class="carousel-caption">
                        <h3>Slide 2</h3>
                        <p>Some text here</p>
                    </div>
                </div>

                <div class="item">
                    <img class="slide" src="imm\Logitech MX Keys.jpg" alt="Slide 3">
                    <div class="carousel-caption">
                        <h3>Slide 3</h3>
                        <p>Some text here</p>
                    </div>
                </div>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <br>
    <div class="container">
        <h3 class="text-center">Altri Prodotti....</h3>



        <div class="row">


            <?php
            if ($filtroUser != "") {
                $sql = 'SELECT * from prodotto as p join foto as f on p.IdFoto=idf join categoria as c on p.IdCategoria=idc  where titolo like "%' . $filtroUser . '%" OR venditore like "%' . $filtroUser . '%"';
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='card mb-4 box-shadow'>";
                        echo "<img class='card-img-top' src='" . $row["path"] . "' alt='" . $row["titolo"] . "'>";
                        echo "<div class='card-body'>";
                        echo "<h3>" . $row["titolo"] . "</h3>";
                        echo "<p class='card-text'>" . $row["descrizione"] . "</p>";
                        echo "<div class='d-flex justify-content-between align-items-center'>";
                        echo "<div class='btn-group'>";
                        echo "<a href='prodotto.php?id=" . $row["id"] . "' class='btn btn-sm btn-outline-secondary'>Acquista</a>";
                        echo "</div>";
                        echo "<h4 class='card-price'>" . $row["prezzo"] . "€</h4>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                    }
                }
            } else {
                $sql = 'SELECT * from prodotto as p join foto as f on p.IdFoto=idf join categoria as c on p.IdCategoria=idc  where 1';
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='col-md-4'>";
                    echo "<div class='card mb-4 box-shadow'>";
                    echo "<img class='card-img-top' src='" . $row["path"] . "' alt='" . $row["titolo"] . "'>";
                    echo "<div class='card-body'>";
                    echo "<h3>" . $row["titolo"] . "</h3>";
                    echo "<p class='card-text'>" . $row["descrizione"] . "</p>";
                    echo "<div class='d-flex justify-content-between align-items-center'>";
                    echo "<div class='btn-group'>";
                    echo "<a href='prodotto.php?id=" . $row["id"] . "' class='btn btn-sm btn-outline-secondary'>Acquista</a>";
                    echo "</div>";
                    echo "<h4 class='card-price'>" . $row["prezzo"] . "€</h4>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                }
            }
            ?>






        </div>

        <footer>
            <p>ECommerce. Tutti i diritti riservati.</p>
        </footer>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>






</body>

</html>