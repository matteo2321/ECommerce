<?php
if (!isset($_SESSION["id"])) {
    header("location: Registration.php");//non hai mai settato nella sessione il tuo id 
}
else{
$sql = 'SELECT * from utenti where id like "%' . $_SESSION["id"] . '%"';//ha settato il suo session id, adesso controllo se si trova un record nel database
    $result = $conn->query($sql);
    if ($result->num_rows < 0) {//non ha trovato record corrispondenti 
        header("location: Registration.php");
    }
    else{//lo ha trovato quindi salva il suo utente nella sessione 
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
?>