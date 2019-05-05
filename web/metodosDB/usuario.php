<?php
    header('Access-Control-Allow-Origin: *');
    /**
    * Buscar usuarios
    */
    $buscar_usuario = "SELECT correo FROM usuario WHERE correo ='".$informacion[2]."'";
    function buscarUsuario($informacion){
        $db = Db_conexion::getInstance();
        $result = pg_query($db, $buscar_usuario);
    }

    function buscarUsuarioRegistrado($informacion){
        echo 'entro';
        $db = Db_conexion::getInstance();
        $result = pg_query($db, $buscar_usuario);
        echo ', u = '.$db." ".$buscar_usuario;
        echo ', r = '.$result;
        echo pg_num_rows($result);
    }

?>        