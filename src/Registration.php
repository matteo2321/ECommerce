<?php
include("connection.php");
?>

<html>

<head>
    <link rel="stylesheet" href="loginStyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
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

                    <label for="mail">email:</label>
                    <input type="mail" id="mail" name="mail" required>

                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>

                    <label for="indirizzo">Indirizzo di Spedizione:</label>
                    <input type="text" id="indirizzo" name="indirizzo" required>

                    <button type="submit">Registrati</button>
                </form>
                <a href="registrazione.php">
                    <h5>Se sei già registrato...</h5>
                </a>
            </div>
            <div class="col-sm-4"></div>

        </div>
    </div>

</body>

</html>