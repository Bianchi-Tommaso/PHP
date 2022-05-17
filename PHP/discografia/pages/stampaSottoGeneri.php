<?php 

require("../accessoDB/accessoDB.php");

echo "
<!DOCTYPE html>
<html>

    <head>

        <link href=https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css rel=stylesheet integrity=sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC crossorigin=anonymous>
        <link rel=stylesheet href=css/css.css>
        <title> Discografia </title>

    </head>

        <body class = sfondoAzzurro centro>
        <table>
            <tr>
                <th>Nome Genere</th>
            </tr>

       " . Stampa() . "

       </table>

        <script src=https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js integrity=sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM crossorigin=anonymous></script>
        <script src=https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js integrity=sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p crossorigin=anonymous></script>
        <script src=https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js integrity=sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF crossorigin=anonymous></script>
        </body>
</html>";


function Stampa()
{
    $DB = new accessoDB();

    $s = "";
    
    $connessione = $DB->OpenCon();

    $querySottoGenere = "SELECT s.nome_sottogenere FROM genere g INNER JOIN sottogeneri s ON s.id_genere = g.id_genere WHERE g.nome_genere = '$_POST[genere]';";

    $risultato = $connessione->query($querySottoGenere);


    while($classifica = $risultato->fetch_assoc())
    {
        $s .= "<tr> <td> " . $classifica["nome_sottogenere"] . "</td></tr>" ;
    }

    return $s;
}

?>