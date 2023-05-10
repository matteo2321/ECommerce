<?php
session_start();
include("Connection.php");


if (isset($_SESSION["ricerca"])) {
    $filtroUser=$_SESSION["ricerca"];
}
?>

<html>

<head>
    <title>ECommerce</title>
    <link rel="stylesheet" href="styles\homepage.css">
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
    <div class="container">
        <h3 class="text-center">Prodotti</h3>



        <div class="row">


            <?php
            if ($filtroUser != "") {
                $sql = 'SELECT * from prodotto as p join foto as f on p.IdFoto=idf join categoria as c on p.IdCategoria=idc  where titolo like "%' . $filtroUser . '%" OR venditore like "%' . $filtroUser . '%"';
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='col-xl-4'>";
                        echo "<div  id='divcard' class='card mb-4 box-shadow'>";
                        echo "<img id='imgcard' class='card-img-top' src='" . $row["path"] . "' alt='" . $row["titolo"] . "'>";
                        echo "<div class='card-body'>";
                        echo "<h4>" . $row["titolo"] . "</h4>";
                        echo "<div class='d-flex justify-content-between align-items-center'>";
                        echo "<div class='btn-group'>";
                        echo "<a id='acquista' href='prodotto.php?id=" . $row["id"] . "' class='btn btn-sm btn-outline-secondary'>Acquista</a>";
                        echo "</div>";
                        echo "<h4 class='card-price'>" . $row["prezzo"] . "€</h4>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                    }
                }
            } else {
                $sql = 'SELECT * from prodotto as p join foto as f on p.IdFoto=idf join categoria as c on p.IdCategoria=idc  where 1';
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='col-xl-4'>";
                        echo "<div id='divcard' class='card mb-4 box-shadow'>";
                            echo "<img id='imgcard' class='card-img-top' src='" . $row["path"] . "' alt='" . $row["titolo"] . "'>";
                            echo "<div class='card-body'>";
                                echo "<h4>" . $row["titolo"] . "</h4>";
                                echo "<div class='d-flex justify-content-between align-items-center'>";
                                    echo "<h4 class='card-price'>" . $row["prezzo"] . "€</h4>";
                                    echo "<div class='btn-group'>";
                                        echo "<a id='acquista' href='prodotto.php?id=" . $row["id"] . "' class='btn btn-sm btn-outline-secondary'>Acquista</a>";
                                    echo "</div>";
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