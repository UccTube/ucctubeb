<?php
    header('Access-Control-Allow-Origin: *');

    function registrarArchivo($informacion){
        $datos = explode("}*{",$informacion);
        $Nombre = $datos[0];
        $Descripcion= $datos[1];
        $Contenidos = $datos[2];
        $Categoria = trim($datos[3]);
        $Usuario = buscarUsuarioArchivo($datos[4]);
        $firebase = $datos[5];
        $id_tipo_archivo = buscarTipoArchivo($datos[6]);
        $id_archivo = uniqid('A-', true);
        $Fecha_creacion = date(Y."-".m."-".d);

        $db = Db_conexion::getInstance();
        
        $query1 = "INSERT INTO public.archivos(
            id_archivo, direccion, nombre, descripcion, id_categorias, fecha_creacion, id_usuario, tabla_contenidos, id_tipo_archivo)
        VALUES ('$id_archivo','$firebase','$Nombre','$Descripcion','$Categoria','$Fecha_creacion','$Usuario','$Contenidos','$id_tipo_archivo')";

        $result1 = pg_query($db, $query1);

        if($result1){
            echo "1";
            pg_query("COMMIT") or die("Commit fallido");
        }else{
            echo "0";
            echo $query1;
            echo $result1;
            pg_query("ROLLBACK") or die("Rollback fallido");
        }
    }

    function buscarTipoArchivo($informacion){
        $db = Db_conexion::getInstance();
        $query = "SELECT id_tipo_archivo
        FROM public.tipo_archivo WHERE nombre='$informacion'";

        $result = pg_query($db, $query);    
        $id = "";
        while ($row = pg_fetch_row($result)) {
            $id .= "$row[0]";
        }
        return $id;
    }

    function buscarUsuarioArchivo($informacion){
        require 'metodosDB/usuario.php';
        $id = buscarUsuarioCorreo($informacion);
        return $id;
    }

    function buscarArchivoId($informacion){
        $db = Db_conexion::getInstance();
        $query_info = "SELECT ar.direccion, ar.nombre, ar.descripcion, ar.fecha_creacion, ar.tabla_contenidos, 
        ca.nombre as categoria, CONCAT(iu.nombres, ' ', iu.apellidos) as nombre_usuario,
		ta.nombre, us.correo, iu.url_foto
        FROM archivos ar, categorias ca, usuario us, info_usuario iu, tipo_archivo ta
        WHERE 
            (ar.id_categorias = ca.id_categoria) 
        AND (us.id_usuario = ar.id_usuario) 
        AND (ar.id_archivo = '$informacion') 
		AND  ar.id_tipo_archivo = ta.id_tipo_archivo
        AND (us.id_info_usuario = iu.id_info_usuario)";

        
        $result_info = pg_query($db, $query_info);

        $busqueda = "";

        $likes = buscarLikes($informacion);
        $dislikes =buscarDislikes($informacion);

        while ($row_info = pg_fetch_row($result_info)) {
            $busqueda .= "$row_info[0] }*{ $row_info[1] }*{ $row_info[2] }*{ $row_info[3] }*{ $row_info[4] }*{ $row_info[5] }*{ $row_info[6] }*{ $row_info[7] }*{ $row_info[8] }*{ $row_info[9]";
        } 
        echo $busqueda." }*{ ".$likes." }*{ ".$dislikes;
    }

    function buscarArchivosUsuarioCorreo($informacion){
        $idUsuario = buscarUsuarioArchivo($informacion);
        buscarArchivosUsuario($idUsuario);
    }
    function buscarVideosUsuarioCorreo($informacion){
        $idUsuario = buscarUsuarioArchivo($informacion);
        buscarVideosUsuario($idUsuario);
    }
    function buscarDocumentosUsuarioCorreo($informacion){
        $idUsuario = buscarUsuarioArchivo($informacion);
        buscarDocumentosUsuario($idUsuario);
    }
    function buscarImagenesUsuarioCorreo($informacion){
        $idUsuario = buscarUsuarioArchivo($informacion);
        buscarImagenesUsuario($idUsuario);
    }
    function buscarPresentacionesUsuarioCorreo($informacion){
        $idUsuario = buscarUsuarioArchivo($informacion);
        buscarPresentacionesUsuario($idUsuario);
    }


    function buscarArchivosUsuario($informacion){
        $buscarArchivos = "SELECT id_archivo, nombre, id_tipo_archivo FROM public.archivos WHERE id_usuario = '$informacion' AND estado = 'true' ORDER BY fecha_creacion DESC LIMIT 10";
        $db = Db_conexion::getInstance();
        $result = pg_query($db, $buscarArchivos);
        $busqueda = "";
        while ($row = pg_fetch_row($result)) {
            $busqueda .= "}@{"."$row[0]"."}*{"."$row[1]"."}*{".$row[2];
        }
        echo $busqueda;     
    }
    function buscarVideosUsuario($informacion){
        $buscarArchivos = "SELECT id_archivo, nombre, id_tipo_archivo FROM public.archivos WHERE id_usuario = '$informacion' AND (id_tipo_archivo = 'TA-5ce165c476dfc7.01202288') AND estado = 'true' ORDER BY fecha_creacion DESC LIMIT 10";
        $db = Db_conexion::getInstance();
        $result = pg_query($db, $buscarArchivos);
        $busqueda = "";
        while ($row = pg_fetch_row($result)) {
            $busqueda .= "}@{"."$row[0]"."}*{"."$row[1]"."}*{".$row[2];
        }
        echo $busqueda;     
    }
    function buscarDocumentosUsuario($informacion){
        $buscarArchivos = "SELECT id_archivo, nombre, id_tipo_archivo FROM public.archivos WHERE ((id_tipo_archivo = 'TA-5c3f65c476ecc7.01202468') 
        OR (id_tipo_archivo = 'TA-6fa345c476ecc7.01202288')) AND id_usuario = '$informacion' AND estado = 'true' ORDER BY fecha_creacion DESC LIMIT 10";
        $db = Db_conexion::getInstance();
        $result = pg_query($db, $buscarArchivos);
        $busqueda = "";
        while ($row = pg_fetch_row($result)) {
            $busqueda .= "}@{"."$row[0]"."}*{"."$row[1]"."}*{".$row[2];
        }
        echo $busqueda;     
    }
    function buscarImagenesUsuario($informacion){
        $buscarArchivos = "SELECT id_archivo, nombre, id_tipo_archivo FROM public.archivos WHERE (id_tipo_archivo = 'TA-4ad165c476ecc7.01202288') AND id_usuario = '$informacion' AND estado = 'true' ORDER BY fecha_creacion DESC LIMIT 10";
        $db = Db_conexion::getInstance();
        $result = pg_query($db, $buscarArchivos);
        $busqueda = "";
        while ($row = pg_fetch_row($result)) {
            $busqueda .= "}@{"."$row[0]"."}*{"."$row[1]"."}*{".$row[2];
        }
        echo $busqueda;     
    }
    function buscarPresentacionesUsuario($informacion){
        $buscarArchivos = "SELECT id_archivo, nombre, id_tipo_archivo FROM public.archivos WHERE (id_tipo_archivo = 'TA-6cb165c476ecc7.01202288') AND id_usuario = '$informacion' AND estado = 'true' ORDER BY fecha_creacion DESC LIMIT 10";
        $db = Db_conexion::getInstance();
        $result = pg_query($db, $buscarArchivos);
        $busqueda = "";
        while ($row = pg_fetch_row($result)) {
            $busqueda .= "}@{"."$row[0]"."}*{"."$row[1]"."}*{".$row[2];
        }
        echo $busqueda;     
    }

    function Registrarlikes($id_archivo,$id_usuario){
        $db = Db_conexion::getInstance();
        $Registrolike=  BuscarVotoArchivo("likes",$id_archivo);

        if(pg_num_rows($Registrolike) ==0){

            $MdificarLike ="UPDATE public.dislikes
            SET  estado='false'
                    WHERE id_archivo ='$id_archivo'";
            pg_query( $db, $MdificarLike);
            $InserLike= " INSERT INTO public.likes( id_archivo, id_usuario, estado)
                   VALUES ('$id_archivo', '$id_usuario', 'true');";
            pg_query( $db, $InserLike);
                }
                else{

                    while ($row = pg_fetch_row($Registrolike)) {
                        $estado=$row[1];
                      }

                    if($estado=='t'){
                    $MdificarLike ="UPDATE public.likes
                            SET  estado='false'
                                    WHERE id_archivo ='$id_archivo'";
                            pg_query( $db, $MdificarLike);
                    }
                    else
                    {  
                    $MdificarLike ="UPDATE public.likes
                            SET  estado='true'
                                WHERE id_archivo ='$id_archivo'";
                            pg_query( $db, $MdificarLike);
                     $MdificardisLike ="UPDATE public.dislikes
                            SET  estado='false'
                                    WHERE id_archivo ='$id_archivo'";
                            pg_query( $db, $MdificardisLike);
                    
                    }
                }
                echo buscarDislikes($id_archivo)."}*@{".buscarLikes($id_archivo);
        }



    function Registrardislikes($id_archivo,$id_usuario){
        $db = Db_conexion::getInstance();
        $RegistroDislike=  BuscarVotoArchivo("dislikes",$id_archivo);

        if(pg_num_rows($RegistroDislike) ==0){
            $MdificarLike ="UPDATE public.likes
            SET  estado='false'
                    WHERE id_archivo ='$id_archivo'";
            pg_query( $db, $MdificarLike);
            $InserLike= " INSERT INTO public.dislikes( id_archivo, id_usuario, estado)
                   VALUES ('$id_archivo', '$id_usuario', 'true');";
            pg_query( $db, $InserLike);
                }

                else{
                    while ($row = pg_fetch_row($RegistroDislike)) { 
                        $estado= $row[1];
                    }
                    if($estado=='t'){
                        $MdificarLike ="UPDATE public.dislikes
                                SET  estado='false'
                                      WHERE id_archivo ='$id_archivo'";
                                pg_query( $db, $MdificarLike);
                    }else{  
                        $MdificardisLike ="UPDATE public.dislikes
                                SET  estado='true'
                                   WHERE id_archivo ='$id_archivo'";
                                pg_query( $db, $MdificardisLike);
                        $MdificarLike ="UPDATE public.likes
                                SET  estado='false'
                                        WHERE id_archivo ='$id_archivo'";
                                pg_query( $db, $MdificarLike);        
                    }
                }

            echo buscarDislikes($id_archivo)."}*@{".buscarLikes($id_archivo);
        }


    function BuscarVotoArchivo($voto,$id_archivo){

        $db = Db_conexion::getInstance();
        //busca si el ususario ya realizo el voto en la tabla que selecciono y si esta activo
        $UsuariLike = "SELECT id_usuario,estado FROM $voto WHERE id_archivo ='$id_archivo'";
        $result = pg_query($db, $UsuariLike) or die("Ocurrio un error en la consulta SQL");
            
         return $result; 
    } 


    function BuscarVotoUsuario($voto,$id_usuario){

        $db = Db_conexion::getInstance();
        //busca si el ususario ya realizo el voto en la tabla que selecciono y si esta activo
        $UsuariLike = "SELECT id_usuario,estado FROM $voto WHERE id_usuario ='$id_usuario'";
        $result = pg_query($db, $UsuariLike) or die("Ocurrio un error en la consulta SQL");
            
        return $result; 
    }

    function ValidarVoto($informacion,$opcion){ 

        $datos = explode(",",$informacion);
        $correo = $datos[0];
        $id_archivo= $datos[1];
        $db = Db_conexion::getInstance();
        //busca el id del usuario para las validaciones likes y dislikes
        $buscar_usuario = "SELECT id_usuario FROM usuario WHERE correo ='$correo'";
        $result = pg_query($db, $buscar_usuario) or die("Ocurrio un error en la consulta SQL");

        while ($row = pg_fetch_row($result)) { 
            $id_usuario = $row[0]; 
        }
        // enviar los datos de id del archivo y usuario al comentario 
        $i=1 ;
        while ( $i <= 2) {
            if($i==1){
                $RegistroLike=  BuscarVotoUsuario("likes",$id_usuario);
            }else{
                $RegistroDislike=  BuscarVotoUsuario("dislikes",$id_usuario);
            }
            $i++;
                
        }
            
        if(pg_num_rows($RegistroLike) ==0 && pg_num_rows($RegistroDislike) ==0){ 

            $InserLike= " INSERT INTO public.$opcion(
                id_archivo, id_usuario, estado)
                VALUES ('$id_archivo', '$id_usuario', 'true');";
            return pg_query( $db, $InserLike);

        }else{
                
            $dato="Registrar".$opcion;
            $dato($id_archivo,$id_usuario);

        }
    } 

     
function buscarLikes($informacion){

    $query_likes = "SELECT COUNT(likes.id_archivo) filter (where likes.id_archivo = archivos.id_archivo) as likes
        FROM public.archivos, public.likes
        WHERE (archivos.id_archivo = '$informacion') 
        AND likes.estado = true";
    $db = Db_conexion::getInstance();

    $result_likes = pg_query($db, $query_likes);
    $likesCount = "";
    while ($row_likes = pg_fetch_row($result_likes)) {
        $likesCount .= "$row_likes[0]";
    }
    return $likesCount;
}

function buscarDislikes($informacion){
    $query_dislikes = "SELECT COUNT(dislikes.id_archivo) filter (where dislikes.id_archivo = archivos.id_archivo) as dislikes
        FROM public.archivos, public.dislikes
        WHERE (archivos.id_archivo = '$informacion')
        AND dislikes.estado = true";
    $db = Db_conexion::getInstance();

    $result_dislikes = pg_query($db, $query_dislikes);
    $dislikesCount = "";
    while ($row_dislikes = pg_fetch_row($result_dislikes)) {
        $dislikesCount .= "$row_dislikes[0]";
    }
    return $dislikesCount;
}

//pendiente cambiar nombre de la funcion
function comentario($informacion){
            $datos = explode(",",$informacion);
            $correo = $datos[0];
            $id_archivo= $datos[1];
            $comentario= $datos[2];
    
            $db = Db_conexion::getInstance();
            //id usuario
            $buscar_usuario = "SELECT id_usuario FROM usuario WHERE correo ='$correo'";
            $result = pg_query($db, $buscar_usuario) or die("Ocurrio un error en la consulta SQL");

            while ($row = pg_fetch_row($result)) { 
                $id_usuario = $row[0]; 
            }

            $Insertarcomentario= " INSERT INTO public.comentarios( id_usuario, id_archivo, comentario)
            VALUES ('$id_usuario', '$id_archivo', '$comentario');";
            $result_updv = pg_query( $db, $Insertarcomentario);
            if($result_updv){
                echo "1";
                pg_query("COMMIT") or die("Commit fallido");
            }else{
                echo "0";
                pg_query("ROLLBACK") or die("Rollback fallido");
            }
}
//pruebas de los comentarios, pendiente cambiar nombre de la funcion
function comentarioss($informacion){
             $db = Db_conexion::getInstance();
            $buscar_usuario = "SELECT id_usuario, comentario FROM comentarios WHERE id_archivo ='$informacion'";
            $result = pg_query($db, $buscar_usuario) or die("Ocurrio un error en la consulta SQL");

            $busqueda = pg_num_rows ($result);  
            $buscar = "";
            if ($busqueda > 0)  
            {  
                for ($i=0; $i<$busqueda; $i++)  
                {  
                    $ver = pg_fetch_row($result);    
                    $id_usuario=$ver[0];
                    $comentario = $ver[1];
                    $nombre_usuario=  BuscarUsuario($id_usuario);
                    $buscar .=   $nombre_usuario."}*@{".$comentario."]*@[";
                } 
                echo  $buscar; 
            }
}


function BuscarUsuario($id_usuario){

    $db = Db_conexion::getInstance();
    $buscar_idinfo = "SELECT id_info_usuario FROM usuario WHERE id_usuario ='$id_usuario'";
    $result = pg_query($db, $buscar_idinfo) or die("Ocurrio un error en la consulta SQL");

    while ($row = pg_fetch_row($result)) {
        $id_info_usuario = $row[0]; 
    }

    $buscar_nombre = "SELECT url_foto, nombres, apellidos FROM info_usuario WHERE id_info_usuario ='$id_info_usuario'";
    $result = pg_query($db, $buscar_nombre) or die("Ocurrio un error en la consulta SQL");
    $buscar = "";
    while ($row = pg_fetch_row($result)) { 
        $url_foto = $row[0]; 
        $nombre = $row[1]; 
        $apellido= $row[2]; 

        $buscar .=  $url_foto."}*@{".$nombre."}*@{".$apellido;
        return $buscar; 
    }

}

function modificarArchivos($informacion){
    $db = Db_conexion::getInstance();
    for($x=0; $x<sizeof($informacion); $x++){
        if($informacion[$x]===""){
            $informacion[$x] = "";
        }else{
            switch($x){
                case 1:
                    $informacion[$x] = "nombre='".$informacion[$x]."' ";
                    if($informacion[$x+1]!==""){
                        $informacion[$x] = $informacion[$x].", ";
                    }
                break;
                case 2:
                    $informacion[$x] = "descripcion='".$informacion[$x]."' ";
                    if($informacion[$x+1]!==""){
                        $informacion[$x] = $informacion[$x].", ";
                    }
                break;
                case 3:
                    $informacion[$x] = "tabla_contenidos ='".$informacion[$x]."' ";
                break;  
            }
        }
                
    }

    $query_updv = "UPDATE archivos
        SET ".$informacion[1].$informacion[2].$informacion[3]."WHERE id_archivo = '$informacion[0]'";
    $result_updv = pg_query($db, $query_updv);
    if($result_updv){
        echo "1";
        pg_query("COMMIT") or die("Commit fallido");
    }else{
        echo "0";
        pg_query("ROLLBACK") or die("Rollback fallido");
    }
}

function eliminarArchivo($informacion){
    $db = Db_conexion::getInstance();
    $query_info = "SELECT ar.direccion, ta.nombre
        FROM archivos ar, tipo_archivo ta
        WHERE (ar.id_archivo = '$informacion')
        AND (ar.id_tipo_archivo = ta.id_tipo_archivo)";
    $result_info = pg_query($db, $query_info);
    while ($row_info = pg_fetch_row($result_info)) {
        $busqueda = "$row_info[0], $row_info[1]";
    }

    $query_eliminar = "UPDATE archivos SET estado='false' WHERE id_archivo = '$informacion'";
    $result_updv = pg_query($db, $query_eliminar);
    if($result_updv){
        echo $busqueda;
       pg_query("COMMIT") or die("Commit fallido");
    }else{
        echo "0";
        pg_query("ROLLBACK") or die("Rollback fallido");
    }
}

function buscarArchivosOpc($informacion){
    $db = Db_conexion::getInstance();
    $query_busqueda = "SELECT ar.id_archivo, ar.nombre, ta.id_tipo_archivo
        from public.archivos ar, public.tipo_archivo ta
        where (LOWER(ar.nombre) like LOWER('%%$informacion%%'))
        AND ar.estado = 'true'
        AND (ar.id_tipo_archivo = ta.id_tipo_archivo)
        ORDER BY random()
        LIMIT 10";
    $result_info = pg_query($db, $query_busqueda);
    $busqueda = "";
    while ($row_info = pg_fetch_row($result_info)) {
        $busqueda .= " ]@*[ $row_info[0] }@*{ $row_info[1] }@*{ $row_info[2]";
    }
    echo $busqueda;
}