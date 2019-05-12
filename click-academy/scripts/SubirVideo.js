// Your web app's Firebase configuration
var firebaseConfig = {
  apiKey: "AIzaSyCvU_j6FWIFRN1TrKx1f-91ky2E5n3AqoM",
  authDomain: "click-academy.firebaseapp.com",
  databaseURL: "https://click-academy.firebaseio.com",
  projectId: "click-academy",
  storageBucket: "click-academy.appspot.com",
  messagingSenderId: "372540974455",
  appId: "1:372540974455:web:de23c4eaf36bfdc0"
};
firebase.initializeApp(firebaseConfig);
// Servicios de APIs Firebase
var storageService = firebase.storageService();

//funcion para ingresar los datos basicos del video obtenidos de SubirVideo.html
function ingresardatos() {
  // Obtener Elementos
  let file = document.getElementById("fileButton").value;
  var extenson = fileValidation(file);
  alert("Tipo " + extenson);
  var name = +new Date() + "-" + file.name;
  var refStorage = storageService.ref("extenson").child(name);
  var uploadTask = refStorage.put(file);
}

//validar la extension de los archivos que se desean subir
function fileValidation(file) {
  var path_splitted = file.split(".");
  var extension = path_splitted.pop();
  //var allowedExtensions = /(mp4|wav|wma|m4a)$/i;
  var allowedExtensions = ["mp4", "wav", "wma", "m4a"];

  var file;

  switch (String(extension.toLowerCase())) {
    case "docx":
      alert("es docx");
      file = "DOCX";
      break;

    case "pptx":
      alert("es pptx");
      file = "PPTX";
      break;

    case allowedExtensions.indexOf(extension) + 1 && extension:
      alert("es video");
      file = "VIDEO";
      break;
  }
  return file;
}
