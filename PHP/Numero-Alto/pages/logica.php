<?php 

error_reporting(0);

$avvio = $_POST["avvio"];
$turno = 0;
$min = 1;
$max = 9;

session_start();

if($avvio == null)
{
    $nomeGiocatore = $_POST["nomeGiocatore"];
    $turno = 1;

    $_SESSION["nomeGiocatore"] = $nomeGiocatore;
    $_SESSION["turno"] = $turno;
    $_SESSION["vittoria-pc"] = 0;
    $_SESSION["vittoria-giocatore"] = 0;
}
else
{
    $numeroScelto = $_POST["numero"];
    $_SESSION["turno"]++;
    $numeroPc = rand($min, $max);

    if($_SESSION["vittoria-giocatore"] == 3)
    {
        echo "
            <html>
                <head>
                    <link href= https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css rel=stylesheet integrity=sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC crossorigin=anonymous>
                    <link rel= stylesheet href=../css/css.css>
                    </head>
                    <title>Gioco Numero Piu Alto</title>
                        <body class = sfondoAzzurro>

                        
                                    <p class = h4> Complimenti $_SESSION[nomeGiocatore] Hai Vinto In $_SESSION[turno]</p>

                                    <a class = noLink href = ../index.html>  <button  class = btn-success type = button> Rigioca </button> </a>



                                <script src= https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js integrity= sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM  crossorigin= anonymous ></script>
                                <script src= https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js  integrity= sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p  crossorigin= anonymous ></script>
                                <script src= https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js integrity= sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF crossorigin= anonymous ></script>
                        </body>
                    </html>";

                    session_destroy();
        exit();
    }
    
    else if($_SESSION["vittoria-pc"] == 3)
    {
        echo "
        <html>
            <head>
                <link href= https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css rel=stylesheet integrity=sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC crossorigin=anonymous>
                <link rel=stylesheet href=../css/css.css >
                </head>
                <title>Gioco Numero Piu Alto</title>
                    <body class = sfondoAzzurro>

                                <p class = h4> Hai Perso $_SESSION[nomeGiocatore], Il Pc Ha Vinto In $_SESSION[turno]</p>

                                <a class = noLink href = ../index.html>  <button  class = btn-danger type = button> Rigioca </button> </a>



<script src= https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js integrity= sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM  crossorigin= anonymous ></script>
<script src= https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js  integrity= sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p  crossorigin= anonymous ></script>
<script src= https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js integrity= sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF crossorigin= anonymous ></script>
</body>
</html>";

session_destroy();
    exit();
    }

}

echo "
<html>
<head>
<link href= https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css rel=stylesheet integrity=sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC crossorigin=anonymous>
<link rel=stylesheet href=../css/css.css >
</head>
<title>Gioco Numero Più Alto</title>
    <body class = sfondoAzzurro>

    <h1> Gioco Del Numero Piu Alto </h1>";

    if($numeroPc == $numeroScelto || $numeroPc + 1 == $numeroScelto && $avvio != null)
    {
        $_SESSION["vittoria-giocatore"]++;

      

        echo "<h2> Hai Vinto Questo Turno <h3>";
    }
    else if($avvio != null)
    {
        $_SESSION["vittoria-pc"]++;

        echo "<h2> Hai Perso Questo Turno <h3>";
    }

    echo"
    <p> Nome: $_SESSION[nomeGiocatore] </p>
    <p> Turno: $_SESSION[turno] </p>
    <p> Numero Giocato: $numeroScelto </p>
    <p> Numero Computer Giocato: $numeroPc </p>

    <form action = logica.php  method = POST>

    <select name = numero >
        <option value= 1>1</option>
        <option value= 2>2</option>
        <option value= 3>3</option>
        <option value= 4>4</option>
        <option value= 5>5</option>
        <option value= 6>6</option>
        <option value= 7>7</option>
        <option value= 8>8</option>
        <option value= 9>9</option>
  </select>
        <input type = submit  value = Gioca>
        <input type= hidden name = avvio value = 0>
    </form>


    <script src= https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js integrity= sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM  crossorigin= anonymous ></script>
    <script src= https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js  integrity= sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p  crossorigin= anonymous ></script>
    <script src= https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js integrity= sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF crossorigin= anonymous ></script>
    </body>
</html>"

?>

