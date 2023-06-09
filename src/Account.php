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



            <div class="row">


                <?php
                if ($admin == true) {
                    #admin part
                ?>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm">
                            <li><button class="btn" onclick="window.location.href = 'carrello.php'">CARRELLO</button></li>         
                            <li><button class="btn" onclick="window.location.href = 'AggiungiProdotto.php'">AGGIUNGI PRODOTTO</button></li>                            
                            <li><button class="btn" onclick="window.location.href = 'logout.php'">Log out</button></li>                            

                            </div>
                            <div class="col-sm">
                            </div>
                            <div class="col-sm">
                            </div>
                        </div>
                    </div>
                <?php
                } else {
                    ?>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm">
                            <li><button class="btn" onclick="window.location.href = 'carrello.php'">CARRELLO</button></li>         
                        
                            <li><button class="btn" onclick="window.location.href = 'logout.php'">Log out</button></li>                            
                   
                            </div>
                            <div class="col-sm">
                            </div>
                            <div class="col-sm">
                            </div>
                        </div>
                    </div>
                    <?php
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