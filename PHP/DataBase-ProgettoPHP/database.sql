DROP DATABASE IF EXISTS progettophp;
CREATE DATABASE progettophp;

USE progettophp;

CREATE TABLE IF NOT EXISTS quartieri
(
	codice  INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    urlmappa VARCHAR(128) NOT NULL,
    nome VARCHAR(128) NOT NULL
);

CREATE TABLE IF NOT EXISTS proprietari
(
	codiceFiscale CHAR(16) NOT NULL PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    indirizzo VARCHAR(60),
    cap VARCHAR(10),
    localita VARCHAR(20),
    citta VARCHAR(20),
    provincia VARCHAR(20),
    telefono VARCHAR(20),
    cellulare VARCHAR(20),
    email VARCHAR(30),
    codiceIban VARCHAR(27),
    codiceCliente CHAR(16) REFERENCES clienti(codiceFiscale)
);

CREATE TABLE IF NOT EXISTS clienti
(
	codiceFiscale CHAR(16) NOT NULL PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    indirizzo VARCHAR(60),
    nomeUtente VARCHAR(10),
    password VARCHAR(10), 
    telefono VARCHAR(20),
    cellulare VARCHAR(20),
    email VARCHAR(30)
);

CREATE TABLE IF NOT EXISTS prenotazioni
(
	codice INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    dataPrenotazioni DATE,
    codiceCliente CHAR(16) REFERENCES clienti(codiceFiscale),
    confermaPrenotazione CHAR(1) CHECK ((confermaPrenotazione = 'S' || confermaPrenotazione = 's') AND (confermaPrenotazione = 'N' || confermaPrenotazione ='n') AND (confermaPrenotazione = NULL))
);

CREATE TABLE IF NOT EXISTS righe
(
	codice INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    dataIniziale DATE,
    dataFinale DATE,
    costo DOUBLE,
    confermaRiga CHAR(1) CHECK ((confermaRiga = 'S' || confermaRiga = 's') AND (confermaRiga = 'N' || confermaRiga ='n')),
    codicePrenotazione INT NOT NULL REFERENCES prenotazioni(codice),
    codiceAppartamento INT NOT NULL REFERENCES appartamenti(codice)
);

CREATE TABLE IF NOT EXISTS disponibilita
(
	codice INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    data DATE,
    disponibile CHAR(1) CHECK ((disponibile = 'S' || disponibile = 's') AND (disponibile = 'N' || disponibile ='n')),
    codiceRiga INT REFERENCES righe(codice),
    codiceAppartamento INT REFERENCES appartamenti(codice)
);

CREATE TABLE IF NOT EXISTS appartamenti
(
	codice  INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    indirizzo VARCHAR(40),
    prezzoGiorno DOUBLE,
    numeroCamere INT,
    postiLetto INT,
    usoCucina CHAR(1) CHECK ((usoCucina = 'S' || usoCucina = 's') AND (usoCucina = 'N' || usoCucina ='n')),
    parcheggio CHAR(1) CHECK ((parcheggio = 'S' || parcheggio = 's') AND (parcheggio = 'N' || parcheggio ='n')),
    note TEXT,
    codiceQuartiere INT REFERENCES quartieri(codice),
    codicePropretario CHAR(16) REFERENCES proprietario(codiceFiscale)
);

CREATE TABLE IF NOT EXISTS foto
(
	codice INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    didascalia VARCHAR(50),
    urlFoto VARCHAR(30),
    codiceAppartamento INT REFERENCES appartamenti(codice) 
);
