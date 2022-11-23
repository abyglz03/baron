<i class="fas fa-php    "></i>
<!DOCTYPE html>
<html lang="en">
<!-- Carrito de compras -->
<?php
include 'global/ServerConfiguration.php';
include 'global/DbConnection.php';
include 'cartlogic';
?>
   <head>
	<title>Carrito</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" />
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet" />
	<link href="https://fonts.googleapis.com/css?family=Nothing+You+Could+Do" rel="stylesheet" />

	<link rel="stylesheet" href="css/open-iconic-bootstrap.min.css" />
	<link rel="stylesheet" href="css/animate.css" />

	<link rel="stylesheet" href="css/owl.carousel.min.css" />
	<link rel="stylesheet" href="css/owl.theme.default.min.css" />
	<link rel="stylesheet" href="css/magnific-popup.css" />

	<link rel="stylesheet" href="css/aos.css" />

	<link rel="stylesheet" href="css/ionicons.min.css" />

	<link rel="stylesheet" href="css/bootstrap-datepicker.css" />
	<link rel="stylesheet" href="css/jquery.timepicker.css" />

	<link rel="stylesheet" href="css/flaticon.css" />
	<link rel="stylesheet" href="css/icomoon.css" />
	<link rel="stylesheet" href="css/style.css" />
	<link rel="icon" href="dist/img/logo real.ico" type="image/x-icon">
</head>
<!-- Carrito de compras -->
<body>
	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
		<div class="container">
			<a class="navbar-brand wobble-hvr animated" href="index.html"><img src="dist/img/LOGO-BARON-EFECTO.png"
					width="80px" height="95px" alt="" /></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
				aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="oi oi-menu"></span> Menú
			</button>
			<div class="collapse navbar-collapse" id="ftco-nav">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a href="index.html" class="nav-link">Inicio</a>
					</li>
					<li class="nav-item">
						<a href="menu.php" class="nav-link">Menú</a>
					</li>
					<li class="nav-item">
						<a href="blog.html" class="nav-link">Blog</a>
					</li>

					<li class="nav-item">
						<a href="contact.php" class="nav-link">Contacto</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

<div class="card" style="background-color: #121618;">
    <div class="card-header">
        <h3 class="card-title">Carrito de compras</h3>
    </div>
    <?php if(!empty($_SESSION['CARRITO'])) { ?>
            <table class="table table-dark table-striped">
            </table>
            
        <?php } else { ?>
            <div class="alert alert-success">
                No hay productos en el carrito
                
            </div>
            
    </div>
<?php }
var_dump($_SESSION); ?>
    <div class="card-body">
        <table class="table table-dark table-striped">
        <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Categoria</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Total</th>
                    <th scope="col"></th>
                    <?php $total = 0; ?>

                <tr> 
            </thead>
            <tbody

        <?php $total = 0; ?>
        
        <?php foreach ($_SESSION['CARRITO'] as $indice => $Producto) { ?>
            
            <td width="40%"><?php echo $Producto['NOMBRE'] ?></td>
                    <td width="40%"><?php echo $Producto['DESCRIPCION'] ?></td>
                    <td width="20%" class="text-center"><?php echo $Producto['PRECIO'] ?></td>
                    <td width="15%" class="text-center">$<?php echo $Producto['CANTIDAD'] ?></td>
                    <td width="15%" class="text-center">$<?php echo $Producto['CATEGORIA'] ?></td>
                    <td width="15%" class="text-center"><img class="wow fadeInDown animated" src="<?php echo 'Admin/pages/forms/image'. $Producto['IMAGEN'] ?></td>
                    <td width="20%" class="text-center">$<?php echo number_format($Producto['PRECIO'] * $Producto['CANTIDAD'], 2); ?> </td>
                    </td>
                    <td width="5%">

                <form action="" method="post">
                    <input type="hidden" name="id" id="id"
                        value="<?php echo openssl_encrypt($Producto['ID'], COD, KEY); ?>">
                    <button class="btn btn-danger" type="submit" name="btnAccion" value="Eliminar">Eliminar</button>
                </form>
                </td>
                </tr>
                <?php $total = $total + ($Producto['PRECIO'] * $Producto['CANTIDAD']); ?>
        </tbody>
                <?php } ?>
                
            
                <tr>
                    <td>Rosso Pizza 14"</td>
                    <td>Peperoni con queso 1</td>
                    <td>$ 215</td>
                    <td>1</td>
                    <td>Pizza</td>
                    <td><img src="dist/img/rosso.JPEG" alt="pizza peperoni" width="100px"></td>
                    <td>$ 215</td>
                    <td><button type="button" class="btn btn-primary">Agregar</button></td>
                    <td><button type="button" class="btn btn-danger">Eliminar</button></td>
        
                </tr>
        </table>
            
    </div>
            
       
                
               

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
 </body>