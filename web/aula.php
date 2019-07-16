<?php
    header('Access-Control-Allow-Origin: *');

    if(isset($_POST["buscarUsuario"])){
        require './metodosDB.php';
        dirigirInformacion($_POST["buscarUsuario"], "Buscar", "Usuario-Id");
    }

    if(isset($_POST["buscarUsuarioPersonal"])){
        require './metodosDB.php';
        dirigirInformacion($_POST["buscarUsuarioPersonal"], "Buscar", "Usuario-CorreoP");
    }

    if(isset($_POST["buscarArchivosUsuarioTodos"])){
        require './metodosDB.php';
        dirigirInformacion($_POST["buscarArchivosUsuarioTodos"], "Buscar", "Archivos-Usuario-P-Todos");
    }
    if(isset($_POST["buscarArchivosUsuarioVideos"])){
        require './metodosDB.php';
        dirigirInformacion($_POST["buscarArchivosUsuarioVideos"], "Buscar", "Archivos-Usuario-P-Videos");
    }
    if(isset($_POST["buscarArchivosUsuarioImagenes"])){
        require './metodosDB.php';
        dirigirInformacion($_POST["buscarArchivosUsuarioImagenes"], "Buscar", "Archivos-Usuario-P-Imagenes");
    }
    if(isset($_POST["buscarArchivosUsuarioPresentaciones"])){
        require './metodosDB.php';
        dirigirInformacion($_POST["buscarArchivosUsuarioPresentaciones"], "Buscar", "Archivos-Usuario-P-Presentaciones");
    }
    if(isset($_POST["buscarArchivosUsuarioDocumentos"])){
        require './metodosDB.php';
        dirigirInformacion($_POST["buscarArchivosUsuarioDocumentos"], "Buscar", "Archivos-Usuario-P-Documentos");
    }


    if(isset($_POST["buscarArchivosUsuarioExternoTodos"])){
        require './metodosDB.php';
        dirigirInformacion($_POST["buscarArchivosUsuarioExternoTodos"], "Buscar", "Archivos-Usuario-E-Todos");
    }
    if(isset($_POST["buscarArchivosUsuarioExternoVideos"])){
        require './metodosDB.php';
        dirigirInformacion($_POST["buscarArchivosUsuarioExternoVideos"], "Buscar", "Archivos-Usuario-E-Videos");
    }
    if(isset($_POST["buscarArchivosUsuarioExternoImagenes"])){
        require './metodosDB.php';
        dirigirInformacion($_POST["buscarArchivosUsuarioExternoImagenes"], "Buscar", "Archivos-Usuario-E-Imagenes");
    }
    if(isset($_POST["buscarArchivosUsuarioExternoPresentaciones"])){
        require './metodosDB.php';
        dirigirInformacion($_POST["buscarArchivosUsuarioExternoPresentaciones"], "Buscar", "Archivos-Usuario-E-Presentaciones");
    }
    if(isset($_POST["buscarArchivosUsuarioExternoDocumentos"])){
        require './metodosDB.php';
        dirigirInformacion($_POST["buscarArchivosUsuarioExternoDocumentos"], "Buscar", "Archivos-Usuario-E-Documentos");
    }
?>