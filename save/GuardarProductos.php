<?php 
include '../db/conexion.php';
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
$cantidad = $_POST['cantidad'];
$categoria = $_POST['categoria'];
$imagen = $_POST['imagen'];
$sql = "INSERT INTO productos (nombre, descripcion, precio, cantidad, categoria, imagen) VALUES ('$nombre', '$descripcion', '$precio', '$cantidad', '$categoria', '$imagen')";
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>