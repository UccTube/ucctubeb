<?php
    header('Access-Control-Allow-Origin: https://ucctubemedia.netlify.com');
    require_once 'conexionDB.php';

    /**
     * TABLAS DE LA BASE DE DATOS
     * 
     * usuario
     * tipo_usuario
     * info_usuario
     * permisos_usuario
     */

    /**
     * Funciones de búsqueda
     */

    //VERIFICAR SI EXISTE UN USUARIO POR SU CORREO
    function buscarUsuarioExistente($correo){
        $db = Db_conexion::getInstance();
        $query = "SELECT correo FROM usuario WHERE correo ='$correo'";
        $result = pg_query($db, $query);
        echo pg_num_rows($result);
    }
