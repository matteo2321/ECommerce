<?php
session_start();
include("Connection.php");
if (!isset($_SESSION["id"])) {

    header("location: Login.php");//non hai settato nella sessione il tuo id 
}
else{
$sql = 'SELECT * from utente where id = '. $_SESSION["id"];//ha settato il suo session id, adesso controllo se si trova un record nel database
    $result = $conn->query($sql);
    if ($result->num_rows < 0) {//non ha trovato record corrispondenti 
        header("location: Login.php");
    }
    else{//lo ha trovato quindi salva il suo utente nella sessione 
        while ($row = $result->fetch_assoc()) {
            if ($_SESSION["id"] == $row["id"]) {
                $_SESSION["id"]=$row["id"];
                header("location: Account.php");
            }
        }

 

    }

}
?>