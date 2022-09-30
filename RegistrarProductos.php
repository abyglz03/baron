<!-- card productos -->
<?php
include 'db/conexion.php';
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
        <h3 class="card-title">Productos</h3>
    </div>
    <div class="card-body">
<form action="" style="color: white ;">
    <div class="form-group" >
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" id="nombre" placeholder="Nombre" style="text-decoration: #fac564 ;">
    </div>
    <div class="form-group">
        <label for="descripcion">Descripcion</label>
        <input type="text" class="form-control" id="descripcion" placeholder="Descripcion">
    </div>
    <div class="form-group">
        <label for="precio">Precio</label>
        <input type="text" class="form-control" id="precio" placeholder="Precio">
    </div>
    <div class="form-group">
        <label for="cantidad">Cantidad</label>
        <input type="text" class="form-control" id="cantidad" placeholder="Cantidad">
    </div>
    <div class="form-group">
        <label for="categoria">Categoria</label>
        <input type="text" class="form-control" id="categoria" placeholder="Categoria">
    </div>
    <div class="form-group">
        <label for="imagen">Imagen</label>
        <input type="file" class="form-control" id="imagen" placeholder="Imagen">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

    </div>
    <!-- Modal  de agregar productos-->
