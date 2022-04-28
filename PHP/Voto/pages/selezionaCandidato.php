<?php

require("../accessoDB/accessoDB.php");

session_start();

$nomePartito = $_POST["partito"];

$_SESSION["partito"] = $nomePartito;

echo "<html>
<head>
<title>Sistema Elettorale</title>
<link href= https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css rel=stylesheet integrity=sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC crossorigin=anonymous>
    <script src=../js/js.js></script>
    
  <link rel=stylesheet href=../css/css.css>
</head>
<body class=centro>

<h1 class = centro>Seleziona Della Lista</h1>

<div class=bordo >
    <div class=bordo centro> 
        La prima fase del voto prevede la selezione della lista 
    </div>

    <div class=bordo>
        Scegli la lista a cui assegnare il SUO voto dell'elenco a comparsa qui sotto
        <small>Appena selezionata la lista, le verrà proposta l'elenco dei candidati per quella lista</small>
    </div>

    <div class=bordo>

    <form action=voto.php method=POST>
        <label>Selezionare la preferenza</label>

        <select name=candidato id=candidato onchange=scelta(../pages/voto.php)>" . Stampa() ."
        
        </select>

        <input type=submit value=Scegli>
        </form>
    </div>

</div>

<script src=https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js
    integrity=sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM
    crossorigin=anonymous></script>
  <script src=https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js
    integrity=sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p
    crossorigin=anonymous></script>
  <script src=https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js
    integrity=sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF
    crossorigin=anonymous></script>

</body>
</html>";

function Stampa()
{
    $DB = new accessoDB();

    $s = "";
    
    $connessione = $DB->OpenCon();

    $queryPartito = "SELECT c.nome, c.cognome FROM candidato c INNER JOIN partito p ON p.codicePartito = c.codicePartito WHERE p.nomePartito = '$_SESSION[partito]';";

    $risultato = $connessione->query($queryPartito);

    while($nomePartito = $risultato->fetch_array())
    {
        $s .= "<option value=". $nomePartito["nome"] . "-" . $nomePartito["cognome"] . ">" . $nomePartito["cognome"] . "-" . $nomePartito["nome"] . "</option>";

        $_SESSION["nome"] = $nomePartito["nome"]; 
        $_SESSION["cognome"] = $nomePartito["cognome"];     
    }

    return $s;
}

?>