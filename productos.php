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
        <a href="RegistrarProductos.php
        " class="btn btn-primary">Agregar Productos</a>
    </div>
    <div class="card-body">
        <!-- Mostar productos con php -->
        <?php
       
        $query = "SELECT * FROM productos";
        $result = mysqli_query($conn, $query);
        while($row = mysqli_fetch_array($result)) { ?>
        <div class="card" style="width: 18rem;">
            <img src="data:image/jpg;base64,<?php echo base64_encode($row['imagen']); ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?php echo $row['nombre'] ?></h5>
                <p class="card-text"><?php echo $row['descripcion'] ?></p>
                <p class="card-text"><?php echo $row['precio'] ?></p>
                <p class="card-text"><?php echo $row['cantidad'] ?></p>
                <p class="card-text"><?php echo $row['categoria'] ?></p>
                <a href="EditarProductos.php?id=<?php echo $row['id'] ?>" class="btn btn-primary">Editar</a>
                <a href="EliminarProductos.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">Eliminar</a>
            </div>


    </div>
    <!-- Modal  de agregar productos-->
