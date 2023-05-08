<?php
if(isset( $_SESSION["id"])){

    $sql = 'SELECT * from utente where id like "%' . $_SESSION["id"] . '%"';
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            if ($_SESSION["id"] == $row["ID"]) {    
                $_SESSION["id"]=$row["id"];
                $_SESSION["nome"]=$row["nome"];
                $_SESSION["cognome"]=$row["cognome"];
                $_SESSION["indirizzo"]=$row["indirizzo"];
                $_SESSION["email"]=$row["email"];
                $_SESSION["password"]=$row["password"];
                $_SESSION["admin"]=$row["admin"];
                
    
            }
    
        }
    
    }
