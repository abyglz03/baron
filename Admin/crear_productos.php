<?php 
include '../db/conexion.php';
// Recibimos los datos del formulario
$Id = $_POST['ID'];
$nombre = $_POST['Nombre'];
$Descripcion = $_POST['Descripcion'];
$Cantidad = $_POST['Cantidad'];
$categoria = $_POST['Categoria'];
$precio = $_POST['Precio'];

// Insertamos los datos en la base de datos
$insertar = "INSERT INTO productos (ID, Nombre, Descripcion, Cantidad, Categoria, Precio) VALUES ('$Id', '$nombre', '$Descripcion', '$Cantidad', '$categoria', '$precio')";
if (!$insertar) {
    echo 'Error al registrarse';
} else {
    echo 'Producto registrado exitosamente';
}
// Cerramos la conexion
mysqli_close($conexion);
header("location:producto.php");

