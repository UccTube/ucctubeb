<?php
  header('Access-Control-Allow-Origin: *');
  /**
  * Función para buscar si el usuario existe en la base de datos-->>Redirige a metodosDB.php
  */
    if(isset($_POST["usuarioRegistrado"])){
      require 'metodosDB.php';
      dirigirInformacion($_POST["usuarioRegistrado"], 'Buscar', 'Usuario-Registrado');
    }

  /**
  * Función para guardar el usuario en la base de datos
  */
    if(
      isset($_POST["guardarDatos"])
    ){
      require 'metodosDB.php';      
      dirigirInformacion($_POST["guardarDatos"], 'Insertar', 'Usuario');
    }

  /**
   * Función para actualizar la información del usuario en la base de datos
   */
  if(
    isset($_POST["actualizarDatos"])
  ){
    require 'metodosDB.php';      
    dirigirInformacion($_POST["actualizarDatos"], 'Modificar', 'Usuario-Informacion');
  }
  if(
    isset($_POST["fotoAct"])
  ){
    require 'metodosDB.php';      
    dirigirInformacion($_POST["fotoAct"], 'Modificar', 'Usuario-Foto');
  }
?>


