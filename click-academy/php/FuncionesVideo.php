<?php
include("conexion.php");
ob_start();
# Saber si el voto es negativo o positivo
$voto = htmlentities($_GET['voto']);
echo($voto);
# Tomamos el id de nuestro post y vemos todas las ip que pusieron megusta
$id =  $_GET['id_usuario'];
echo($id);


# Me gusta o No me gusta
switch($voto)
{
case "positivo";
            pg_query ("INSERT INTO likes  (id_archivo,id_usuario,estado)  
            VALUES ('archivo1 ','$id','true')") ;		
break;	

case "negativo";
            pg_query ("INSERT INTO dislikes  (id_archivo,id_usuario,estado)  
            VALUES ('archivo1 ','$id','true')") ;	    

break;
}








// $SQL = "SELECT * FROM usuario " ;
// $result = pg_query($SQL) or die('Query failed: ' . pg_last_error());
// $rows = pg_numrows($result);
?>

 <?php	
//    # Saber si el voto es negativo o positivo
// $voto = htmlentities($_GET['voto']);

// # Tomamos el id de nuestro post y vemos todas las ip que pusieron megusta
// $id = (int) $_GET['id_usuario'];
// $query = mysqli_query($link,"SELECT id,ips FROM post WHERE id='".$id."'");
// $row = mysqli_fetch_assoc($query);
// $ip = $row['ips'];

//  if(isset($_POST['Like'])) 
// { 
    // pg_query ("INSERT INTO likes  (id_archivo,id_usuario,estado)  
    // VALUES ('archivo1 ','U1-06052019','true')") ;

    // $SQL = "SELECT id_usuario FROM likes " ;
    // $result = pg_query($SQL) or die('Query failed: ' . pg_last_error());
    // $rows = pg_numrows($result);

// for($i=1;$i<=$rows; $i++){
//     $line = pg_fetch_array($result, null, PGSQL_ASSOC);
//     echo "<div id= 'viewVideo'>
//      <iframe   src='$line[_url]' frameborder='0' allowfullscreen='allowfullscreen'></iframe> 
//     </div>";
//    }  
// } 
// ?>  

