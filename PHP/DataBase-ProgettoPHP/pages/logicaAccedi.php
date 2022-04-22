<?php

require ("ClientiProprietari.php");

    $backend = new Clienti();
    $backend->Accedi($_POST["emai"]. $_POST["password"]);

    header("Location:accedi.html");

?>