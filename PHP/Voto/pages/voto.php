<?php

require("../accessoDB/accessoDB.php");

session_start();

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
       La terza fase del voto consiste nel confermare il voto
    </div>

    <div class=bordo>
        <small>Qui sotto riepilogato la sua scelta del voto</small>
    </div>

    <div class=bordo>

            Lista: $_SESSION[partito]
            Candidato: $_SESSION[nome] " . " $_SESSION[cognome]

    </div>

    <div class=bordo>
    <a href = conferma.php>  <button  class = btn-success type = button> Conferma </button> </a>
    </div>

    <div class=bordo>
    <a href = ../index.html>  <button  class = btn-success type = button> Annulla </button> </a>
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

?>