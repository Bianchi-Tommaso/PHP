<?php

if(isset($_POST["Nome"]) && isset($_POST["Cognome"]) && isset($_POST["dataDiNascita"]) && isset($_POST["Genere"]) && isset($_POST["Email"]) && isset($_POST["Password"]))
{

  include "../accessoDB/accessoDB.php";

  $Connessione = OpenCon();

$Nome = $_POST["Nome"];
$Cognome =  $_POST["Cognome"];
$dataDiNascita = $_POST["dataDiNascita"];
$Genere = $_POST["Genere"];
$Email = $_POST["Email"];
$Password = $_POST["Password"];

$id = "";

echo $Nome;
echo $Cognome;
echo $dataDiNascita;
echo $Genere;
echo $Email;
echo $Password;

$queryDatiAnagrafici = "INSERT INTO datiAnagrafici ( Nome, Cognome, Sesso, AnnoDiNascita)         
VALUES ('$Nome', '$Cognome', '$Genere', '$dataDiNascita');";

$queryidAnagrafici = "SELECT idDati FROM datiAnagrafici ORDER BY idDati DESC LIMIT 1";

if($Connessione->query($queryDatiAnagrafici) === TRUE)
{
  echo "<br> OK Dati Anagrafici <br>";
}
else
{
  echo "<br> Errore Dati Anagrafici: " . $Connessione->error . "<br>";
}
$Connessione->query($queryidAnagrafici);

if($Connessione->affected_rows == 1)
{
  echo "<br> OK ID Dati Anagrafici <br>";
  $r = $Connessione->query($queryidAnagrafici);
  $id = $r->fetch_assoc();
  $id1 = $id['idDati'];
}
else
{
  echo "<br> Errore GET ID Dati Anagrafici: " . $Connessione->error . "<br>";
}

$queryDatiUtente = "INSERT INTO datiLogin(Email, Password, idDati)
VALUES ('$Email', '$Password', '$id1');";



if($Connessione->query($queryDatiUtente) === TRUE)
{
  echo "<br> OK Dati Utente <br>";
}
else
{
  echo "<br> Errore Dati Utente: " . $Connessione->error . "<br>";
}

header("Location:login.html");
}

CloseCon($Connessione);
?>