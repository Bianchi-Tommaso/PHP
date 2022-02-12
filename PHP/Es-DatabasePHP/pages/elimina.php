<?php

//Dati Per Accedere Al DataBase
$nomeServer = "localhost";
$nomeUtente = "root";
$password = "24659810";
$nomeDatabase = "es8php";

    //Connessione Con Il DataBase

    $Connessione = new mysqli($nomeServer, $nomeUtente, $password, $nomeDatabase);

    $query = "DELETE FROM raccoltafilm";

    //Controllo Connessione DataBase

    if($Connessione->connect_error)
    {
        die("Connessione Fallita: " . $Connessione->connect_error);
    }

    $Connessione->query($query);

    $Connessione->close();  //Chiusura Connessione

    header("Location:../index.html"); 
?>