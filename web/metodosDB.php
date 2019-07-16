<?php
    header('Access-Control-Allow-Origin: *');
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
     * Método para dirigir la información a la opción seleccionada
     */
    function dirigirInformacion($informacion, $crud, $opcion){
        switch ($crud){
            case "Buscar":
                buscarInformacion($informacion, $opcion);
                break;
            case "Insertar":
                añadirInformacion($informacion, $opcion);
                break; 
            case "Modificar":
                modificarInformacion($informacion, $opcion);
                break;
            case "Eliminar":
                eliminarInformacion($informacion, $opcion);
                break;
            case "Mostrar":
                MostrarVista($opcion);
                break;
            default: 
                echo "No se reconoce la opción seleccionada CRUD";
                break;                               
        }
    } 

    /**
    * Buscar en la base de datos
    */
    function buscarInformacion($informacion, $opcion){

        $metodo = explode("-", $opcion);

        switch ($metodo[0]){
            case "Usuario":
                require 'metodosDB/usuario.php';
                if($metodo[1]=="Registrado"){  buscarUsuarioRegistrado($informacion); }
                else if($metodo[1]=="Id"){buscarUsuarioId($informacion);}
                else if($metodo[1]=="CorreoP"){buscarUsuarioCorreoP($informacion);}
                break;
            case "Registros":
                totalRegistros($informacion);
                break;
            case "Archivos":
                require 'metodosDB/archivo.php';
                switch($metodo[1]){
                    case "Id":
                        buscarArchivoId($informacion);
                        break;

                    case "Usuario" :
                        if($metodo[2]=="P"){
                            switch($metodo[3]){
                                case "Todos":
                                    buscarArchivosUsuarioCorreo($informacion);
                                break;
                                case "Presentaciones":
                                    buscarPresentacionesUsuarioCorreo($informacion);
                                break;
                                case "Imagenes":
                                    buscarImagenesUsuarioCorreo($informacion);
                                break;
                                case "Documentos":
                                    buscarDocumentosUsuarioCorreo($informacion);
                                break;
                                case "Videos":
                                    buscarVideosUsuarioCorreo($informacion);
                                break;
                            }
                        }else if($metodo[2]=="E"){
                            switch($metodo[3]){
                                case "Todos":
                                    buscarArchivosUsuario($informacion);
                                break;
                                case "Presentaciones":
                                    buscarPresentacionesUsuario($informacion);
                                break;
                                case "Imagenes":
                                    buscarImagenesUsuario($informacion);
                                break;
                                case "Documentos":
                                    buscarDocumentosUsuario($informacion);
                                break;
                                case "Videos":
                                    buscarVideosUsuario($informacion);
                                break;
                            }
                        }
                        
                    break;
                    case "Busqueda":
                        buscarArchivosOpc($informacion);
                    break;        
                }
            break;
            case "Categorias":
                require 'metodosDB/miniaturas.php';
                switch($metodo[1]){
                    case "Todas":
                        buscarCategoria();
                        break;
                }
                break;
            default:
                echo "No se reconoce la opción seleccionada objeto";
                break;
        }

    }

        

        /**
         * Total de registros
         */

    /**
    * Añadir a la base de datos
    */
    function añadirInformacion($informacion, $opcion){
        $metodo= explode("-",$opcion);
        switch ($metodo[0]){
            case "Usuario":
                require 'metodosDB/usuario.php';
                registrarUsuario($informacion);
                break;
            case "Archivo":
                require 'metodosDB/archivo.php';
                registrarArchivo($informacion);
                break;   
            case "Interacciones":

                switch($metodo[1]){
                    case "likes":
                    require 'metodosDB/archivo.php';
                    ValidarVoto($informacion,$metodo[1]);
                    break;

                    case "dislikes":
                    require 'metodosDB/archivo.php';
                    ValidarVoto($informacion,$metodo[1]);
                    break;

                    case "comentario":
                    require 'metodosDB/archivo.php';
                    comentario($informacion);
                    break;

                    case "CargarComentarios":
                    require 'metodosDB/archivo.php';
                    comentarioss($informacion);
                    break;

                } 
            break;

            default:
                echo "No se reconoce la opción seleccionada";
                break;
        }
    }

    /**
    * Eliminar de la base de datos
    */

    function eliminarInformacion($informacion, $opcion){
        switch ($opcion){
            case "Archivo":
                require 'metodosDB/archivo.php';
                eliminarArchivo($informacion);
            break;
        }
    }

    /**
    * Actualizar información de la base de datos 
    */
    function modificarInformacion($informacion, $opcion){
        $opcion = explode("-", $opcion);
        switch($opcion[0]){
            case "Usuario":
                require 'metodosDB/usuario.php';
                switch($opcion[1]){
                    case "Informacion":
                        modificarUsuarioInfo($informacion);
                    break;
                    case "Foto":
                        modificarUsuarioFoto($informacion);
                    break;        
                }
            break;
            case "Archivo":
                require 'metodosDB/archivo.php';
                modificarArchivos($informacion);
            break;    
            default:
                echo "La opción elegida no está disponible a modificaciones";
            break;
        }
    }
    
    /**
     * Mostrar un archivo de la base de datos
     */
    function mostrarVista($opcion){
        switch($opcion){
            case 'Videos':
                require 'metodosDB/miniaturas.php';
                buscarVideos();
                break;    
            case 'Imagenes':
                require 'metodosDB/miniaturas.php';
                buscarImgs();
                break;    
            case 'Presentaciones':
                require 'metodosDB/miniaturas.php';
                buscarPresentaciones();
                break; 
            case 'Documentos':
                require 'metodosDB/miniaturas.php';
                buscarDocumentos();
                break;
            case 'Todo':
                require 'metodosDB/miniaturas.php';
                buscarTodo();
        }
    }