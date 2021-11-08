<!DOCTYPE html>
<html>

<head>
</head>
<title>Scrutinio Finale</title>

<body>

  <h1>Tabellone Scrutinio</h1>

  

  <?php 
		session_start();

		echo $_SESSION["stringaGenerale"];

		session_destroy();
  ?>

</body>

</html>