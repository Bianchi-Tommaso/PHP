<?php

function OpenCon()
 {
    $nomeServer = "localhost";
    $nomeUtente = "root";
    $password = "";
    $nomeDatabase = "es8php";
    
    //Connessione Con Il DataBase
    
    $Connessione = new mysqli($nomeServer, $nomeUtente, $password, $nomeDatabase);
 
    return $Connessione;
 }
 
function CloseCon($Connessione)
 {
    $Connessione -> close();
 }

?>