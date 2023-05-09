<?php
include("Connection.php");
?>

<html>

<head>
    <link rel="stylesheet" href="loginStyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-md-4 text-center">

                <!-- Login Form -->
                <h2>Registrazione Utente</h2>
                <form action="ChkRegistration.php" method="post">
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome" required>

                    <label for="cognome">Cognome:</label>
                    <input type="text" id="cognome" name="cognome" required>

                    <label for="email">email:</label>
                    <input type="email" id="email" name="email" required>

                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>

                    <label for="indirizzo">Indirizzo di Spedizione:</label>
                    <input type="text" id="indirizzo" name="indirizzo" required>

                    <button type="submit">Registrati</button>
                </form>
                
            </div>
            <div class="col-sm-4"></div>

        </div>
    </div>

</body>

</html>