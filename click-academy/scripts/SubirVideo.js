//subir video
<script src="https://www.gstatic.com/firebasejs/5.9.4/firebase.js" />;
alert("file");

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

//funcion para ingresar los datos basicos del video obtenidos de SubirVideo.html

function ingresardatos() {
  // Obtener Elementos
  let file = document.getElementById("fileButton");
  alert(file);

  let uploader = document.getElementById("uploader").value;
  // Servicios de APIs Firebase
  var authService = firebase.auth();
  var storageService = firebase.storage();
  var url_;

  window.onload = function() {
    alert("window");

    authService.signInAnonymously().catch(function(error) {
      console.error("Detectado error de autenticación", error);
    });

    //manejador de evento para el input file
    document;
    file.addEventListener("change", function(evento) {
      evento.preventDefault();
      var archivo = evento.target.files[0];

      subirArchivo(archivo);
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
      var percentage = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;
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
}

function pausar() {
  //manejador del evento 'pausar' en la ruta SubirVideo.html
  document.getElementById("pausar").addEventListener("click", function() {
    if (uploadTask && uploadTask.snapshot.state == "running") {
      uploadTask.pause();
      alert("pausada");
    }
  });
}

function reanudar() {
  //manejador del evento 'reanudar' en la ruta SubirVideo.html
  document.getElementById("reanudar").addEventListener("click", function() {
    if (uploadTask && uploadTask.snapshot.state == "paused") {
      uploadTask.resume();
      alert("reanudada");
    }
  });
}

function cancelar() {
  document.getElementById("cancelar").addEventListener("click", function() {
    if (
      uploadTask &&
      (uploadTask.snapshot.state == "paused" ||
        uploadTask.snapshot.state == "running")
    ) {
      if (uploadTask.snapshot.state == "paused") {
        uploadTask.resume();
      }
      uploadTask.cancel();
      alert("cancelada");
    }
  });
}

//validar la extension de los archivos que se desean subir
function fileValidation() {
  var fileInput = document.getElementById("file");
  var filePath = fileInput.value;
  var path_splitted = filePath.split(".");
  var extension = path_splitted.pop();
  //var allowedExtensions = /(mp4|wav|wma|m4a)$/i;
  var allowedExtensions = ["mp4", "wav", "wma", "m4a"];

  alert(fileInput.value);

  alert(extension);
  var doc = "docx";

  switch (String(extension.toLowerCase())) {
    case "DOCX":
      alert("case 1");
      break;

    case "pptx":
      alert("case 2");
      break;

    case allowedExtensions.indexOf(extension) + 1 && extension:
      alert("case 3");
      break;
  }

  if (String(extension.toLowerCase()) == String(doc.toLowerCase())) {
    alert("extension docx");
  } else {
    alert("No es extension PNG");
  }

  if (!allowedExtensions.exec(filePath)) {
    alert("Please upload file having extensions .mp4/.wav/.wma/.m4a only.");
    fileInput.value = "";
    return false;
  } else {
    //Image preview

    if (fileInput.files && fileInput.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        document.getElementById("imagePreview").innerHTML =
          '<img src="' + e.target.result + '"/>';
      };
      reader.readAsDataURL(fileInput.files[0]);
    }
  }
}

$(document).ready(function() {
  fileValidation(slideIndex);
});
