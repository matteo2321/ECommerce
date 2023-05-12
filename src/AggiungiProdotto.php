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
    <div class="container">
        <h3 class="text-left">Aggiungi Prodotto:</h3>



        <div class="row">
            <div class="col">

                <form enctype="multipart/form-data" action="ChkAggiungi.php" method="get">
                    <br><label><strong>Titolo:</strong><br></label>
                    <br><input type="text" name="titolo" id="titolo" required>
                    <br><label><strong>Descrizione:</strong><br></label>
                    <br><textarea name="descrizione" rows="5" cols="80" required></textarea>
                    <br><label><strong>Venditore:</strong><br></label>
                    <br><input type="text" name="venditore" id="venditore" required>
                    <br><label><strong>Quantità:</strong><br></label>
                    <br><input type="number" name="quantita" id="quantita" required>
                    <br><label><strong>Prezzo:</strong><br></label>
                    <br><input type="number" name="prezzo" id="prezzo" required><br><br>
            </div>
            <div class="col">
                <br><label><strong>Foto:</strong><br></label>
                <br><input type="file" name="foto" id="foto" accept=".jpg,.png,.gif" required><br>
                <br>
                <br><label><strong>Categoria:</strong><br></label>

                <label>Selezionare la categoria, oppure crearne una nuova con l'area di testo sottostante.</label>
                <select class="form-select form-select-lg" name="categoria" id="categoria">
                    <?php
                    $sql = "SELECT * FROM categoria where 1";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<option value="' . $row["idc"] . '">' . $row["nome"] . '</option>';
                        }
                        echo '<option value="">Altro...</option>';
                    } else {
                        echo '<option value="">Nessuna categoria trovata</option>';
                    }
                    echo '</select>';
                    ?>
                    <br><label for="titolo"><strong>Nome categoria:</strong><br></label>

                    <br><input type="text" name="categoriapers" id="categoriapers"> 
                    <button type="button" onclick="InsertCategoriaPersonalizzata()"> &#9658; </button>


                    <script></script> 

            </div>
        </div>
        <div class="row">
            <div class="col-sm">
            </div>
            <div class="col-sm">
                <br><button type="submit" class="btn btn-primary">Confirm changes</button>
            </div>
            <div class="col-sm">
            </div>
        </div>
        </form>
    </div>



</body>
<script>
    function InsertCategoriaPersonalizzata() {
        
        categoria=encodeURIComponent(document.getElementById('categoriapers').value);
        $.ajax({
            url: "inserisci_categoria_pers.php",
            type:"GET",
            data:{categoriapers:categoria},
            dataType:"JSON",
            success:function(res){
                location.reload();
            },
            error:function(xhr,status,error){

            }
                

        })
    }

</script>

</html>