<?php 
//error_reporting(0);

if($_POST["Aggiungi"] == "Esci")
{
    session_destroy();
    header("Location:../index.html");   
    exit();
}

//Dati Per Accedere Al DataBase
$nomeServer = "localhost";
$nomeUtente = "root";
$password = "24659810";
$nomeDatabase = "es8php";

//Connessione Con Il DataBase

$Connessione = new mysqli($nomeServer, $nomeUtente, $password, $nomeDatabase);

//Controllo Connessione DataBase

if($Connessione->connect_error)
{
    die("Connessione Fallita: " . $Connessione->connect_error);
}

session_start();    //Lancio Della Sessione

//Raccolta Dati Dal Form

$_SESSION["nomeFilm"] = $_POST["nomeFilm"];
$_SESSION["voto"] = $_POST["voto"];

//Controllo Della Query

if ($Connessione->query(Inserisci($_SESSION["nomeFilm"], $_SESSION["voto"])) === TRUE)
 {
    echo "<html>
    <head>
        <link href=https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css rel=stylesheet integrity=sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC crossorigin=anonymous>
        <link rel=stylesheet href=../css/css.css>
    </head>
    <title> Php con Database </title>
    <body class = sfondoAzzurro centro> <p> Dati Inseriti Correttamente </p> 
    <script src=https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js integrity=sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM crossorigin=anonymous></script>
        <script src=https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js integrity=sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p crossorigin=anonymous></script>
        <script src=https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js integrity=sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF crossorigin=anonymous></script>
        </body>
        </html>";
 } 
 else 
 {
    echo "Errore Di Sintassi <br>";
 }

$Connessione->close();  //Chiusura Connessione


echo "<a class = noLink href = inserisci.php>  <button  class = btn-success type = button> Inserisci Nuovi Valori </button> </a>";


function Inserisci($FilmTitolo, $Voto)
{
    //Composizione Query
     return "INSERT INTO raccoltafilm (idFilm, Film, Voto)         
    VALUES (DEFAULT, '$FilmTitolo', $Voto);";

}

?>