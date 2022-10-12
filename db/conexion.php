<!-- conexcion de php y mysql -->
<?php
$host="162.241.62.58";
$user="barronro_aby";
$pass="clave123";
$db="barronro_utt";
$conexion=mysqli_connect($host,$user,$pass,$db);
if($conexion){
    echo "conexion exitosa";
}else{
    echo "conexion fallida";
}

?>