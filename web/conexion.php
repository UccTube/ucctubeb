<?php 

//localhost

// $user = 'postgres';
// $pass = '12345678';
// $host = 'localhost';
// $dbname = 'Ucc_Tube';
// $port = '5434';



// servidor internet

$user = 'ysidyyoamevpdw';
$pass = 'ca82bb304ca34d81fbb2202b664bd31846d5e68bfd3f0a23768bda2a51e234f4';
$host = 'ec2-54-221-201-212.compute-1.amazonaws.com';
$dbname = 'dc3cif617368vq';
$port = '5432'; 


$conn= "host='$host' dbname='$dbname' port='$port'  password='$pass'  user='$user'  ";
$connect = pg_connect($conn) or die("Error query." . pg_last_error()); 


?>

