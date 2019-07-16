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
    function buscarUsuarioCorreo($informacion){
        $db = Db_conexion::getInstance();
        $buscar_usuario = "SELECT id_usuario FROM usuario WHERE correo ='".$informacion."'";
        $result = pg_query($db, $buscar_usuario);
        while ($row = pg_fetch_row($result)) {
            $id = $row[0];
        }
        return $id;
    }

    function buscarUsuarioCorreoP($informacion){
        $id = buscarUsuarioCorreo($informacion);
        buscarUsuarioId($id);
    }

    function buscarUsuarioId($informacion){
        $db = Db_conexion::getInstance();
        $buscar_usuario = "SELECT u.correo, iu.nombres, iu.apellidos, iu.genero, iu.fecha_nacimiento, iu.url_banner, iu.url_foto, iu.pais, iu.ciudad
        FROM usuario u, info_usuario iu 
        WHERE (iu.id_info_usuario = u.id_info_usuario) AND u.estado = true AND (u.id_usuario = '$informacion')";
        
        $result = pg_query($db, $buscar_usuario);
        $user="";
        while ($row = pg_fetch_row($result)) {
            $user .= "$row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8]";
        }
        
        echo $user;
    }

    function buscarUsuarioSuscripcion($informacion){
        $informacion.split(",");
        $buscar_suscripcion = "SELECT estado from suscripciones WHERE (usuario='$informacion[0]') AND (usuario_suscrito = '$informacion[1]')";
    }

    function buscarUsuarioRegistrado($informacion){
        $buscar_usuario = "SELECT correo FROM usuario WHERE correo ='".$informacion[2]."'";
        $db = Db_conexion::getInstance();
        $result = pg_query($db, $buscar_usuario);
        echo pg_num_rows($result);
    }

    function registrarUsuario($informacion){
        $datos = explode(",",$informacion);
        $db = Db_conexion::getInstance();
        $idInfo = uniqid('IU-', true);
        $idUsuario = uniqid('U-', true);
        $idTipo = "TU-5b2b4535ab7dc7.27884925"; 
        $nombre = $datos[0];
        $apellidos = $datos[1];
        $correo = $datos[2];
        /** 
         * FALTA EL MÉTODO PARA BUSCAR EL TIPO DE USUARIO,
         * ADEMÁS, FALTA IDEAR UNA FORMA DE IDENTIFICAR EL TIPO DE USUARIO
        */
        $query1 = "INSERT INTO info_usuario(id_info_usuario,nombres,apellidos,url_foto) VALUES ('$idInfo', '$nombre', '$apellidos', 'https://firebasestorage.googleapis.com/v0/b/click-academy.appspot.com/o/Profile%2Fdefault_profile_picture.png?alt=media&token=ad5ad50b-bfd7-4a03-886f-6bafdcecebb2')";

        $query2 = "INSERT INTO usuario(id_usuario,correo,id_tipo_usuario,id_info_usuario) VALUES('$idUsuario', '$correo', '$idTipo', '$idInfo')";
  
        $result1 = pg_query($db, $query1);
        $result2 = pg_query($db, $query2);

        if($result1 and $result2){
            echo "1";
            pg_query("COMMIT") or die("Commit fallido");
        }else{
            echo "0";
            pg_query("ROLLBACK") or die("Rollback fallido");
        }
    }

    function modificarUsuarioInfo($informacion){

        $idUsuario = buscarUsuarioCorreo($informacion[5]);

        $db = Db_conexion::getInstance();
        $info_usuario = "SELECT id_info_usuario
        FROM usuario 
        WHERE id_usuario = '$idUsuario'";
        $result = pg_query($db, $info_usuario);
        $id_info_usuario="";
        while ($row = pg_fetch_row($result)) {
            $id_info_usuario = $row[0];
        }

        /**Falta fecha de nacimiento */

        $update_usuario = "UPDATE info_usuario
        SET nombres = '$informacion[0]', apellidos = '$informacion[1]', genero = '$informacion[2]', pais = '$informacion[3]', ciudad = '$informacion[4]'
        WHERE id_info_usuario = '$id_info_usuario'";
        $result_upd = pg_query($db, $update_usuario);
        if($result_upd){
            echo "1";
            pg_query("COMMIT") or die("Commit fallido");
        }else{
            echo "0";
            pg_query("ROLLBACK") or die("Rollback fallido");
        }
    }

    function modificarUsuarioFoto($informacion){
        $idUsuario = buscarUsuarioCorreo($informacion[1]);

        $db = Db_conexion::getInstance();
        $info_usuario = "SELECT id_info_usuario
        FROM usuario 
        WHERE id_usuario = '$idUsuario'";
        $result = pg_query($db, $info_usuario);
        $id_info_usuario="";
        while ($row = pg_fetch_row($result)) {
            $id_info_usuario = $row[0];
        }

        $update_usuarioF = "UPDATE info_usuario
        SET url_foto = '$informacion[0]'
        WHERE id_info_usuario = '$id_info_usuario'";
        $result_updF = pg_query($db, $update_usuarioF);
        if($result_updF){
            echo "1";
            pg_query("COMMIT") or die("Commit fallido");
        }else{
            echo "0";
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
?>        


