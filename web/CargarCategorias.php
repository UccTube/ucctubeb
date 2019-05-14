
<?php

include("conexion.php");
ob_start();

$query="SELECT nombre_categoria FROM categorias ORDER BY nombre";
$result = mysql_query($query)
        or die("Ocurrio un error en la consulta SQL");
mysql_close();
echo '<option value="0">Seleccionar</option>';
while (($fila = mysql_fetch_array($result)) != NULL) {
    echo '<option value="'.$fila["nombre_categoria"].'"></option>';
}
// Liberar resultados
mysql_free_result($result);
 
// Cerrar la conexión
mysql_close($link);



?>
