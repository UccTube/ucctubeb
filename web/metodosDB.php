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
            default: 
                echo "No se reconoce la opción seleccionada";
                break;                               
        }

    } 

    /**
    * Buscar en la base de datos
    */
    function buscarInformacion($informacion, $opcion){

        $metodo = explode($opcion, " ");

        switch ($opcion){
            case "Usuario":
                require 'metodosDB/usuario.php';
                if($metodo[1]=="Registrado"){
                    buscarUsuario($informacion);
                }
                break;
            case "Registros":
                totalRegistros($informacion);
                break;
            default:
                echo "No se reconoce la opción seleccionada";
                break;
        }

    }

        

        /**
         * Total de registros
         */

    /**
    * Añadir a la base de datos
    */

    /**
    * Eliminar de la base de datos
    */

    /**
    * Actualizar información de la base de datos 
    */
    