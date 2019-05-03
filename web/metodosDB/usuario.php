<?php
    header('Access-Control-Allow-Origin: https://ucctubemedia.netlify.com');
    /**
    * Buscar usuarios
    */
    $buscar_usuario = "SELECT correo FROM usuario WHERE correo ='".$informacion[2]."'";
    function buscarUsuario($informacion){
        $db = Db_conexion::getInstance();
        $result = pg_query($db, $buscar_usuario);
    }

    function buscarUsuarioRegistrado($informacion){
        $db = Db_conexion::getInstance();
        $result = pg_query($db, $buscar_usuario);
        echo pg_num_rows($result);
    }

?>        