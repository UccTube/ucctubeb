<?php
    header('Access-Control-Allow-Origin: *');
    require 'metodosDB.php';
?>

<div class="Resaltar">
    <?php
        $opcion = array('Video','Usuario','Presentacion','Documento');
        $seleccion = array_rand($opcion);
        dirigirInformacion(null,'Listar', $seleccion);
    ?>
</div>