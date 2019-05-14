<?php

include("conexion.php");
ob_start();

if(isset($_POST['caja_valor'])){
    $url = $_POST["caja_valor"];
    echo "<script>
    alert('$url');
                 
</script>";
}else {   echo "<script>
    alert('null');
                 
</script>";}

if(isset($_POST['NombreVideo'])){
    
    $Nombre = $_POST['NombreVideo'];
    $Descripcion = $_POST['Mensaje'];
    $Categoria = $_POST['Categoria'];
    "<script>
    alert('null');
                 
</script>";
 
}
     $id_archivo = uniqid('archivo_');
     
        pg_query ("INSERT INTO archivos  (id_archivo,_url,nombre,descripcion,id_usuarios,id_categorias)  
        VALUES ('$id_archivo ','$url','$Nombre','$Descripcion','22','Tecn-01')") ;
        echo pg_last_error($connect);
        
     echo "<script>
                alert('Video ingresado con exito');
              //  window.history.back();
             //                
    </script>";
    header("Location: ../php/Usuario.html"); 
  
    ?>