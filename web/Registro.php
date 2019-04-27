<?php
  header('Access-Control-Allow-Origin: https://ucctubemedia.netlify.com');
    if(
        isset($_POST["nombre"])
        ||isset($_POST["apellido"])
        ||isset($_POST["correo"])
        ||isset($_POST["contraseña"])
        ||isset($_POST["confirmar"])
    ){
      validar($_POST["nombre"],$_POST["apellido"],$_POST["correo"],$_POST["contraseña"],$_POST["confirmar"]);
      echo "Entro";
    }

    function validar($nombre, $apellidos, $correo, $contraseña, $contraseña1){
        if (
          $nombre == "" ||
          $apellidos == "" ||
          $correo == "" ||
          $contraseña == "" ||
          $contraseña1 == ""
        ) {
          echo "Todos los campos son obligatorios";
        } else if ($contraseña !== $contraseña1) {
          echo "Las contraseñas no coinciden";
        } else if (strlen($contraseña) < 8) {
          echo "La contraseña es poco segura";
        } else if(!filter_var($correo, FILTER_VALIDATE_EMAIL)){
            echo "El correo electrónico no es válido";
        }else if(preg_match("/@campusucc.edu.co$/", $correo)!=1){
            echo "El correo eletrónico debe pertenecer a la Universidad Cooperativa de Colombia";
        }else{
          echo "1";
        }
    }
    // if(
    //   isset($_POST["nombreBD"])
    //   ||isset($_POST["apellidoBD"])
    //   ||isset($_POST["correoBD"])
    // ){
    //   include("api.php");
    //   guardarBD($_POST["nombreBD"],$_POST["apellidoBD"],$_POST["correoBD"]);
    // }

    // if(isset($_POST["correoUR"])){
    //   include("api.php");
    //   buscarUsuarioExistente($_POST["correoUR"]);
    // }
  
?>


