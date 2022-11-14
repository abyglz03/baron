<!DOCTYPE html>
<html lang="en">
<?php
include 'global/ServerConfiguration.php';
include 'global/DbConnection.php';
?>
<head>
	<title>Menú</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Nothing+You+Could+Do" rel="stylesheet">

	<link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
	<link rel="stylesheet" href="css/animate.css">

	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<link rel="stylesheet" href="css/magnific-popup.css">

	<link rel="stylesheet" href="css/aos.css">

	<link rel="stylesheet" href="css/ionicons.min.css">

	<link rel="stylesheet" href="css/bootstrap-datepicker.css">
	<link rel="stylesheet" href="css/jquery.timepicker.css">


	<link rel="stylesheet" href="css/flaticon.css">
	<link rel="stylesheet" href="css/icomoon.css">
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
		<div class="container">
			<a class="navbar-brand wobble-hvr animated" href="index.html"><img src="dist/img/LOGO-BARON-EFECTO.png"
					width="80px" height="95px" alt="" /></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
				aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="oi oi-menu"></span> Menu
			</button>
			<div class="collapse navbar-collapse" id="ftco-nav">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active">
						<a href="index.html" class="nav-link">Inicio</a>
					</li>
					<li class="nav-item">
						<a href="menu.html" class="nav-link">Menu</a>
					</li>
					<li class="nav-item">
						<a href="blog.html" class="nav-link">Blog</a>
					</li>

					<li class="nav-item">
						<a href="contact.html" class="nav-link">Contacto</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- END nav -->






	<div class="container">
		<div class="row justify-content-center mb-4 pb-3">
			<div class="heading-section ftco-animate text-center">
				<h2 class="mb-6">Nuestro menú</h2>
			</div>
		</div>
	</div>
	<div class="container-wrap">
		<div class="row no-gutters d-flex">
			<?php
			$ProductoQuery = $pdo->prepare("SELECT * FROM Producto");
			$ProductoQuery->execute();
			$ListProducto = $ProductoQuery->fetchAll(PDO::FETCH_ASSOC);
			?>
<div class="tab-content" id="nav-tabContent">
	<?php if($message!=""){ ?>
	<div class="alert alert-success">
		<?php echo $mensaje; ?>
		<a href="carrito.php" class="badge badge-success"> Ver carrito</a>
		<?php } ?>
	</div>
</div>


			<?php
			foreach($ListProducto as $Producto){
			?>
			
			<div class="col-lg-4 d-flex ftco-animate">
				<div class="services-wrap d-flex">
					<a href="#" class="img"><img src="<--?php echo '../Admin/pages/forms/image/'.$producto['imagen'];?>" alt="imagen de producto"></a>
				</div>
			</div>
			<h6 class="product-title"><?php echo $Producto['nombre']; ?></h6>
                      <p><?php echo $Producto['descripcion']; ?></p>
                      <div class="product-price-wrap">
                      <div class="product-price"><?php echo $Producto['precio'];?>.00 MXN</div>
                      </div>
	<div class="">
		<form action="" method="post">
			<input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($idProducto['idProducto'],COD, KEY)?>">
			<input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($idProducto['nombre'],COD,KEY)?>" >
			<input type="hidden" name="descripcion" id="descripcion"value="<?php echo openssl_encrypt($idProducto['descripcion'],COD,KEY);?>">
				<input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($idProducto['precio'],COD,KEY)?>">
			<input type="hidden" name="imagen" id="imagen"
				value="<?php echo openssl_encrypt($idProducto['imagen'],COD,KEY)?>">
			<button class="button button-contactForm boxed-btn" name="btnAccion" value="Agregar" type="submit">
				Agregar al carrito
			</button>

		</form>
		<br>
		<a href="carrito.php" class="btn btn-primary center">Ordenar</a>
	</div>
	<br>
	<?php } ?>
	<p>
		<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
		Copyright &copy;
		<script>
			document.write(new Date().getFullYear());
		</script>
		Los derechos estan reservados por Abigail Gonzalez
		<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
	</p>
	</div>
	</div>
	</div>

	</footer>



	<!-- loader -->
	<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
			<circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
			<circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
				stroke="#F96D00" />
		</svg></div>


	<script src="js/jquery.min.js"></script>
	<script src="js/jquery-migrate-3.0.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.easing.1.3.js"></script>
	<script src="js/jquery.waypoints.min.js"></script>
	<script src="js/jquery.stellar.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/aos.js"></script>
	<script src="js/jquery.animateNumber.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/jquery.timepicker.min.js"></script>
	<script src="js/scrollax.min.js"></script>
	<script
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
	<script src="js/google-map.js"></script>
	<script src="js/main.js"></script>

</body>

</html>