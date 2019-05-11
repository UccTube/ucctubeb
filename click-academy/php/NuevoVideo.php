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
    <link 
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    />
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
    </div>
    
    <!--Opción de subir el vídeo-->
    <div class="ContenedorPrincipal">
      <div class="ContenedorDividido">
        <div id="SubirVideo">
          <input
            type="file"
            value="upload"
            id="fileButton"
            class="VideoSelecter"
          />
          <label for="fileButton" id="SeleccionarVideo">
            <div class="AgregarVideo">
              <i class="AgregarVideoIcono fas fa-cloud-upload-alt"> </i>
            </div> 
            <div class="AgregarVideoTexto"> 
              <div class="posicionar"> 
                <h3>Selecciona archivos para subir</h3> 
                <progress value="0" max="100" id="uploader">0%</progress> 
              </div> 
            </div> 
          </label> 
          <!--<div class="Borde-diagonal"></div>-->
        </div>
        
         
        <div id="VideoPreviewDiv">
          <div id="VideoPreview">
            <div id="VideoP">
                <source src="" id="video_here" /> 
                Tu buscador no soporta el video de HTML5
            </div>
          </div>
        </div>

        <!--Información del video-->
        <div id="InformacionVideo" class="ContenedorDividido">
          <form
            id="FormularioInformacion"
            action="../php/InsertarVideo.php"
            method="POST"
          >

            <input
              type="text"
              id="nombrevideo"
              placeholder="Titulo"
              class="TextoInformacion"
              name="NombreVideo"
            />
            <textarea
              id="mensaje"
              rows="5"
              placeholder="Descripcion"
              class="TextoInformacion"
              name="Mensaje"
            ></textarea>

            <textarea
              type="text"
              rows="5"
              id="categoria"
              placeholder="Tabla de contenidos"
              rows="4"
              class="TextoInformacion"
              name="Categoria"
            ></textarea>


           
            <select class="mdb-select md-form colorful-select dropdown-danger">
              <option value="0">Seleccione una opción</option>
           
            <?php 
            include("conexion.php");             
            $SQL = "SELECT nombre_categoria FROM categorias " ;

            $result = pg_query($SQL) or die('Query failed: ' . pg_last_error()); 
            $rows = pg_numrows($result); 

            for($i=1;$i<=$rows; $i++){
                $line = pg_fetch_array($result, null, PGSQL_ASSOC);
                 echo " <option value='1'> $line[nombre_categoria] </option>  ";
               }
            ?>
            
            </select>

            <input
              type="text"
              name="caja_valor"
              id="caja_valor"
              value=""
              style="visibility:hidden"
            />

            <button class="BotonInformacion" type="submit" id="submit">
              Subir vídeo
            </button>
          </form>
        </div>
      </div>
    </div>

    <!--controladores-->
    <div id="controles">
      <button type="button" id="pausar" class="btn btn-primary">Pausar</button>

      <button type="button" id="reanudar" class="btn btn-primary">
        Reanudar
      </button>
      <button type="button" id="cancelar" class="btn btn-primary">
        Cancelar
      </button>
    </div>

    <!--subir video-->
    <script src="https://www.gstatic.com/firebasejs/5.9.4/firebase.js"></script>
    <script>
      // Initialize Firebase
      var firebaseConfig = {
    apiKey: "AIzaSyB_PY_yBSbnlOfGPyLknxiY0g2G9Bz639Q",
    authDomain: "ucc-tube.firebaseapp.com",
    databaseURL: "https://ucc-tube.firebaseio.com",
    projectId: "ucc-tube",
    storageBucket: "ucc-tube.appspot.com",
    messagingSenderId: "492743461618",
    appId: "1:492743461618:web:c50345deb5787c74"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
      // Obtener Elementos
      var uploader = document.getElementById("uploader");

      // Servicios de APIs Firebase
      var authService = firebase.auth();
      var storageService = firebase.storage();
      var url_;

      window.onload = function() {
        authService.signInAnonymously().catch(function(error) {
          console.error("Detectado error de autenticación", error);
        });

        //manejador de evento para el input file
        document
          .getElementById("fileButton")
          .addEventListener("change", function(evento) {
            evento.preventDefault();

            var archivo = evento.target.files[0];

            subirArchivo(archivo);
          });

        //manejadores de eventos para los botones de control de la subida
        document.getElementById("pausar").addEventListener("click", function() {
          if (uploadTask && uploadTask.snapshot.state == "running") {
            uploadTask.pause();
            console.log("pausada");
          }
        });

        document
          .getElementById("reanudar")
          .addEventListener("click", function() {
            if (uploadTask && uploadTask.snapshot.state == "paused") {
              uploadTask.resume();
              console.log("reanudada");
            }
          });
        document
          .getElementById("cancelar")
          .addEventListener("click", function() {
            if (
              uploadTask &&
              (uploadTask.snapshot.state == "paused" ||
                uploadTask.snapshot.state == "running")
            ) {
              if (uploadTask.snapshot.state == "paused") {
                uploadTask.resume();
              }
              uploadTask.cancel();
              console.log("cancelada");
            }
          });
      };

      // defino el uploadTask como variable global
      var uploadTask;
      function subirArchivo(archivo) {
        var refStorage = storageService.ref("videos").child(archivo.name);
        uploadTask = refStorage.put(archivo);

        // El evento donde comienza el control del estado de la subida
        uploadTask.on(
          "state_changed",
          registrandoEstadoSubida,
          errorSubida,
          finSubida
        );

        //Callbacks para controlar los distintos instantes de la subida
        function registrandoEstadoSubida(snapshot) {
          var percentage =
            (snapshot.bytesTransferred / snapshot.totalBytes) * 100;
          uploader.value = percentage;
        }

        function errorSubida(err) {
          console.log("Error al subir el archivo", err);
        }
        function finSubida() {
          uploadTask.snapshot.ref.getDownloadURL().then(function(downloadURL) {
            console.log("File available at", downloadURL);
            enlaceSubido(downloadURL);
          });
        }
      }

      $(document).on("change", ".VideoSelecter", function(evt) {
        var $source = $("#video_here");
        $source[0].src = URL.createObjectURL(this.files[0]);
        $source.parent()[0].load();
        $("#VideoP").css("width", "100%");
        $("#VideoP").css("height", "100%");
        $("#VideoPreview").css("background-image", "none");
      });
      $(document).on();
      //mostramos el link para acceso al archivo al final de la subida
      function enlaceSubido(enlace) {
        document.getElementById("caja_valor").value = enlace;
        document.getElementById("archivo").style.display = "block";
      }
    </script>
  </body>
</html>
