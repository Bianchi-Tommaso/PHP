<html>

<head>
<title>Scrutinio</title>
<link rel="stylesheet" href="css/css.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</head>


<body>
<br><br>
<div class="row">
  <div class="col-sm"></div>
  <div class="col-sm"><div class = "bg-info justify-content-center d-flex">
    <form action="pages/anteprimaScrutinio.php" method="POST">
      <p style = text-align:center;>Inserire Dati Alunno</p>
        <label> Nominativo: </label><input type="text" name="nomeStudente" value="ciao">
        <br>
        <label> Sesso:</label>
        <br>
        <input type="radio" name="sesso" value="Maschio">
        <label>Maschio</label>
        <br>
        <input type="radio" name="sesso" value="Femmina">
        <label>Femmina</label>
        <br>
        <label>Debiti:</label><br>
        <input type="checkbox" name="italiano" value="Italiano">
        <label> Italiano </label><br>
        <input type="checkbox" name="matematica" value="Matematica">
        <label> Matematica </label><br>
        <input type="checkbox" name="telecomunicazioni" value="Telecomunicazioni">
        <label> Telecominicazioni </label><br>
        <input type="checkbox" name="informatica" value="Informatica">
        <label> Informatica </label><br><br>
        <input class = "btn btn-primary" type="submit" value="Anteprima Scrutinio">
        </form>
  </div></div>
  <div class="col-sm"></div>
</div>

  


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>



