<?php
 $origin = $_SERVER['HTTP_ORIGIN'];
 $allowed_domains = [
     'https://ucctubemedia.netlify.com'
 ];
 if (in_array($origin, $allowed_domains)) {
     header('Access-Control-Allow-Origin: ' . $origin);
 }
 echo "funciono!!";
?>