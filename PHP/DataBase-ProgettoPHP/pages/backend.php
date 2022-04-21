<?php

require ("Clienti.php");

    $json_respond;
    $data = readPostData();

if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $backend = new Clienti();

    $backend->POST($data);

   header("Location:")
}

?>