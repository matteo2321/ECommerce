<?php

//pop up
    echo "<script>alert('I am an alert box!');</script>";

    //JAVASCRIPT
    //let person = prompt("Please enter your name", "Harry Potter");
    //let text;
    //if (person == null || person == "") {
    //  text = "User cancelled the prompt.";
    //} else {
    //  text = "Hello " + person + "! How are you today?";
    //}


//CLASSIC READ FROM DB
    //<?php
    //session_start();
    //include("connessioni.php");
    //$msg="";
    //$user = $_POST["us"];
    //$psw = md5($_POST["pass"]);
    //$query = "SELECT * FROM utente WHERE password=? and username=?";
    //$stmt = $conn->prepare($query);
    //$stmt->bind_param("ss", $psw, $user);
        //
    //$stmt->execute();
    //$result=$stmt->get_result();
    //$stmt->close();
        //
    //if ($result->num_rows > 0) 
    //{
    //  while($row = $result->fetch_assoc())
    //  {
    //    $_SESSION["us"] = $user;
    //    $_SESSION["pass"] = $psw;
    //    header("location: home.php");    
    //  } 
    //} else{
    //  $msg.="wrong login";
    //
    //  if(isset($msg))
    //    header("location:index.php?msg=".$msg);
    //}

//CLASSIC WRITE ON DB
 
        //incoming data from register form
        //$username="nome";
        //$password="password";

        //$stmt=$mtsqli->prepare("INSERT INTO tabella(username, password) VALUES(?,?)");
        //$stmt->bind_param("ss", $username,$password);
        //$stmt->execute();
        
        //$username="nome2";
        //$password="password2";
        //$stmt->execute();
















?>