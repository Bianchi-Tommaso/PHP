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
    echo "Dati Inseriti Correttamente";
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