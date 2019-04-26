<?php
if($_SERVER['HTTP_ORIGIN'] == "https://ucctubemedia.netlify.com") {
  header("Access-Control-Allow-Origin: https://ucctubemedia.netlify.com");
  echo 'Server connected';
}

include("api.php");

    if(
        isset($_POST["nombre"])
        ||isset($_POST["apellido"])
        ||isset($_POST["correo"])
        ||isset($_POST["contraseña"])
        ||isset($_POST["confirmar"])
    ){
      $nombre=$_POST["nombre"];
      $apellido=$_POST["apellido"];
      $correo=$_POST["correo"];
      $contraseña=$_POST["contraseña"];
      $contraseña1=$_POST["confirmar"];
      validar($nombre,$apellido,$correo,$contraseña,$contraseña1);
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
    if(
      isset($_POST["nombreBD"])
      ||isset($_POST["apellidoBD"])
      ||isset($_POST["correoBD"])
    ){
      guardarBD($_POST["nombreBD"],$_POST["apellidoBD"],$_POST["correoBD"]);
    }

    if(isset($_POST["correoUR"])){
      buscarUsuarioExistente($_POST["correoUR"]);
    }
  
?>


