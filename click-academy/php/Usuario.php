
<?php 
include("conexion.php");
ob_start();

$conn= "host='$host' dbname='$dbname' port='$port'  password='$pass'  user='$user'  ";
$connect = pg_connect($conn) or die("Error query." . pg_last_error()); 
?>

<!DOCTYPE html>

<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <!--Hojas de estilo-->
    <link rel="stylesheet" href="../styles/menustyle.css" />
    <link rel="stylesheet" href="../styles/menusesionstyle.css" />
    <link rel="stylesheet" href="../styles/NuevoVideo.css" />
    <link rel="stylesheet" href="../styles/ViewVideo.css" />

    <!---->
    <!--Tipos de letra-->
    <link
      href="https://fonts.googleapis.com/css?family=Black+Ops+One|Cantarell|Cardo&amp;subset=latin-ext"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
      integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
      crossorigin="anonymous"
    />
    <!---->
    <!--Función para el menú lateral-->
    <script>
      function toggleNavPanel(x, maxW) {
        var panel = document.getElementById(x);
        if (panel.style.width == maxW) {
          panel.style.width = "0px";
        } else {
          panel.style.width = maxW;
        }
      }
    </script>
    <!---->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  </head>

  <body>
 


    <div class="BarraNavegacion">
      <ul>
        <li class="MenuLateral">
          <button onclick="toggleNavPanel('SeccionesMenuLateral','250px')">
            <i class="fas col fa-bars"></i>
          </button>

          <div id="SeccionesMenuLateral">
            <a href="PrincipalSesion.html" class="activo"
              ><i class="fas colactivo fa-university"></i> Inicio
            </a>
            <a href="#"><i class="fas col fa-fire"></i> Tendencias </a>
            <a href="#"
              ><i class="fas col fa-chalkboard-teacher"></i>Suscripciones</a
            >
            <hr />

            <a href="#"><i class="fas col fa-archive"></i>Biblioteca</a>
            <a href="#"><i class="fas col fa-history"></i> Historial</a>
            <a href="#"><i class="fas col fa-clock"></i> Ver mas tarde</a>
            <a href="#"><i class="fas col fa-star"></i> Favoritos</a>
            <hr />

            <a href="#"><i class="fas col fa-question-circle"></i> Ayuda</a>
            <hr />

            <p>2019 UccTube</p>
          </div>
        </li>

        <li class="logo">
          <a href="PrincipalSesion.html" class="logo"
            ><img src="./imagenes/utlogo.png" width="130px" height="55px"
          /></a>
        </li>

        <div class="barrabusqueda">
          <form action="">
            <input type="text" placeholder="Buscar" name="search" />
            <button type="submit"><i class="fa fa-search"></i></button>
          </form>
        </div>

        <li style="float:right" class="MenuLateralUsuario">
          <button onclick="toggleNavPanel('SeccionesMenuUsuario','230px')">
            <i class="fas col fa-user"></i>
          </button>

          <div id="SeccionesMenuUsuario">
            <a class="Sections_user">
              Nombre de Usuario Contraseña
            </a>
            <hr />
            <a class="Sections_user"
              ><i class="fas col fa-user-tie"></i> Mi canal
            </a>
            <hr />
            <button onclick="logout()" class="Sections_user">
              <i class="fas col fa-door-open"></i>Salir
            </button>
          </div>
        </li>

        <li style="float:right">
          <a href="#Bell" title="Notificaciones">
            <i class="fas col fa-bell"></i>
          </a>
        </li>

        <li style="float:right">
          <a href="#Message">
            <i class="fas col fa-envelope"></i>
          </a>
        </li>

        <li style="float:right">
          <a href="#Apps" title="Aplicaciones">
            <i class="fab col fa-buromobelexperte"></i>
          </a>
        </li>

        <li style="float:right">
          <a href="SubirVideo.html" title="Subir videos">
            <i class="fas col fa-cloud-upload-alt"></i>
          </a>
        </li>
      </ul>

    
      <div class="videoPrin" class="embed-responsive embed-responsive-16by9">
      <iframe id="VideoPrin" src="https://firebasestorage.googleapis.com/v0/b/ucc-tube.appspot.com/o/videos%2F5.mp4?alt=media&token=4e4708ea-6ae8-4eeb-a138-3324ec177cc3"   ></iframe>
      </div> 
      <tr>
          <td width="32%" align="center">[<a href="Reg_Li_Com.php?voto=positivo&id_usuario=U4-06052019">Me gusta</a>] [<a href="Reg_Li_Com.php?voto=negativo&id_usuario=U1-06052019">No me gusta</a>]</td>
      </tr>
       
      <!-- <iframe src="http://docs.google.com/gview?url=http://www.snee.com/xml/xslt/sample.doc&embedded=true" style="width:500px; height:500px;" frameborder="0"></iframe> -->
    
    
    <?php 

//aqui


$SQL = "SELECT _url FROM archivos  " ;

 $result = pg_query($SQL) or die('Query failed: ' . pg_last_error());
 $rows = pg_numrows($result);
 for($i=1;$i<=$rows; $i++){
     $line = pg_fetch_array($result, null, PGSQL_ASSOC);
     echo "<div id= 'viewVideo'>
      <iframe   src='$line[_url]' frameborder='0' allowfullscreen='allowfullscreen'></iframe> 
     </div>";
    }  

//aqui

?>

  </body>
</html>
