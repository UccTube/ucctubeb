<?php
    header('Access-Control-Allow-Origin: https://ucctubemedia.netlify.com');
    /**
    * Buscar usuarios
    */

    echo 'ENTRO';
    $buscar_usuario = "SELECT correo FROM usuario WHERE correo ='".$informacion[2]."'";

    function buscarUsuario($informacion){
        $db = Db_conexion::getInstance();
        $result = pg_query($db, $buscar_usuario);
    }

    function buscarUsuarioRegistrado($informacion){
        $db = Db_conexion::getInstance();
        $result = pg_query($db, $buscar_usuario);
        echo "ENTRO ".pg_num_rows($result);
    }

?>        