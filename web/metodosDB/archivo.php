<?php
    header('Access-Control-Allow-Origin: *');

    buscarVideoRandon(){
        $query = "SELECT * FROM archivos WHERE 
        SELECT columnas 
FROM tablas ORDER BY random() LIMIT 10"
    };

    //registrar los likes 
    LikeUsuario();
    function LikeUsuario(){
        
    $correo = $_GET['EmailUsuario'];
    echo $correo;
        $buscar_usuario = "SELECT id_usuario FROM usuario WHERE correo ='".$correo."'";
        $result = mysql_query($buscar_usuario)
            or die("Ocurrio un error en la consulta SQL");
    mysql_close();
        echo $result;
    }
?>