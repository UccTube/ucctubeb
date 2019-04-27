<?php
    header('Access-Control-Allow-Origin: https://ucctubemedia.netlify.com');
    header("Access-Control-Allow-Headers","Origin, X-Requested-With, Content-Type, Accept");
    header("Access-Control-Allow-Methods", "GET,POST,PUT,PATCH,DELETE");
    header("Access-Control-Allow-Credentials", true);
    echo "funciono!!";
?>