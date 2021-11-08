<html> 
    <head> 
        <title> Indovina Il Numero </title>
        <link rel="stylesheet" type="text/css" href="../css/css.css">
    </head> 
<body class = "centro">

<?php

    $inputUtente = $_POST["inputUtente"];
    $numeroGenerato = $_POST["numeroGenerato"];
    $tentativi = $_POST["tentativi"];
    $link_address = "../index.php";

    if($tentativi == 10 && $numeroGenerato != $inputUtente)
    {
        echo "<div class = " . 'formattazioneDiv' . "> <storng> Spiacente Hai Superato Il Numero Di Tentativi!! </strong> <br>
        Il Numero Generato Era: " . $numeroGenerato . "</div>"; 
        echo "<br> <button type= 'button'  class =  'bottoneRosso link'    > <a href= '../index.php' class= 'link'> Gioca Di Nuovo</a> </button>";
 
        exit();
    }

    if($inputUtente == $numeroGenerato)
    {
        echo "<div class = " . 'formattazioneDiv' . "> Complimenti Hai Indovinato Il Numero In " . $tentativi . " Tentativi </div>";
        echo "<br> <button type= 'button'  class =  'bottoneVerde'    > <a href= '../index.php' class= 'link'> Gioca Di Nuovo</a> </button>";
 
        exit();
    }
    else if($inputUtente < $numeroGenerato)
    {
        echo "<div class = " . 'formattazioneDiv' . "> Spiacente Hai Sbagliato!!!!! <br> Il Numero E Piu Grande </div>";
            $tentativi++;
    }
    else
    {
        echo "<div class = " . 'formattazioneDiv' . ">  Spiacente Hai Sbagliato!!!!!  <br> Il Numero E Piu Piccolo </div>";
            $tentativi++;   
    }

 

?>          

  <form action = "logica.php" method = "post">
        <input type="hidden" name = "numeroGenerato" value = "<?php echo $numeroGenerato ?>"> 
        <br>
        <p class = "noBreak"> Tentativo Numero: <?php echo $tentativi ?> </p> 
        <input type="hidden" name = "tentativi" value = "<?php echo $tentativi ?>">
        <input type="number" name = "inputUtente" value="0">
        <input class = "bottone" type="submit" value="Tenta">
 </form>

  <body>
  <html>