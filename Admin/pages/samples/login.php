<!doctype html>
<?php
include '../../../global/ServerConfiguration.php';
include '../../../global/DbConnection.php';
session_start();

if (isset($_POST['login'])) {
  if (!empty($_POST['email']) && !empty($_POST['password']))

    $email = $_POST['email'];
  $password = $_POST['password'];

  $query = $pdo->prepare("SELECT * FROM cliente WHERE correoelectronico=:email");
  $query->bindParam(":email", $email, PDO::PARAM_STR);
  $query->execute();

  $result = $query->fetch(PDO::FETCH_ASSOC);
  $passBD = $result['password'];
  if (!$result) {
    echo '<p class="Correo y contraseña con incorrectos!</p>';
  } else {
    if ($result['correoelectronico'] == $email) {
      if (password_verify($password, $passBD)) {
        $_SESSION['session_username'] = $email;
        $_SESSION['session_idUsuario'] = $result['idUsuario'];
        header("Location: index.php");
      } else {
        $message = "Contraseña invalida";
      }
    } else {
      $message = "Correo invalido";
    }
  }
} else {
  $message = "Todos los campos son requeridos";
}
?>
<html lang="zxx">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Barón Rosso | Inicio de Sesion</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="manifest" href="site.webmanifest">
  <link rel="shortcut icon" type="image/x-icon" href="assets/img/Logo.ico">
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">

</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="../../images/baron-logo.png" alt="logo">
              </div>
              <h4>Hola! Bienvenido devuelta</h4>
              <h6 class="font-weight-light">Inicia sesion para continuar.</h6>
              <form class="pt-3">
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Nombre de usuario">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Contraseña">
                </div>
                <div class="mt-3">
                  <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="../forms/indexsk.html">Iniciar sesion</a>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                    </label>
                  </div>

                </div>

                <div class="text-center mt-4 font-weight-light">
                  No tienes una cuenta? <a href="register.php" class="text-primary">Registrate</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>


      <?php if (!isset($_SESSION["session_Idcliente"])) { ?>

      <?php } else { ?>

      <?php } ?>
      </ul>
      </nav>
    </div>
    <!-- Header Right -->

  </div>
  <!-- Mobile Menu -->
  <div class="col-12">
    <div class="mobile_menu d-block d-lg-none"></div>
  </div>
  </div>
  </div>
  </div>
  <!-- Header End -->
  </header>
  <main>
    <!-- Hero Area Start-->

    <!-- Hero Area End-->
    <!--================login_part Area ================= -->
    <section class="login_part section_padding ">
      <div class="container">
        <div class="row align-items-center">


          <!-- Footer End-->
          </footer>
          <!--? Search model Begin -->

          <!-- Search model end -->

          <!-- JS here -->

          <script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
          <!-- Jquery, Popper, Bootstrap -->
          <script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
          <script src="./assets/js/popper.min.js"></script>
          <script src="./assets/js/bootstrap.min.js"></script>
          <!-- Jquery Mobile Menu -->
          <script src="./assets/js/jquery.slicknav.min.js"></script>

          <!-- Jquery Slick , Owl-Carousel Plugins -->
          <script src="./assets/js/owl.carousel.min.js"></script>
          <script src="./assets/js/slick.min.js"></script>

          <!-- One Page, Animated-HeadLin -->
          <script src="./assets/js/wow.min.js"></script>
          <script src="./assets/js/animated.headline.js"></script>
          <script src="./assets/js/jquery.magnific-popup.js"></script>

          <!-- Scrollup, nice-select, sticky -->
          <script src="./assets/js/jquery.scrollUp.min.js"></script>
          <script src="./assets/js/jquery.nice-select.min.js"></script>
          <script src="./assets/js/jquery.sticky.js"></script>

          <!-- contact js -->
          <script src="./assets/js/contact.js"></script>
          <script src="./assets/js/jquery.form.js"></script>
          <script src="./assets/js/jquery.validate.min.js"></script>
          <script src="./assets/js/mail-script.js"></script>
          <script src="./assets/js/jquery.ajaxchimp.min.js"></script>

          <!-- Jquery Plugins, main Jquery -->
          <script src="./assets/js/plugins.js"></script>
          <script src="./assets/js/main.js"></script>

</body>

</html>