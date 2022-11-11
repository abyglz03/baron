<!DOCTYPE html>
<html lang="zxx">
<!-- Carrito de compras -->
<?php
include 'global/ServerConfiguration.php';
include 'global/DbConnection.php';
include 'cartlogic';
include_once 'cabecera.php';

echo "<title>Carrito</title>"; ?>


<!-- libreia de jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- libreia de bootstrap 4-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<!-- libreia de font awesome -->
<script src="https://use.fontawesome.com/6a71565c22.js"></script>
<!-- libreia de mdb -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/2.2.1/mdb.min.js"></script>
<!-- libreia de popper -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

<div class="card" style="background-color: #121618;">
    <div class="card-header">
        <h3 class="card-title">Carrito de compras</h3>
        <?php if (!empty($_SESSION['CARRITO'])) { ?>
            <table class="table table-dark table-striped">
            </table>
        <?php } else { ?>
            <div class="alert alert-success">
                No hay productos en el carrito
            </div>
    </div>
<?php } ?>
<div class="card-body">
    <table class="table table-dark table-striped">
        <?php $total = 0; ?>
        <?php foreach ($_SESSION['CARRITO'] as $indice => $Producto) { ?>
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Total</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td width="40%"><?php echo $Producto['NOMBRE'] ?></td>
                    <td width="40%"><?php echo $Producto['DESCRIPCION'] ?></td>
                    <td width="20%" class="text-center"><?php echo $Producto['PRECIO'] ?></td>
                    <td width="15%" class="text-center">$<?php echo $Producto['CANTIDAD'] ?></td>
                    <td width="15%" class="text-center">$<?php echo $Producto['CATEGORIA'] ?></td>
                    <td><img src="dist/img/rosso.JPEG" alt="pizza peperoni" width="100px"></td>
                    <td width="20%" class="text-center">$<?php echo number_format($Producto['PRECIO'] * $Producto['CANTIDAD'], 2); ?> </td>
                    </td>
                    <td width="5%">
                        <form action="" method="post">
                            <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($Producto['ID'], COD, KEY); ?>">
                    <input<button type="button" class="btn btn-primary" type="submit" name="btn-action" value="Agregar">Agregar</button></input>
                    <input<button type="button" class="btn btn-danger" type="submit" name="btn-action" value="Eliminar">Eliminar</button></input>
                    </form>
                    </td>
                </tr>
                <?php $total=$total+($Producto['PRECIO']*$Producto['CANTIDAD']); ?>
            <?php } ?>

