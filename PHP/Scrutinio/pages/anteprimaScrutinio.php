<?php 
  error_reporting(0);
        $nomeStudente = $_POST["nomeStudente"];
        $sesso = $_POST["sesso"];
        $italiano = $_POST["italiano"];
        $matematica = $_POST["matematica"];
        $telecomunicazioni = $_POST["telecomunicazioni"];
        $informatica = $_POST["informatica"];
        $stringaGenerale;
        $stringaMateria = "";
        $stringaMateria1 = "";
        $stringaMateria2 = "";
        $stringaMateria3 = "";
        $conta = 0;

        session_start();
       
          if($italiano != null)
          {
            $conta++;
            $stringaMateria = $italiano;
          }
          
          if($matematica != null)
          {
            $conta++;
            $stringaMateria1 = $matematica;
          }

           if($telecomunicazioni != null)
          {
            $conta++;
            $stringaMateria2 = $telecomunicazioni;
          }

           if($informatica != null)
          {
            $conta++;
            $stringaMateria3 = $informatica;
          }

          if($conta < 3)
          {
            $stringaGenerale .= $nomeStudente . " ammesso\a con " . " " . $stringaMateria . " " . $stringaMateria1 . " " . $stringaMateria2 . " " . $stringaMateria3 . "<br>";
          }
          else
          {
            $stringaGenerale .= $nomeStudente . " Non Ammesso\a " . "<br>";
          }
        
          $_SESSION["stringaGenerale"] .= $stringaGenerale;

          echo $_SESSION["stringaGenerale"];

?> 

<!DOCTYPE html>
<html>

<head>
</head>
<title>Scrutinio</title>

<body>

  <form action="../index.php" method="POST">
    <input type="submit" value="Aggiungi">
  </form>

  <form action="scrutinioFinale.php" method="POST">
    <input type="submit" value="Termina Scrutinio">
  </form>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>