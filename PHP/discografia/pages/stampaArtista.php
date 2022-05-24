<?php 

require("../accessoDB/accessoDB.php");

echo "
<!DOCTYPE html>
<html>

    <head>

        <link href=https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css rel=stylesheet integrity=sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC crossorigin=anonymous>
        <link rel=stylesheet href=../css/css.css>
        <title> Discografia </title>

    </head>

        <body class = sfondoAzzurro centro>
        <table>
            <tr>
                <th>Titolo Album</th>
                <th>Data Pubblicazione</th>
                <th>Durata Album</th>
                <th>Immagine</th>
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

    $a = $_POST["artista"];
    
    $connessione = $DB->OpenCon();

    $queryArtista = "SELECT a.titolo_album, a.data_pubblicazione, a.durata_album, a.link FROM album a INNER JOIN musicista m ON m.id_gruppo = a.id_gruppo WHERE m.nome_artista = '$a';";

    $risultato = $connessione->query($queryArtista);


    while($artista = $risultato->fetch_assoc())
    {
        $s .= "<tr> <td>" . $artista["titolo_album"] . "</td><td> " . $artista["data_pubblicazione"] . "</td><td> " . $artista["durata_album"] . "</td><td> <img src=" . $artista["link"] . "width=150px; heigth=150px;></td></tr>";
    }

    return $s;
}

?>