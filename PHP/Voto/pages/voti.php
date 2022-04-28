<?php

require("../accessoDB/accessoDB.php");

echo "<html>
<head>
<title>Sistema Elettorale</title>
<link href= https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css rel=stylesheet integrity=sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC crossorigin=anonymous>
    <script src=../js/js.js></script>
    
  <link rel=stylesheet href=../css/css.css>
</head>
<body class=centro>

<h1 class = centro>Classifica</h1> 

<table>
  <tr>
    <th>LISTA</th>
    <th>VOTO</th>
    <th>%</th>
    <th></th>
  </tr>

  ".  Classifica() ."

</table>

<br>

<div class=bordo>
    <a href = ../index.html>  <button  class = btn-success type = button> Indieti </button> </a>
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


function Classifica()
{
 
    $DB = new accessoDB();

    $s = "";
    
    $connessione = $DB->OpenCon();

    $queryPartito = "SELECT p.nomePartito AS lista, c.voto,  ROUND((c.voto / (SELECT SUM(c.voto) FROM candidato c) * 100), 2) AS '%' FROM partito p iNNER JOIN candidato c ON p.codicePartito = c.codicePartito;";

    $risultato = $connessione->query($queryPartito);


    while($classifica = $risultato->fetch_assoc())
    {
        $s .= "<tr> <td> " . $classifica["lista"] . "</td> <td> " . $classifica["voto"] . "</td> <td> " . $classifica["%"] . "</td> <td> <div class=barra style=height:10px;width:".$classifica["%"]."%></div> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</></td> </tr>" ;
    }

    return $s;

}

?>