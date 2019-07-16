<?php
    header('Access-Control-Allow-Origin: *');
    
    if(isset($_POST["tipoCarga"])){
        require './metodosDB.php';
        if($_POST["tipoCarga"]==='Todo'){
            dirigirInformacion("","Mostrar","Todo");
        }else if($_POST["tipoCarga"]==='Documentos'){
            dirigirInformacion("","Mostrar","Documentos");
        }else if($_POST["tipoCarga"]==='Imagenes'){
            dirigirInformacion("","Mostrar","Imagenes");
        }else if($_POST["tipoCarga"]==='Presentaciones'){
            dirigirInformacion("","Mostrar","Presentaciones");
        }else if($_POST["tipoCarga"]==='Videos'){
            dirigirInformacion("","Mostrar","Videos");
        }
    }

    if(isset($_POST["textoBusqueda"])){
        require './metodosDB.php';
        dirigirInformacion($_POST["textoBusqueda"],"Buscar", "Archivos-Busqueda");
    }

    if(isset($_POST["subirArchivo"])){
        require './metodosDB.php';
        dirigirInformacion($_POST["subirArchivo"],"Insertar", "Archivo");
    }

    if(isset($_POST["categoriasMostrar"])){
        require './metodosDB.php';
        dirigirInformacion($_POST["categoriasMostrar"],"Buscar", "Categorias-Todas");
    }  

    if(isset($_POST["buscarArchivo"])){
        require './metodosDB.php';
        dirigirInformacion($_POST["buscarArchivo"], "Buscar", "Archivos-Id");
    }

    if(isset($_POST["buscarArchivosUsuarios"])){
        require './metodosDB.php';
        dirigirInformacion($_POST["buscarArchivosUsuarios"], "Buscar", "Archivos-Usuario");
    }

    if(isset($_POST["likes"])){
        //registrar los likes 
        require './metodosDB.php';
        dirigirInformacion($_POST["likes"], "Insertar", "Interacciones-likes");
    }

    if(isset($_POST["dislikes"])){
        //registrar los dislikes 
        require './metodosDB.php';
        dirigirInformacion($_POST["dislikes"], "Insertar", "Interacciones-dislikes");
    }

    if(isset($_POST["comentario"])){
        //registrar los comentarios 
        require './metodosDB.php';
        dirigirInformacion($_POST["comentario"], "Insertar", "Interacciones-comentario");
    }

    if(isset($_POST["CargarComentarios"])){
        //registrar los comentarios 
        require './metodosDB.php';
        dirigirInformacion($_POST["CargarComentarios"], "Insertar", "Interacciones-CargarComentarios");
    }

    if(isset($_POST["actualizarVideo"])){
        require './metodosDB.php';
        dirigirInformacion($_POST["actualizarVideo"], "Modificar", "Archivo");
    }
   
    if(isset($_POST["eliminarArchivo"])){
        require './metodosDB.php';
        dirigirInformacion($_POST["eliminarArchivo"], "Eliminar", "Archivo");
    }
?>