<?php
    header('Access-Control-Allow-Origin: https://ucctubemedia.netlify.com');
    require_once 'Registro.php';

    $uri = $_SERVER['REQUEST_URI'];
    if ($uri == '/Registro.php') {
        echo "LLamando registro";
    }else if($uri == '/VideoGrid'){
        echo "VideoGrid";
    }


    echo "funciono!!";
?>