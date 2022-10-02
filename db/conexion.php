<!-- conexcion de php y mysql -->
<?php
$host = "localhost";
$user = "root";
$pass = "root";
$db = "pizzeria";
$conn = mysqli_connect($host, $user, $pass, $db);
echo "Conexion exitosa";
if (!$$conn) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
?>