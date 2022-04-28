DROP DATABASE IF EXISTS voto;
CREATE DATABASE voto;

USE voto;

CREATE TABLE IF NOT EXISTS partito
(
	codicePartito  INT NOT NULL PRIMARY KEY,
	nomePartito VARCHAR(128) NOT NULL
);

CREATE TABLE IF NOT EXISTS candidato
(
	codiceCandidato INT NOT NULL PRIMARY KEY,
    nome VARCHAR(128) NOT NULL,
    cognome VARCHAR(128) NOT NULL,
    voto INT NOT NULL CHECK (voto >= 0),
    codicePartito INT NOT NULL,
    
    FOREIGN KEY (codicePartito) REFERENCES partito(codicePartito)
);

INSERT INTO partito(codicePartito, nomePartito) VALUES (1, "Per-il-bene-della-gente");
INSERT INTO partito(codicePartito, nomePartito) VALUES (2, "Democrazia-Sempre");
INSERT INTO partito(codicePartito, nomePartito) VALUES (3, "Viva-litalia");
INSERT INTO partito(codicePartito, nomePartito) VALUES (4, "Repubblica-Nuova");
INSERT INTO partito(codicePartito, nomePartito) VALUES (5, "Facciamo-Presto!");

INSERT INTO candidato(codiceCandidato, nome, cognome, voto, codicePartito) VALUES (1,"Giovanni","Marietti", 0, 1); 
INSERT INTO candidato(codiceCandidato, nome, cognome, voto, codicePartito) VALUES (2,"Paola","Attucci", 0, 1);
INSERT INTO candidato(codiceCandidato, nome, cognome, voto, codicePartito) VALUES (3,"Alberto","D'Antonio Ugo", 0, 2);
INSERT INTO candidato(codiceCandidato, nome, cognome, voto, codicePartito) VALUES (4,"Urbano","Barlucci", 0, 3);
INSERT INTO candidato(codiceCandidato, nome, cognome, voto, codicePartito) VALUES (5,"Andrea","Pollini", 0, 4);
INSERT INTO candidato(codiceCandidato, nome, cognome, voto, codicePartito) VALUES (6,"Roberto","Grechi", 0, 5);

