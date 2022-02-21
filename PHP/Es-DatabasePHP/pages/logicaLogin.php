<?php

include "../accessoDB/accessoDB.php";


$Connessione = OpenCon();

$email = $_POST["email"];
$password = $_POST["password"];

$queryControlloDati = "SELECT Email, Password, idUtente FROM datilogin
WHERE Email = '$email' AND Password = '$password';";

$Connessione->query($queryControlloDati);

if($Connessione->affected_rows == 1)
{
  echo "<br> OK Dati Login <br>";

  $Risultato = $Connessione->query($queryControlloDati);

  CloseCon($Connessione);

  $righe = $Risultato->fetch_array();

      if($righe["Email"] === $email && $righe["Password"] === $password)
      {
          
        session_start();    //Lancio Della Sessione

        $_SESSION["idUtente"] = $righe["idUtente"];  

          header("Location:processo.html");
      }
}
else
{
  echo "<br> Utente Multiplo O Dati Sbagliati" . $Connessione->error . "<br>";
  
}

?>