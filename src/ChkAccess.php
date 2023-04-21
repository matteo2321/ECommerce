<?php
if(isset( $_SESSION["id"])){

    $sql = 'SELECT * from utenti where id like "%' . $_SESSION["id"] . '%"';
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            if ($_SESSION["id"] == $row["ID"]) {
                $_SESSION["id"]=$row["id"];
                $_SESSION["nome"]=$row["nome"];
                $_SESSION["cognome"]=$row["cognome"];
                $_SESSION["indirizzo"]=$row["indirizzo"];
                $_SESSION["mail"]=$row["mail"];
                $_SESSION["password"]=$row["password"];
                $_SESSION["admin"]=$row["admin"];
                $_SESSION["username"]=$row["username"];
                
    
            }
    
        }
    
    }
