<!-- Carrito de compras -->
<?php
//include 'db/conexion.php';
include 'cabecera.php';
?>
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
    </div>
    <div class="card-body">
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Total</th>
                    <th scope="col">Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Rosso Pizza 14"</td>
                    <td>Peperoni con queso  1</td>
                    <td>$ 215</td>
                    <td>1</td>
                    <td>Pizza</td>
                    <td><img src="dist/img/rosso.JPEG" alt="pizza peperoni" width="100px"></td>
                    <td>$ 215</td>
                    <td><button type="button" class="btn btn-danger">Eliminar</button></td>
                </tr>
                <tr>
                    <td>Pizza Mexicana 14"</td>
                    <td>Carne, chorizo, jamon, tocino, jalapeño, cebolla y queso </td>
                    <td>$ 250</td>
                    <td>1</td>
                    <td>Pizza</td>
                    <td><img src="dist/img/hawaiana.JPEG" alt="piza hawaina" width="100px"></td>
                    <td>$250</td>
                    <td><button type="button" class="btn btn-danger">Eliminar</button></td>
                </tr>
                <tr>
                    <td>Pizza boneless 9"</td>
                    <td>Pizza con boneless y salsa de tu elección</td>
                    <td>$ 199</td>
                    <td>1</td>
                    <td>Pizza</td>
                    <td><img src="dist/img/pboneless.JPEG" alt="pizza boneless" width="100px"></td>
                    <td>$ 199</td>
                    <td><button type="button" class="btn btn-danger">Eliminar</button></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Total</td>
                    <td></td>
                    <td></td>
                    