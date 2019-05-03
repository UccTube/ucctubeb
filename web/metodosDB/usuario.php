<?php
    header('Access-Control-Allow-Origin: https://ucctubemedia.netlify.com');
    /**
    * Buscar usuarios
    */

    function buscarUsuario($informacion){
        $db = Db_conexion::getInstance();
        $buscar_usuario = "SELECT correo FROM usuario WHERE correo ='".$informacion[2]."'";
        $result = pg_query($db, $buscar_usuario);
    }

    function buscarUsuarioRegistrado($informacion){
        $db = Db_conexion::getInstance();
        $buscar_usuario = "SELECT correo FROM usuario WHERE correo ='".$informacion[2]."'";
        $result = pg_query($db, $buscar_usuario);
        echo "ENTRO ".pg_num_rows($result);
    }

?>        