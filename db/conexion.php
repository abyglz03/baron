<!-- conexcion de php y mysql -->
<?php
$host="localhost";
$user="root";
$pass="";
$db="baron";
$conexion=mysqli_connect($host,$user,$pass,$db);
if($conexion){
    echo "conexion exitosa";
}else{
    echo "conexion fallida";
}

?>