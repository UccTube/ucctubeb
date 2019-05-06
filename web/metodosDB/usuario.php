<?php
    header('Access-Control-Allow-Origin: *');
    /**
     * TABLAS DE LA BASE DE DATOS
     * 
     * usuario
     * tipo_usuario
     * info_usuario
     * permisos_usuario
     */


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

    function registrarUsuario($informacion){
        $db = Db_conexion::getInstance();
        $total = totalRegistros("usuario");
        $idInfo = generarID($total, "IU");
        $idUsuario = generarID($total, "U");
        $idTipo = "TU1-05052019"; 
        $nombre = $informacion[0];
        $apellidos = $informacion[1];
        $correo = $informacion[2];
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

    //TOTAL DE REGISTROS DE UNA TABLA
    function totalRegistros($tabla){
        $db = Db_conexion::getInstance();
        $query = "SELECT * FROM $tabla";
        $result = pg_query($db, $query);
        $count = pg_num_rows($result);
        return $count;
    }

    function generarID($total, $tabla){
        $fecha = date(dmY);
        $id = $tabla.($total+1)."-".$fecha;
        return $id;
    }


?>        