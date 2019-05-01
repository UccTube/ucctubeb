<?php
  header('Access-Control-Allow-Origin: https://ucctubemedia.netlify.com');

  /**
   * Función para validar los campos
   */
    if(
        isset($_POST["validar"])
    ){
      $validar = explode(",", $_POST["validar"]);
      validar($validar);
    }

    function validar($informacion){
      $info_num = count($informacion);
        $vacio = false;
      for($x = 0; $x < $info_num; $x++) {
        if($informacion[$x]==""){
          $vacio = true;
        }
      }
      if (  $vacio == true ) 
      {
        echo "Todos los campos son obligatorios";
      } else if ($informacion[3] !== $informacion[4]) {
        echo "Las contraseñas no coinciden";
      } else if (strlen($informacion[3]) < 8) {
        echo "La contraseña es poco segura";
      } else if(!filter_var($informacion[2], FILTER_VALIDATE_EMAIL)){
        echo "El correo electrónico no es válido";
      }else if(preg_match("/@campusucc.edu.co$/", $informacion[2])!=1){
        echo "El correo eletrónico debe pertenecer a la Universidad Cooperativa de Colombia";
      }else{
        echo "1";
      }
    }
  /**
  * Función para buscar si el usuario existe en la base de datos-->>Redirige a metodosDB.php
  */
    if(isset($_POST["usuarioRegistrado"])){
      require 'metodosDB.php';
      buscarUsuarioCorreo($_POST["usuarioRegistrado"], 'Buscar', 'Usuario');
    }

  /**
  * Función para guardar el usuario en la base de datos
  */
    if(
      isset($_POST["guardarDatos"])
    ){
      require 'metodosDB.php';      
      guardarBD($_POST["guardarDatos"], 'Insertar', 'Usuario');
    }

?>


