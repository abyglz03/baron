<?php
//Creamos la conexión con la base de datos
$host = "localhost";
$user = "root";
$pass = "root";
$db = "baron";
$conn = mysqli_connect($host, $user, $pass, $db);
if (!$con) {
  echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    die("Connection failed: " . mysqli_connect_error());
}else{
    echo "Conexión exitosa";
    
}
?>

/* ---------------------------------------

    * Filename: db.php
    * Original Author: @rulofw98
    * Web: http://rulofw98.github.io
    * Modifications by: @rulofw98
    * Web: 
    ------------------------------------*/
