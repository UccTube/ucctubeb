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
     * Añadir usuarios a la base de datos
     */
    function guardarBD($nombre, $apellidos, $correo){
        $db = Db_conexion::getInstance();
        $total = totalRegistros("usuario");
        $idInfo = generarID($total, "IU");
        $idUsuario = generarID($total, "U");
        $idTipo = "TU2-21042019"; 
        /** 
         * FALTA EL MÉTODO PARA BUSCAR EL TIPO DE USUARIO,
         * ADEMÁS, FALTA IDEAR UNA FORMA DE IDENTIFICAR EL TIPO DE USUARIO
        */
        $query1 = "INSERT INTO info_usuario(id_info_usuario,nombres,apellidos) VALUES ('$idInfo', '$nombre', '$apellidos')";

        $query2 = "INSERT INTO usuario(id_usuario,correo,id_tipo_usuario,id_info_usuario) VALUES('$idUsuario', '$correo', '$idTipo', '$idInfo')";
  
        $result1 = pg_query($db, $query1);
        $result2 = pg_query($db, $query2);

        if($result1 and $result2){
            echo "Registro exitoso";
            pg_query("COMMIT") or die("Commit fallido");
        }else{
            echo "Fallo al insertar datos";
            pg_query("ROLLBACK") or die("Rollback fallido");
        }
    }
    function generarID($total, $tabla){
        $fecha = date(dmY);
        $id = $tabla.($total+1)."-".$fecha;
        return $id;
    }

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

    //TOTAL DE REGISTROS DE UNA TABLA
    function totalRegistros($tabla){
        $db = Db_conexion::getInstance();
        $query = "SELECT * FROM $tabla";
        $result = pg_query($db, $query);
        $count = pg_num_rows($result);
        return $count;
    }
    
