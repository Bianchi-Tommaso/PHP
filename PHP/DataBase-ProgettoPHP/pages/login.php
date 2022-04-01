<?php
    include "../accessoDB/accessoDB.php";

    $Connessione = OpenCon();

    if($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        $data = getPostData();

        $query = "SELECT email, password FROM clienti WHERE email = $data['email] AND password = $data['password'];";

        $json_respond = $Connessione->query($query);

        echo json_encode($json_respond);
    }

    function RisultatoQuery($risultatoQuery)
    {
        if($risultatoQuery-> num_rows == 0)
        {
            $json = $risultatoQuery->fetch_assoc();
        }

        return $json;
    }

    function getPostData()
    {
        $json = file_get_contents('php://input');

        $data = json_decode($json);

        return $data;
    }
?>