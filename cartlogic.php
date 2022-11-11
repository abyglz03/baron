<?php 
session_start();
if(isset($_POST['btnAction']))
{
    switch($_POST['btnAction'])
    {
        case 'Agregar':

            //ID
            if(is_numeric( openssl_decrypt($_POST['idProducto'], COD, KEY)))
            {
                $ID=openssl_decrypt($_POST['idProducto'],COD,KEY );
                $mensaje.="Ok ID correcto".$ID."<br/>";
            }
            else
            {
                $mensaje.="Upss... ID incorrecto".$ID."<br/>";
            }
            // NOMBRE
            if(is_string(openssl_decrypt($_POST['nombreprod'],COD,KEY)))
            {
                $NOMBRE=openssl_decrypt($_POST['nombreprod'],COD,KEY );
                $mensaje.="Ok NOMBRE".$NOMBRE."<br/>";
            }
            else
            {
                $mensaje.="Upss... algo pasa con el nombre"."<br/>"; break;
            }
            //CANTIDAD
            if(is_numeric( openssl_decrypt($_POST['cantidadprod'], COD, KEY)))
            {
                $CANTIDAD=openssl_decrypt($_POST['cantidadprod'],COD,KEY );
                $mensaje.="Ok CANTIDAD".$CANTIDAD."<br/>";
            }
            else
            {
                $mensaje.="Upss... algo pasa con la cantidad"."<br/>"; break;
            }
            //PRECIO
            if(is_numeric( openssl_decrypt($_POST['precioprod'], COD, KEY)))
            {
                $PRECIO=openssl_decrypt($_POST['precioprod'],COD,KEY );
                $mensaje.="Ok PRECIO".$PRECIO."<br/>";
            }
            else
            {
                $mensaje.="Upss... algo pasa con el precio"."<br/>"; break;
            }
            //IMAGEN
            if(is_numeric( openssl_decrypt($_POST['Productimage'], COD, KEY)))
            {
                $IMAGEN=openssl_decrypt($_POST['Porductimage'],COD,KEY );
                $mensaje.="Ok IMAGEN".$IMAGEN."<br/>";
            }
            else
            {
                $mensaje.="Upss... algo pasa con la imagen"."<br/>"; break;
            }
            //CARRITO
            if (!isset($_SESSION['CARRITO'])){
            {
                $producto=array(
                    'ID'=>$ID,
                    'NOMBRE'=>$NOMBRE,
                    'CANTIDAD'=>$CANTIDAD,
                    'PRECIO'=>$PRECIO,
                    'IMAGEN'=>$IMAGEN
                );
                $_SESSION['CARRITO'][0]=$producto;
                $mensaje= "Producto agregado al carrito";
            }
            else
            {
                $idProductos=array_column($_SESSION['CARRITO'], "ID");
                if (in_array($ID, $idProductos)) 
                {
                    echo "<script>alert('El producto ya ha sido seleccionado.. ');</script>";
                    $mensaje = "";
                }
                else
                {
                    $NumeroProductos=count($_SESSION['CARRITO']);
                    $producto=array(
                        'ID'=>$ID,
                        'NOMBRE'=>$NOMBRE,
                        'CANTIDAD'=>$CANTIDAD,
                        'PRECIO'=>$PRECIO,
                        'IMAGEN'=>$IMAGEN
                    );
                    $_SESSION['CARRITO'][$NumeroProductos]=$producto;
                    $mensaje = "Producto agregado al carrito";
                }
                else
                {
                   $idProductos=array_column($_SESSION['CARRITO'], "ID"); 
                   if(in_array($ID, $idProductos))
                   {
                        echo "<script>alert('El producto ya ha sido seleccionado.. ');</script>";
                        $mensaje = "";
                   }
                   else
                   {
                       $NumeroProductos=count($_SESSION['CARRITO']);
                       $producto=array(
                           'ID'=>$ID,
                           'NOMBRE'=>$NOMBRE,
                           'CANTIDAD'=>$CANTIDAD,
                           'PRECIO'=>$PRECIO,
                           'IMAGEN'=>$IMAGEN
                       );
                       $_SESSION['CARRITO'][$NumeroProductos]=$producto;
                       $mensaje = "Producto agregado al carrito";
                   }
                }
            }
        break;
    }
}
?>