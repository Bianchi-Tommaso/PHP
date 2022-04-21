<?php

require("../accessoDB/accessoDB.php");

class Clienti 
{
    private $codiceFiscale;
    private $nome;
    private $indirizzo;
    private $nomeUtente;
    private $password;
    private $telefono;
    private $cellulare;
    private $email;
    private $accesso;
    private $connessione;

    public function __construct($codiceFiscale, $nome, $indirizzo, $nomeUtente, $password, $telefono, $cellulare, $email, $accesso, $connessione)
    {
        $this->accesso = new accessoDB();

        $this->codiceFiscale = $codiceFiscale;
        $this->nome = $nome;
        $this->indirizzo = $indirizzo;
        $this->nomeUtente = $nomeUtente;
        $this->password = $password;
        $this->telefono = $telefono;
        $this->cellulare = $cellulare;
        $this->email = $email;
        $this->accesso $accesso;
        $this->connessione = $connessione;
    }

    public function Registrazione($data)
    {
        $this->connessione = $this->accesso->OpenCon();
        
        $queryRegistrazione = "INSERT INTO clienti(codiceFiscale, nome, indirizzo, nomeUtente, password, telefono, cellulare, email)
                               VALUES('$data->codiceFiscale', '$data->nome', '$data->indirizzo',  '$data->nomeUtente', '$data->password', '$data->telefono', '$data->cellulare', '$data->email');";
        
        $this->connessione->query($queryGet);

        $this->accesso->CloseCon($this->connessione);
    }
}

?>