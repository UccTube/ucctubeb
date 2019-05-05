<?php
    header('Access-Control-Allow-Origin: *');
    /**
    * Buscar usuarios
    */
    function buscarUsuario($informacion){
        $db = Db_conexion::getInstance();
        $result = pg_query($db, $buscar_usuario);
    }

    function buscarUsuarioRegistrado($informacion){
        $buscar_usuario = "SELECT correo FROM usuario WHERE correo ='".$informacion[2]."'";
        $db = Db_conexion::getInstance();
        $result = pg_query($db, $buscar_usuario);
        echo pg_num_rows($result);
    }

?>        