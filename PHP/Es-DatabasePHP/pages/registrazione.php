<?php

//if(isset($_POST["Nome"]) && isset($_POST["Cognome"]) && isset($_POST["dataDiNascita"]) && isset($_POST["Genere"]) && isset($_POST["Email"]) && isset($_POST["Password"]))
//{
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

$Nome = $_POST["Nome"];
$Cognome =  $_POST["Cognome"];
$dataDiNascita = $_POST["dataDiNascita"];
$Genere = $_POST["Genere"];
$Email = $_POST["Email"];
$Password = $_POST["Password"];

echo $Nome;
echo $Cognome;
echo $dataDiNascita;
echo $Genere;
echo $Email;
echo $Password;

$queryDatiAnagrafici = "INSERT INTO datiAnagrafici (idDati, Nome, Cognome, Sesso, AnnoDiNascita)         
VALUES (DEFAULT, '$Nome', '$Cognome', '$Genere', '$dataDiNascita');";

$queryDatiUtente = "INSERT INTO datiLogin(idUtente, Email, Password, idDati)
VALUES (DEFAULT, '$Email', '$Password', DEFAULT);";

if($Connessione->query($queryDatiAnagrafici) === TRUE)
{
  echo "OK Dati Anagrafici";
}
else
{
  echo "Errore Dati Anagrafici";
}

if($Connessione->query($queryDatiUtente) === TRUE)
{
  echo "OK Dati Utente";
}
else
{
  echo "Errore Dati Utente";
}
//}
?>