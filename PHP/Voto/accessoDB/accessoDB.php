<?php

class accessoDB
{
      private $nomeServer;
      private $nomeUtente;
      private $password;
      private $nomeDatabase;
      private $connessione;

    public function __construct()
   {
      $this->nomeServer = "localhost";
      $this->nomeUtente = "root";
      $this->password = "";
      $this->nomeDatabase = "voto";
   }
   
   public function OpenCon()
   {      
      //Connessione Con Il DataBase

      $this->connessione = mysqli_connect($this->nomeServer, $this->nomeUtente, $this->password, $this->nomeDatabase);
   
      return $this->connessione;
   }
   
   public function CloseCon($c)
   {
      $c->close();
   }
}
?>