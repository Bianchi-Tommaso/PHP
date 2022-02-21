<?php

include "../accessoDB/accessoDB.php";

$Connessione = OpenCon();

    $query = "DELETE FROM raccoltafilm";

    //Controllo Connessione DataBase

    if($Connessione->connect_error)
    {
        die("Connessione Fallita: " . $Connessione->connect_error);
    }

    $Connessione->query($query);

    CloseCon($Connessione);

    header("Location:processo.html"); 
?>