<?php

require ("Clienti.php");

if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $backend = new Clienti($_POST["Nome"], $_POST["codiceFiscale"],$_POST["indirizzo"], $_POST["email"], $_POST["cellulare"], $_POST["telefono"], $_POST["iban"], $_POST["localita"], $_POST["citta"], $_POST["provincia"], $_POST["gender"], $_POST["Nome"]);

    $backend->POST();

   header("Location:")
}

?>