USE es8php;


INSERT INTO datiAnagrafici (idDati, Nome, Cognome, Sesso, AnnoDiNascita)         
VALUES (DEFAULT, "Tommaso", "Bianchi", "M", "2003-03-18");


SELECT Email, Password FROM datilogin
WHERE Email = "bianchi.tommaso18@gmail.com" AND Password = "1234";


SELECT Film	, Voto FROM raccoltafilm;

SELECT Film, ROUND(AVG(Voto)) "Media Film" FROM raccoltafilm
GROUP BY Film;

SELECT MAX(MediaVoto) AS VotoMassimo
FROM (SELECT AVG(r.Voto) AS MediaVoto FROM raccoltafilm r GROUP BY r.Film
)mediaMassima;




/*
SELECT idFilm, Voto FROM es8php.raccoltafilm  
ORDER BY idFilm DESC	
LIMIT 1;
*/