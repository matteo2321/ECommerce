<!DOCTYPE html>
<html lang="en">
<head>

    <title>Document</title>
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
                                <form action="/ricerca.php" method="GET"> <!-- Aggiungi l'URL di destinazione per la pagina di ricerca PHP nel campo 'action' -->
                                    <input type="text" name="q" placeholder="Cerca prodotti..." /> <!-- Aggiungi il nome del campo di ricerca come 'q' e il placeholder desiderato -->
                                    <button type="submit">Cerca</button>
                                </form>
                            </div>
                        </div>
            </ul>

        </nav>

    </header>
<body>
    
</body>
</html>