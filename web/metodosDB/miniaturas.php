<?php

header('Access-Control-Allow-Origin: *');

function buscarArchivosNuevos(){
    $buscarVideos = "SELECT id_archivo, nombre, fecha_creacion, id_tipo_archivo FROM public.archivos 
    WHERE estado = 'true' 
    ORDER BY fecha_creacion DESC  LIMIT 10";
    $db = Db_conexion::getInstance();
    $result = pg_query($db, $buscarVideos);

    $busqueda = "Nuevos";

    while ($row = pg_fetch_row($result)) {
        $busqueda .= "¬¬ $row[0] }*@{ $row[1] }*@{ $row[2] }*@{ $row[3]";
    }
    return $busqueda;
}

function buscarArchivosRandom(){
    $buscarUsuarios = "SELECT id_archivo, nombre, fecha_creacion, id_tipo_archivo FROM public.archivos WHERE estado = 'true'
            ORDER BY random()
            LIMIT 10";
    $db = Db_conexion::getInstance();
    $result = pg_query($db, $buscarUsuarios);    

    $busqueda = "Random";
    while ($row = pg_fetch_row($result)) {
        $busqueda .= "¬¬ $row[0] }*@{ $row[1] }*@{ $row[2] }*@{ $row[3]";
    }
    return $busqueda;
}

function buscarArchivosLikes(){
    $buscarArchivosMasLikes = "SELECT archivos.id_archivo, archivos.nombre,
        COUNT(likes.id_archivo) filter (where likes.id_archivo = archivos.id_archivo) as likes, id_tipo_archivo
            FROM public.archivos, public.likes
            WHERE archivos.estado = 'true'
            GROUP BY archivos.id_archivo, archivos.nombre
            ORDER BY 3 DESC
            LIMIT 10";
    $db = Db_conexion::getInstance(); 
    $result = pg_query($db, $buscarArchivosMasLikes);       

    $busqueda = "Favoritos";
    while ($row = pg_fetch_row($result)) {
        $busqueda .= "¬¬ $row[0] }*@{ $row[1] }*@{ $row[2] }*@{ $row[3]";
    }
    return $busqueda;
}

function buscarUsuariosRandom(){
    $buscarUsuarios = "SELECT usuario.id_usuario, CONCAT(info_usuario.nombres, ' ', info_usuario.apellidos) as nombre_usuario, info_usuario.url_foto
            FROM public.usuario, public.info_usuario
            where info_usuario.id_info_usuario = usuario.id_info_usuario AND usuario.estado = true 
            ORDER BY random()
            LIMIT 10;";
    $db = Db_conexion::getInstance();
    $result = pg_query($db, $buscarUsuarios);    

    $busqueda = "Usuarios ";
    while ($row = pg_fetch_row($result)) {
        $busqueda .= "¬¬ $row[0] }*@{ $row[1] }*@{ $row[2]";
    }
    return $busqueda;
}

function buscarDocumentosRandom(){
    $buscarDocs = "SELECT ar.id_archivo, ar.nombre
    from public.archivos ar
    where ((ar.id_tipo_archivo = 'TA-5c3f65c476ecc7.01202468') 
    OR (ar.id_tipo_archivo = 'TA-6fa345c476ecc7.01202288') )
    AND estado = 'true'
    ORDER BY random()
    LIMIT 10";
    $db = Db_conexion::getInstance();
    $result = pg_query($db, $buscarDocs);    

    $busqueda = "Random";
    while ($row = pg_fetch_row($result)) {
    $busqueda .= "¬¬ $row[0], $row[1], $row[2]";
    }
    return $busqueda;
}

function buscarDocumentosNuevos(){
    $buscarDocs = "SELECT ar.id_archivo, ar.nombre, ar.fecha_creacion
    from public.archivos ar
    where ((ar.id_tipo_archivo = 'TA-5c3f65c476ecc7.01202468') 
    OR (ar.id_tipo_archivo = 'TA-6fa345c476ecc7.01202288') )
    AND estado = 'true'
    ORDER BY fecha_creacion
    LIMIT 10";
    $db = Db_conexion::getInstance();
    $result = pg_query($db, $buscarDocs);    

    $busqueda = "Nuevos";
    while ($row = pg_fetch_row($result)) {
    $busqueda .= "¬¬ $row[0], $row[1], $row[2]";
    }
    return $busqueda;
}

function buscarDocumentosLikes(){
    $buscarDocs = "SELECT ar.id_archivo, ar.nombre,
    COUNT(likes.id_archivo) filter (where likes.id_archivo = ar.id_archivo) as likes
    from public.archivos ar, public.likes
    where ((ar.id_tipo_archivo = 'TA-5c3f65c476ecc7.01202468') 
    OR (ar.id_tipo_archivo = 'TA-6fa345c476ecc7.01202288') )
    AND ar.estado = 'true'
    GROUP BY ar.id_archivo, ar.nombre
    ORDER BY fecha_creacion
    LIMIT 10";
    $db = Db_conexion::getInstance();
    $result = pg_query($db, $buscarDocs);    

    $busqueda = "Favoritos";
    while ($row = pg_fetch_row($result)) {
    $busqueda .= "¬¬ $row[0], $row[1], $row[2]";
    }
    return $busqueda;
}

function buscarVideosRandom(){
    $buscarDocs = "SELECT ar.id_archivo, ar.nombre
    from public.archivos ar
    where (ar.id_tipo_archivo = 'TA-5ce165c476dfc7.01202288')
    AND estado = 'true'
    ORDER BY random()
    LIMIT 10";
    $db = Db_conexion::getInstance();
    $result = pg_query($db, $buscarDocs);    

    $busqueda = "Random";
    while ($row = pg_fetch_row($result)) {
    $busqueda .= "¬¬ $row[0], $row[1], $row[2]";
    }
    return $busqueda;
}

function buscarVideosNuevos(){
    $buscarDocs = "SELECT ar.id_archivo, ar.nombre, ar.fecha_creacion
    from public.archivos ar
    where (ar.id_tipo_archivo = 'TA-5ce165c476dfc7.01202288')
    AND estado = 'true'
    ORDER BY fecha_creacion
    LIMIT 10";
    $db = Db_conexion::getInstance();
    $result = pg_query($db, $buscarDocs);    

    $busqueda = "Nuevos";
    while ($row = pg_fetch_row($result)) {
    $busqueda .= "¬¬ $row[0], $row[1], $row[2]";
    }
    return $busqueda;
}

function buscarVideosLikes(){
    $buscarDocs = "SELECT ar.id_archivo, ar.nombre,
    COUNT(likes.id_archivo) filter (where likes.id_archivo = ar.id_archivo) as likes
    from public.archivos ar, public.likes
    where (ar.id_tipo_archivo = 'TA-5ce165c476dfc7.01202288') 
    AND ar.estado = 'true'
    GROUP BY ar.id_archivo, ar.nombre
    ORDER BY fecha_creacion
    LIMIT 10";
    $db = Db_conexion::getInstance();
    $result = pg_query($db, $buscarDocs);    

    $busqueda = "Favoritos";
    while ($row = pg_fetch_row($result)) {
    $busqueda .= "¬¬ $row[0], $row[1], $row[2]";
    }
    return $busqueda;
}

function buscarImgsRandom(){
    $buscarDocs = "SELECT ar.id_archivo, ar.nombre
    from public.archivos ar
    where (ar.id_tipo_archivo = 'TA-4ad165c476ecc7.01202288')
    AND estado = 'true'
    ORDER BY random()
    LIMIT 10";
    $db = Db_conexion::getInstance();
    $result = pg_query($db, $buscarDocs);    

    $busqueda = "Random";
    while ($row = pg_fetch_row($result)) {
    $busqueda .= "¬¬ $row[0], $row[1], $row[2]";
    }
    return $busqueda;
}

function buscarImgsNuevos(){
    $buscarDocs = "SELECT ar.id_archivo, ar.nombre, ar.fecha_creacion
    from public.archivos ar
    where (ar.id_tipo_archivo = 'TA-4ad165c476ecc7.01202288')
    AND estado = 'true'
    ORDER BY fecha_creacion
    LIMIT 10";
    $db = Db_conexion::getInstance();
    $result = pg_query($db, $buscarDocs);    

    $busqueda = "Nuevos";
    while ($row = pg_fetch_row($result)) {
    $busqueda .= "¬¬ $row[0], $row[1], $row[2]";
    }
    return $busqueda;
}

function buscarImgsLikes(){
    $buscarDocs = "SELECT ar.id_archivo, ar.nombre,
    COUNT(likes.id_archivo) filter (where likes.id_archivo = ar.id_archivo) as likes
    from public.archivos ar, public.likes
    where (ar.id_tipo_archivo = 'TA-4ad165c476ecc7.01202288') 
    AND ar.estado = 'true'
    GROUP BY ar.id_archivo, ar.nombre
    ORDER BY fecha_creacion
    LIMIT 10";
    $db = Db_conexion::getInstance();
    $result = pg_query($db, $buscarDocs);    

    $busqueda = "Favoritos";
    while ($row = pg_fetch_row($result)) {
    $busqueda .= "¬¬ $row[0], $row[1], $row[2]";
    }
    return $busqueda;
}

function buscarPresentacionesRandom(){
    $buscarDocs = "SELECT ar.id_archivo, ar.nombre
    from public.archivos ar
    where (ar.id_tipo_archivo = 'TA-6cb165c476ecc7.01202288')
    AND estado = 'true'
    ORDER BY random()
    LIMIT 10";
    $db = Db_conexion::getInstance();
    $result = pg_query($db, $buscarDocs);    

    $busqueda = "Random";
    while ($row = pg_fetch_row($result)) {
    $busqueda .= "¬¬ $row[0], $row[1], $row[2]";
    }
    return $busqueda;
}

function buscarPresentacionesNuevos(){
    $buscarDocs = "SELECT ar.id_archivo, ar.nombre, ar.fecha_creacion
    from public.archivos ar
    where (ar.id_tipo_archivo = 'TA-6cb165c476ecc7.01202288')
    AND ar.estado = 'true'
    ORDER BY fecha_creacion
    LIMIT 10";
    $db = Db_conexion::getInstance();
    $result = pg_query($db, $buscarDocs);    

    $busqueda = "Nuevos";
    while ($row = pg_fetch_row($result)) {
    $busqueda .= "¬¬ $row[0], $row[1], $row[2]";
    }
    return $busqueda;
}

function buscarPresentacionesLikes(){
    $buscarDocs = "SELECT ar.id_archivo, ar.nombre,
    COUNT(likes.id_archivo) filter (where likes.id_archivo = ar.id_archivo) as likes
    from public.archivos ar, public.likes
    where (ar.id_tipo_archivo = 'TA-6cb165c476ecc7.01202288') 
    AND ar.estado = 'true'
    GROUP BY ar.id_archivo, ar.nombre
    ORDER BY fecha_creacion
    LIMIT 10";
    $db = Db_conexion::getInstance();
    $result = pg_query($db, $buscarDocs);    

    $busqueda = "Favoritos";
    while ($row = pg_fetch_row($result)) {
    $busqueda .= "¬¬ $row[0], $row[1], $row[2]";
    }
    return $busqueda;
}

function buscarTodo(){
    echo buscarArchivosRandom()."}{". buscarArchivosNuevos()."}{".buscarUsuariosRandom()."}{".buscarArchivosLikes();
}

function buscarDocumentos(){
    echo buscarDocumentosRandom()."}{". buscarDocumentosNuevos()."}{".buscarDocumentosLikes();
}

function buscarVideos(){
    echo buscarVideosRandom()."}{". buscarVideosNuevos()."}{".buscarVideosLikes();
}

function buscarImgs(){
    echo buscarImgsRandom()."}{". buscarImgsNuevos()."}{".buscarImgsLikes();
}

function buscarPresentaciones(){
    echo buscarPresentacionesRandom()."}{". buscarPresentacionesNuevos()."}{".buscarPresentacionesLikes();
}


function buscarCategoria(){
    $db = Db_conexion::getInstance();
   $query_categorias = "SELECT nombre, id_categoria FROM public.categorias";
   $result = pg_query($db, $query_categorias);    
   $busqueda = "Seleccione una categoría ";
   while ($row = pg_fetch_row($result)) {
       $busqueda .= "¬¬ $row[0] , $row[1]";
   }
   echo $busqueda;
}

?>