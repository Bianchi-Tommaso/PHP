<?php 
error_reporting(0);
$avvio = $_POST["avvio"];

session_start();

if($avvio == null)
{
    
    $turno = 1;
    $fiammiferi = 13;
    
    $_SESSION["fiammiferi"] = $fiammiferi;
    $_SESSION["nomeGiocatore"] = $_POST["nomeGiocatore"];
    $_SESSION["turno"] = $turno;

    echo"
     <h1> Gioco Dei Fiammiferi </h1>
        <br>

        <p> Giocatore: $_SESSION[nomeGiocatore] </p>
        <p> Turni: $turno </p>";
}
else
{
    $_SESSION["fiammiferi"] -= $_POST["quantitaFiammiferoGiocatore"];

    

    echo"
     <h1> Gioco Dei Fiammiferi </h1>
        <br>

        <p> Giocatore: $_SESSION[nomeGiocatore] </p>
        <p> Turni:" . $_SESSION["turno"]++ . "</p>
        <p> Hai Rimosso $_POST[quantitaFiammiferoGiocatore] Fiammiferi</p>";

        $mossaPc = 4 - $_POST["quantitaFiammiferoGiocatore"];

        $_SESSION["fiammiferi"] -= $mossaPc;    

        echo "<p> Il Pc Ha Rimosso " . $mossaPc . " Fiammiferi </p>";

        if($_SESSION["fiammiferi"]  == 1)
        {
            echo "
            <html> 
            <head>
            <link href = https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css rel = stylesheet integrity = sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC crossorigin = anonymous>
            <link rel= stylesheet href = ../css/css.css>
            </head>
            <title> Gioco Dei Fiammiferi </title>
            <body class = sfondoAzzurro>

            <img src = ../images/fiammiferi.jpg>  <br>
                        <a class = noLink href = ../index.php> <button  class = btn-success type = button> Ritenta </button></a>
                <script src = https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js integrity = sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM crossorigin = anonymous></script>
                <script src = https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js integrity = sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p crossorigin = anonymous ></script>
                <script src = https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js integrity = sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF crossorigin = anonymous></script>
            </body>
          </html>";
            session_destroy();
            exit();
            
        }
}


if($_SESSION["nomeGiocatore"] == null)
{
    session_destroy();

    echo "
    <html> 
    <head>
    <link href = https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css rel = stylesheet integrity = sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC crossorigin = anonymous>
    <link rel= stylesheet href = ../css/css.css>
    </head>
    <title> Gioco Dei Fiammiferi </title>
    <body class = sfondoAzzurro>
            <p> Il Nome Del Giocatore Deve Essere Inserito </p> 
                <a class = noLink href = ../index.php> <button  class = btn-success type = button> Inserisci Nome </button></a>
        <script src = https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js integrity = sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM crossorigin = anonymous></script>
        <script src = https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js integrity = sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p crossorigin = anonymous ></script>
        <script src = https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js integrity = sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF crossorigin = anonymous></script>
    </body>
  </html>";

    exit();
}




echo"<html>
    <head>
    <link href = https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css rel = stylesheet integrity = sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC crossorigin = anonymous>
    <link rel= stylesheet href = ../css/css.css>
    </head>
    <title> Gioco Dei Fiammiferi </title>
        <body class = sfondoAzzurro>";

        

        for($i = 0; $i < $_SESSION["fiammiferi"]; $i++)
        {
            echo"  <img src = ../images/fiammiferi.jpg>  ";
        }

      echo"
      <br> <p> Fiammiferi Rimasti: $_SESSION[fiammiferi] </p> <br>
        <form action = logica.php method = POST>

        <select name = quantitaFiammiferoGiocatore >
        <option value= 1>1</option>
        <option value= 2>2</option>
        <option value= 3>3</option>

  </select>

                <input type = submit value = Rimuovi>
                <input type = hidden value = 0 name = avvio>

        </form>

        <script src = https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js integrity = sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM crossorigin = anonymous></script>
        <script src = https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js integrity = sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p crossorigin = anonymous ></script>
        <script src = https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js integrity = sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF crossorigin = anonymous></script>
        </body>
</html>";

?>