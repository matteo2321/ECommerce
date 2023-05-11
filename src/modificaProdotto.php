<?php
session_start();
include("Connection.php");

if (isset($_SESSION["id"])) {
    $sqlControlloAdmin = "SELECT * FROM utente WHERE id=" . $_SESSION["id"];
    $resultControlloAdmin = $conn->query($sqlControlloAdmin);
    if ($resultControlloAdmin->num_rows > 0) {
        while ($rowControlloAdmin = $resultControlloAdmin->fetch_assoc()) {
            if ($rowControlloAdmin["admin"] == 1) {
                $admin = true;
            }
        }
    }
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

            </ul>

        </nav>

    </header>

    <body>
        <div class="container">
            <h3 class="text-center">Modifica:</h3>



            <div class="row">

                <?php
                $sql = 'SELECT * from prodotto as p join foto as f on p.IdFoto=idf join categoria as c on p.IdCategoria=idc  where id=' . $_GET["id"];
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $_SESSION["idModProdotto"]=$row["id"];
                        echo '<form action="ChkModifica.php" method="get">';
                        echo '<br><label for="titolo"><strong>Titolo:</strong><br>' . $row["titolo"] . '</label>';
                        echo '<br><input type="text" name="titolo" id="titolo">';
                        echo '<br><label for="descrizione"><strong>Descrizione:</strong><br>' . $row["descrizione"] . '</label>';
                        echo '<br><textarea name="descrizione" rows="5" cols="80"></textarea>';
                        echo '<br><label for="venditore"><strong>Venditore:</strong><br>' . $row["venditore"] . '</label>';
                        echo '<br><input type="text" name="venditore" id="venditore">';
                        echo '<br><label for="quantita"><strong>Quantità:</strong><br>' . $row["quantitaMag"] . '</label>';
                        echo '<br><input type="number" name="quantita" id="quantita">';
                        echo '<br><label for="prezzo"><strong>Prezzo:</strong><br>' . $row["prezzo"] . '</label>';
                        echo '<br><input type="number" name="prezzo" id="prezzo"><br><br>';
                        echo '<button type="submit" class="btn btn-primary">Confirm changes</button>';





                        echo '</form>';
                    }
                }
                ?>
            </div>
        </div>
    </body>

</html>