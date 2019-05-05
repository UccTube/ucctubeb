<?php
  header('Access-Control-Allow-Origin: *');
  /**
  * Función para buscar si el usuario existe en la base de datos-->>Redirige a metodosDB.php
  */
    if(isset($_POST["usuarioRegistrado"])){
      require 'metodosDB.php';
      echo 'entroq';
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

?>


