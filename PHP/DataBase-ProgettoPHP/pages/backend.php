<?php

require ("clienti.php");

    $json_respond;
    $data = readPostData();

if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $backend = new Clienti();

    $backend->POST($data);

   header("Location:")
}
else if($_SERVER['REQUEST_METHOD'] === 'GET')
{
    $json_respond = $backend->GET($page, $size);
}
else if($_SERVER['REQUEST_METHOD'] === 'PUT')
{
    $json_respond = $backend->PUT($data);
}
else if($_SERVER['REQUEST_METHOD'] === 'DELETE')
{
    $json_respond = $backend->DELETE($data);
}

    header('Content-Type: application/json');      
    
    echo json_encode($json_respond, JSON_UNESCAPED_SLASHES);

function readPostData() 
{
    $json = file_get_contents('php://input');

    $data = json_decode($json);

    return $data;
}

?>