<?php 
      echo "<html>
                <head>
                    <link href=https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css rel=stylesheet integrity=sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC crossorigin=anonymous>
                    <link rel=stylesheet href=../css/css.css>
                </head>
                <title> Php con Database </title>
                <body class = sfondoAzzurro centro>";
            //error_reporting(0);

            include "../accessoDB/accessoDB.php";

            $Connessione = OpenCon();

            session_start();

            Stampa($Connessione->query(Richiesta( $_SESSION["idUtente"])));

            echo "<a class = noLink href = processo.html>  <button  class = btn-success type = button> Indietro </button> </a>";

            CloseCon($Connessione);

            function Stampa($risultato)
            {
                if ($risultato->num_rows > 0) 
                {
                    // output dati
                    echo "<table class = center>" . "<tr> <th> Nome Film </th> <th> Voto Film </th> </tr>";

                    while($row = $risultato->fetch_assoc()) 
                    {
                        echo "<tr> <td> " . $row["Film"]. "</td> <td>" . $row["Voto"]. "</td>";
                    }

                    echo "</table>";
                } 
                else 
                {
                    echo "0 risultati";
                }
            }

            function Richiesta($idUtente)
            {
                return "SELECT Film, Voto FROM raccoltafilm
                        WHERE idUtente = '$idUtente';";
            }  
?>