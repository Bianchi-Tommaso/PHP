<html> 
    <head> 
        <title> Indovina Il Numero </title>
        <link rel="stylesheet" type="text/css" href="css/css.css">
    </head> 

<body class = "centro">

     <div class = "formattazioneDiv">
        <h1>Gioco Dell'Indovina Numero</h1>
        <p> <strong>Regole Del Gioco</strong> Si deve indovinare nel minor numero 
        di tentativi un <br> numero compreso fra 0 e 99 estratto casualmente dal sistema<p>
     </div>      
     
     <br>
     <br>

 <form action = "pages/logica.php" method = "post">
        <input type="hidden" name = "numeroGenerato" value = "<?php echo rand(0,99); ?>">
        <input type="hidden" name = "tentativi" value = "1">
        <input type="number" name = "inputUtente" value="0">
        <input class = "bottone" type="submit" value="Inizia">
 </form>

  </body>
  </html>