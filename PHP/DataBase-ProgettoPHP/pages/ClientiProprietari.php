<?php

require("../accessoDB/accessoDB.php");

class ClientiProprietari 
{
    private $codiceFiscale;
    private $nome;
    private $indirizzo;
    private $cap;
    private $localita;
    private $citta;
    private $provincia;
    private $nomeUtente;
    private $password;
    private $telefono;
    private $cellulare;
    private $email;
    private $iban;
    private $gender;
    private $accesso;
    private $connessione;

    public function __construct($codiceFiscale, $nome, $indirizzo, $cap, $localita, $citta, $provincia, $nomeUtente, $password, $telefono, $cellulare, $email, $iban, $gender)
    {
        $this->accesso = new accessoDB();

        $this->codiceFiscale = $codiceFiscale;
        $this->nome = $nome;
        $this->indirizzo = $indirizzo;
        $this->$cap = $cap;
        $this->localita = $localita;
        $this->citta = $citta;
        $this->provincia = $provincia;
        $this->nomeUtente = $nomeUtente;
        $this->password = $password;
        $this->telefono = $telefono;
        $this->cellulare = $cellulare;
        $this->email = $email;
        $this->iban = $iban;
        $this->gendrt = $gender;
        $this->accesso $accesso;
        $this->connessione = $connessione;
    }

    public function __construct()
    {
        $this->accesso = new accessoDB();
    }

    public function Registrazione()
    {
        $controllo = false;

        $this->connessione = $this->accesso->OpenCon();

        $queryCheck = "SELECT email, password, codiceFiscale FROM clienti WHERE email = '$email' AND codiceFiscale = '$codiceFiscale';";

        $this->connessione->query($queryCheck);

        if($this->connessione->affected_rows == 1)
        {
            $controllo = true;
        }
        else
        {
            $queryRegistrazioneCliente = "INSERT INTO clienti(codiceFiscale, nome, indirizzo, nomeUtente, password, telefono, cellulare, email)
                               VALUES('$this->codiceFiscale', '$this->nome', '$this->indirizzo',  '$this->nomeUtente', '$this->password', '$this->telefono', '$this->cellulare', '$this->email');";

            $queryRegistrazioneProprietario = "INSERT INTO proprietari(codiceFiscale, nome, indirizzo, cap, localita, citta, provincia, telefono, cellulare, email, codiceIban, codiceCliente)
                                VALUES('$this->codiceFiscale', '$this->nome', '$this->indirizzo',  '$this->cap', '$this->localita', '$this->citta', '$this->provincia', '$this->cellulare', '$this->email', '$this->iban', '$this->codiceFiscale');";
            
            $this->connessione->query($queryRegistrazioneCliente);

            $this->connessione->query($queryRegistrazioneProprietario);

            $this->accesso->CloseCon($this->connessione);
        }

        return $controllo;
        
    }

    public function Accedi($email, $password)
    {
        $this->connessione = $this->accesso->OpenCon();

        $queryAccedi = "SELECT email, password, codiceFiscale FROM clienti WHERE email = '$email' AND password = '$password';";

        $risultato = $this->connessione->query($queryAccedi);

        $dati = $risultato->fetch_array();

        if($dati["email"] === $email && $dati["password"] === $password)
        {
          
            session_start();    //Lancio Della Sessione
    
            $_SESSION["codiceFiscale"] = $dati["codiceFiscale"];  
    
              header("Location:elenco.php");
        }
    }
}

?>