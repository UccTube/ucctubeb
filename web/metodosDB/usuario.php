<?php

    /**
    * Buscar usuarios
    */
    function buscarUsuario($informacion){

    }

    function buscarUsuarioCorreo($informacion){
        $db = Db_conexion::getInstance();
        $query = "SELECT correo FROM usuario WHERE correo ='".$informacion[2]."'";
        $result = pg_query($db, $query);
        echo pg_num_rows($result);
    }

?>        