<!DOCTYPE html>
<?php
session_start();
include("Connection.php");

$filtroUser = "";


if (isset($_POST["filtroUser"])) {
    $filtroUser = $_POST["filtroUser"];
}
?>

<html>

<head>
    <title>ECommerce</title>
    <link rel="stylesheet" href="homepage.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="#">Carrello</a></li>
                <li><a href="AccountRedirect.php">
                    <?php if (isset($_SESSION["id"])) {
                        echo $_SESSION["nome"].$_SESSION["cognome"];
                    }
                    else{
                        echo "Accedi";
                    }
                    
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
    <div class="banner">
        <div class="bs-example">
            <div id="carousel-example-captions" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <?php
                    $sql = 'SELECT * from prodotto as p join foto as f on p.IdFoto=idf join categoria as c on p.IdCategoria=idc  where 1';
                    $result = $conn->query($sql);
                    $rows = $result->fetch_all(MYSQLI_ASSOC);
                    foreach ($rows as $key => $row) {
                    ?>
                        <div class="item<?php if ($key == 0) {
                                            echo " active";
                                        } ?>">
                            <a href="">
                                <img style="height: 400px; width: 400px;" alt="First slide image" src="<?php echo $row['path']; ?>" />
                            </a>
                            <div class="finlay-carousel-caption">
                                <h3><?php echo $row['titolo']; ?></h3>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                    <ol class="carousel-indicators">
                    <?php foreach ($rows as $key => $row) { ?>
                    <li data-target="#carousel-example-captions" data-slide-to="<?php echo $key; ?>" <?php if ($key == 0) { echo "class='active'"; } ?>></li>
                    <?php } ?>
                    </ol>
                </div>
            </div>
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
        <script>
            var slides = document.querySelectorAll('#banner .slide');
            var currentSlide = 0;
            var slideInterval = setInterval(nextSlide, 3000);

            function nextSlide() {
                slides[currentSlide].classList.remove('active');
                currentSlide = (currentSlide + 1) % slides.length;
                slides[currentSlide].classList.add('active');
            }
        </script>
</body>

</html>