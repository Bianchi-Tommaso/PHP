<?php 
      echo "<html>
                <head>
                    <link href=https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css rel=stylesheet integrity=sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC crossorigin=anonymous>
                    <link rel=stylesheet href=../css/css.css>
                </head>
                <title> Php con Database </title>
                <body class = sfondoAzzurro centro>";
            //error_reporting(0);

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

        Stampa($Connessione->query(Richiesta()));
        
        Stampa1($Connessione->query(Richiesta1()));

        Stampa2($Connessione->query(Richiesta2()));

        
        $Connessione->close();  //Chiusura Connessione

        

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

        function Stampa1($risultato)
        {
            if ($risultato->num_rows > 0) 
            {
                // output dati
                echo "<table class = center>" . "<tr> <th> Nome Film </th> <th> Media Film </th> </tr>";

                while($row = $risultato->fetch_assoc()) 
                {
                    echo "<tr> <td> " . $row["Film"]. "</td> <td>" . $row["MediaFilm"]. "</td> ";
                }

                echo "</table>";
            } 
            else 
            {
                echo "0 risultati";
            }
        }

        function Stampa2($risultato)
        {
            if ($risultato->num_rows > 0) 
            {
                // output dati
                echo "<table class = center>" . "<tr> <th> Voto Film Media Massima </th> </tr>";

                while($row = $risultato->fetch_assoc()) 
                {
                    echo "<tr> <td> " . $row["VotoMassimo"]. "</td> </tr>";
                }

                echo "</table>";
            } 
            else 
            {
                echo "0 risultati";
            }
        }

        function Richiesta()
        {
            return "SELECT Film, Voto FROM raccoltafilm;";
        }   

        function Richiesta1()
        {
            return "SELECT Film, ROUND(AVG(Voto)) AS MediaFilm FROM raccoltafilm
            GROUP BY Film;";
        }

        function Richiesta2()
        {
            return "SELECT MAX(MediaVoto) AS VotoMassimo
            FROM (SELECT AVG(r.Voto) AS MediaVoto FROM raccoltafilm r GROUP BY r.Film
            )mediaMassima;";
        }
        echo "<a class = noLink href = ../index.html>  <button  class = btn-success type = button> Indietro </button> </a>
        <script src=https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js integrity=sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM crossorigin=anonymous></script>
        <script src=https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js integrity=sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p crossorigin=anonymous></script>
        <script src=https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js integrity=sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF crossorigin=anonymous></script>
        </body>
        </html>";
        ?>
            
