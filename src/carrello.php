<?php
session_start();
include("Connection.php");

  



?>
<html>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Carrello</title>
    <link rel="stylesheet" href="styles\homepage.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

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
                        
            </ul>

        </nav>

    </header>
<body>
    <div class="container">
    <div class="row">


    <?php
    $data=date("Y-m-d");
    $idutente=$_SESSION['id'];

    $ricercaCarrelli = "SELECT * from carrello where IdUtente=".$idutente." AND data='".$data."'";
    $resultricercaCarrelli = $conn->query($ricercaCarrelli);
    if ($resultricercaCarrelli->num_rows > 0) {
        
        while ($rowricercaCarrelli = $resultricercaCarrelli->fetch_assoc()) {
            $idcarrello=$rowricercaCarrelli["id"];
            $prodottiCarrello="SELECT * from contiene as c join prodotto as p on c.IdProdotto=p.id join foto on p.IdFoto=idf join categoria on p.IdCategoria=idc where c.IdCarrello=".$idcarrello;
            $resultricercaProdotti = $conn->query($prodottiCarrello);
            if ($resultricercaProdotti->num_rows>0) {
                while ($rowricercaProdotti = $resultricercaProdotti->fetch_assoc()) {
                    echo "<div class='col-xl-4'>";
                        echo "<div id='divcard' class='card mb-4 box-shadow'>";
                            echo "<img id='imgcard' class='card-img-top' src='" . $rowricercaProdotti["path"] . "' alt='" . $rowricercaProdotti["titolo"] . "'>";
                            echo "<div class='card-body'>";
                                echo "<h4>" . $rowricercaProdotti["titolo"] . "</h4>";
                                echo "<div class='d-flex justify-content-between align-items-center'>";
                                    echo "<h4 class='card-price'>" . $rowricercaProdotti["prezzo"] . "€</h4>";
                                    echo "<div class='btn-group'>";
                                        echo "<a id='acquista' href='prodotto.php?id=" . $rowricercaProdotti["id"] . "' class='btn btn-sm btn-outline-secondary'>Acquista</a>";
                                    echo "</div>";
                                echo "</div>";
                            echo "</div>";
                        echo "</div>";
                    echo "</div>";
            

                }
            }else{
                echo "non ci sono prodotti";


            }

            
    
    
    
    
    
    
        }}else{
            echo "<div class='d-flex justify-content-between align-items-center'>";
            echo "<h4 >Carrello vuoto</h4>";
            echo "</div>";    
        }
    
    
    
    ?>
    </div>
    </div>
    
</body>
</html> 