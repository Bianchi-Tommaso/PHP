var index = "pages/login.php"; //192.168.1.48

$(document).ready(function() 
{
    $("body").on('click', '.login', function (e)   
    {
        var email = $("#email").val();
        var password = $("#password").val();

        var json = 
                {
                    'email': email,
                    'password': password,
                };

      postDati(json);  
    });

    $("body").on('click', '.GET', function (e)   
    {
      getDati(); 
    });

    $("body").on('click', '.PUT', function (e)   
    {
      putDati();
    });

    $("body").on('click', '.DELETE', function (e)   
    {
      deleteDati(); 
    });
          function postDati(json)            
          {
            $.ajax({
              url: index,
              type: "POST",
              data: JSON.stringify(json),
              contentType: "application/json",
              dataType:"JSON",
              success: function(data)
              {
                console.log(data);
                //stampaDati(data);
              },
              error: function(){console.log(data);}
            });
          };

          function getDati()
          {
            $.ajax({
              url: index,
              type: "GET",
              dataType:"JSON",
              success: function(data)
              {
                stampaDati(data);
              },
              error: function(){console.log("Errore");}
            });
          };

          function putDati()
          {
            $.ajax({
              url: index,
              type: "PUT",
              dataType:"JSON",
              success: function(data)
              {
                stampaDati(data);
              },
              error: function(){console.log("Errore");}
            });
          };

          function deleteDati()
          {
            $.ajax({
              url: index,
              type: "DELETE",
              dataType:"JSON",
              success: function(data)
              {
                stampaDati(data);
              },
              error: function(){console.log("Errore");}
            });
          };

          function stampaDati(data)
          {
              var s; 



              $("tbody").append(s);
          }
});