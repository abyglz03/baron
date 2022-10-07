<?php 
include '../db/conexion.php';
// Recibimos los datos del formulario
$Id = $_POST['ID'];
$nombre = $_POST['Nombre'];
$Descripcion = $_POST['Descripcion'];
$Cantidad = $_POST['Cantidad'];
$categoria = $_POST['Categoria'];
$precio = $_POST['Precio'];
$imagen = addslashes(file_get_contents($_FILES['Imagen']['tmp_name']));
// Insertamos los datos en la base de datos
$insertar = "INSERT INTO producto (Id, Nombre, Descripcion, Cantidad, Categoria, Precio, Imagen) VALUES ('$Id', '$nombre', '$Descripcion', '$Cantidad', '$categoria', '$precio', '$imagen')";
$resultado = mysqli_query($conexion, $insertar);
if (!$resultado) {
    echo 'Error al registrarse';
} else {
    echo 'Producto registrado exitosamente';
}
// Cerramos la conexion
mysqli_close($conexion);

