<?php
session_start();
?>

<html>

<head>
  <link rel="stylesheet" href="styleForm.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-md-4 text-center">

                <!-- Login Form -->
                <h2>Login</h2>
                <form action="ChkLogin.php" method="post">
                    <label for="mail">email:</label>
                    <input type="mail" id="mail" name="mail" required>

                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>

                    <button type="submit">Registrati</button>
                </form>
            </div>
            <div class="col-sm-4"></div>

        </div>
    </div>

</body>


</html>