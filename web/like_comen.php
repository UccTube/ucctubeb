<?php
// ingresa los likes, dislikes, y comentarios de los archivos


include("conexion.php");

# Saber si el voto es negativo o positivo
$voto = htmlentities($_GET['voto']);
# Se obtiene el id del usuario
$Id_usuario = htmlentities($_GET['id_usuario']);


    $SQL = "SELECT * FROM disLikes ";
    $result = pg_query($SQL) or die('Query failed: ' . pg_last_error());
    $rows = pg_numrows($result);
    $regis=false;


   for($i=1;$i<=$rows; $i++){
  
    $line = pg_fetch_array($result, null, PGSQL_ASSOC);
  
    if($line['id_usuario'] == $Id_usuario){
        $id_ = ($line['id_usuario']);
        echo("$line[id_usuario]");
        echo("Ya voto");
        $regis=true;
    }
  
}


  
  if($regis==false){
   
            switch($voto)
            {
            case "positivo";
                        pg_query ("INSERT INTO likes  (id_archivo,id_usuario,estado)  
                        VALUES ('archivo1 ','$Id_usuario','true')") ;	
                        echo("positivo");	
            break;	
            
            case "negativo";
                        pg_query ("INSERT INTO dislikes  (id_archivo,id_usuario,estado)  
                        VALUES ('archivo1 ','$Id_usuario','true')") ;	    
                        echo("negativo");	
            break;
            }
            
  }







 



?>