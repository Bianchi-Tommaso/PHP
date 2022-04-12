<?php

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

    public function __construct()
    {
        $this->accesso = new accessoDB();
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