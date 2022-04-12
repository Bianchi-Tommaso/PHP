var index = "http://localhost:80/pages/backend.php";

$(document).ready(function () 
{
  $("body").on('click', '.registrazione', function (e) 
  {
      var nome = $("#Nome").val();
      var codiceFiscale = $("#codiceFiscale").val();
      var indirizzo = $("#indirizzo").val();
      var email = $("#email").val();
      var cellulare = $("#cellulare").val();
      var telefono = $("#telefono").val();
      var iban = $("#iban").val();
      var localita = $("#localita").val();
      var citta = $("#citta").val();
      var provincia = $("#provincia").val();
      var cap = $("#cap").val();
      var sesso = $("#gender:checked").val(); 

    $clinti = 
    {
        "codiceFiscale": codiceFiscale,
        "nome": nome,
        "indirizzo": indirizzo,
        "email": email,
        "cellulare": cellulare,
        "telefono": telefono,
        "iban": iban,
        "localita": localita,
        "citta": citta,
        "provincia": provincia,
        "cap": cap,
        "sesso": sesso,
    };

    postDati($clienti);
  });

  $("body").on('click', '.elimina', function (e) 
  {
    var idElimina = $(this).parent("td").data("id");

    var elimina = { "id": idElimina };

    deleteDati(elimina);
  });

  $("body").on('click', '.apri', function (e) 
  {
    $("#modalModifica").modal('show');
    idModifica = $(this).parent("td").data("id");
  });

  $('.modifica').click(function (e) 
  {
    var nome = $("#nameM").val();
    var cognome = $("#lastnameM").val();
    var sesso = $("#genereM:checked").val();
    var dataNascita = $("#birthdateM").val();
    var dataAssunzione = $("#hiredateM").val();

    var dipendente =      //Oggetto JS
    {
      "id": idModifica,
      "birthDate": dataNascita,
      "firstName": nome,
      "lastName": cognome,
      "gender": sesso,
      "hireDate": dataAssunzione,
    };

    putDati(dipendente)

    $("#modalModifica").modal('hide');

  });

  $(".aggiungi").click(function (e) 
  {
    var nome = $("#name").val();
    var cognome = $("#lastname").val();
    var sesso = $("#genere:checked").val();
    var dataNascita = $("#birthdate").val();
    var dataAssunzione = $("#hiredate").val();

    var dipendente =              //Oggetto JS
    {
      "birthDate": dataNascita,
      "firstName": nome,
      "lastName": cognome,
      "gender": sesso,
      "hireDate": dataAssunzione,
    };

    $("#exampleModal").modal('hide');

    $("#name").val("");
    $("#lastname").val("");
    $("#genere:checked").val("");
    $("#birthdate").val("");
    $("#hiredate").val("");

    postDati(dipendente);
  });


  function prendiDati(link)   //prende i dati e stampa i dipendeti
  {
    $.get(link, function (data) {
      first = data['_links']['first']['href'];
      self = data['_links']['self']['href'];      //Link self
      last = data['_links']['last']['href'];      //Link last
      page = data['_links']['page']['number'];              //pagina
      totalPages = data['_links']['page']['totalPages'];    //pagine totali  
      json = data;                                //savo data in una variabile
      console.log(data);

      if (page != totalPages - 1)           //controllo se c'è un link next
      {
        next = data['_links']['next']['href'];
      }

      if (page != 0)                       //controllo se c'è un link prev
      {
        prev = data['_links']['prev']['href'];
      }

      page++;

      $("p").html(page);            //stampo il numero della pagina

      disegnaRighe(data['_embedded']['_employees']);   //stampo la tabella
    });
  };

  function postDati(clienti)               //Metodo per aggiungere i dipendenti
  {
    $.ajax({
      type: "POST",
      url: index,
      data: JSON.stringify(clienti),
      contentType: "application/json",
      dataType: "json",
      success: function (data) { console.log("OK"); },
      error: function (json) { console.log("errore"); }
    });
  };

  function putDati(dipendente)          //Metodo per aggiornare i dati
  {
    $.ajax({
      type: "PUT",
      url: index,
      data: JSON.stringify(dipendente),
      contentType: "application/json",
      dataType: "json",
      success: function (data) { prendiDati(index + "?page=" + (page - 1) + "&size=20") },
      error: function (data) { console.log("errore"); }
    });
  }

  function deleteDati(elimina) //Metodo per eliminare i dipendenti
  {
    $.ajax({
      type: "DELETE",
      url: index,
      data: JSON.stringify(elimina),
      success: function (data) { prendiDati(index + "?page=" + (page - 1) + "&size=20") },
      error: function (data) { console.log("errore"); }
    });
  }

  function disegnaRighe(data)     //Metodo per stampare i dati
  {
    var riga = "";

    console.log(data);
    console.log(data.length);

    for (var i = 0; i < data.length; i++) 
    {
      riga += "<tr> <th scope='row'>" + data[i][0].id + "</th> " + " <td>" + data[i][0].firstName + "</td> " +
        " <td>" + data[i][0].lastName + "</td> " + " <td>" + data[i][0].birthDate + "</td> " + " <td>" + data[i][0].gender + "</td> " + " <td>" + data[i][0].hireDate + "</td> " +
        " <td data-id = " + data[i][0].id + ">" + " <button type='button' class='btn btn-danger btn-sm px-3 elimina '> Elimina </button> <button type='button' class='btn btn-warning btn-sm px-3 apri'> Modifica </button></td> </tr>";
    }

    $("tbody").html(riga);
  };
});