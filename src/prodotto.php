<?php
session_start();
include("Connection.php");

?>
<html>

<head>
    <link rel="stylesheet" href="styles\prodotto.css">

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
    <div class="container">
    <br><br>
        <?php

        $id = $_GET["id"];
        $sql = "SELECT * from prodotto as p join foto as f on p.IdFoto=idf join categoria as c on p.IdCategoria=idc where p.id=" . $id;

                                   
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="row">';
                echo '<div class="col-md-6">';
                echo "<img id='imgcard' src='" . $row["path"] . "' class='card-img-top' alt='Immagine prodotto' border='2px'>";
                echo '</div>';
                echo '<div class="col-md-6">';
                echo '<h1>' . $row["titolo"] . '</h1>';
                echo '<p>' . $row["descrizione"] . '</p>';

                echo '<h4><strong>Prezzo: </strong>' . $row["prezzo"] . '€</h4>';
                echo "<form action='ChkCarrello.php' method='get'>";
                echo '<label for="quantita">seleziona quantita</label><br>';
                echo '<input type="number" name="quantita" id="quantita" required><br><br>';
                $_SESSION["idProdCarrello"]=$row["id"];
                echo "<input class='btn btn-primary btn-lg' type='submit' value='Aggiungi al carrello'>";
                echo '</div>';
                echo '</div>';
                echo '</form>';
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
                    echo '<div>';
                        echo '<table id="commenti">';
                        echo '<thead><tr><th>Nome</th>';
                        echo '<th>Cognome</th>';
                        echo '<th>Stelle</th>';
                        echo '<th>Descrizione</th></tr></thead><tbody>';
                    while ($row = $result->fetch_assoc()) {
                        

                        echo '<tr>';
                        echo '<td>' . $row["nome"] . '</td>';
                        echo '<td>' . $row["cognome"] . '</td>';
                        echo '<td>';
                        for ($i = 0; $i < $row["stelle"]; $i++) {
                            echo "&#11088;";
                        }
                        echo "</td>";



                        echo '<td>' . $row["text"] . '</td>';
                        echo '</tr>';
                    }
                    echo '</tbody></table></div>';
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