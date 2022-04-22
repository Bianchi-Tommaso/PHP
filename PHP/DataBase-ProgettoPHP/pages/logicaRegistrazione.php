<?php

require ("ClientiProprietari.php");
$codiceFiscale, $nome, $indirizzo, $cap, $localita, $citta, $provincia, $nomeUtente, $password, $telefono, $cellulare, $email, $iban
    $backend = new ClientiProprietari( $_POST["codiceFiscale"], $_POST["Nome"],$_POST["indirizzo"], $_POST["cap"]. $_POST["localita"], $_POST["citta"], $_POST["provincia"], $_POST["nomeUtente"], $_POST["password"], $_POST["telefono"], $_POST["cellulare"], $_POST["email"], $_POST["iban"], $_POST["gender"]);

    if(!$backend->Registrazione())
    {
        header("Location:accedi.html");
    }
    else
    {
        echo "Utente Gia Registrato";
        exit();
        header("Location:../index.html");
    }

?>