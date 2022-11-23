<?php
include '../../../global/ServerConfiguration.php';
include '../../../global/DbConnection.php';
session_start();

if (isset($_POST["register"])) {
  if (!empty($_POST['email']) && !empty($_POST['password'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_hash = password_hash($password, PASSWORD_BCRYPT);
    $query = $pdo->prepare("SELECT * FROM cliente WHERE correo=:email");
    $query->bindParam(":email", $email);
    $query->execute();

    if ($query->rowCount() > 0) {
      echo '<p class = "error">El email ya se encuentra registrado</p>';
    } else if ($query->rowCount() == 0) {
      $query = $pdo->prepare("INSERT INTO cliente (nombre, apellido, direccion, codigopostal, correo, contrasena)
            VALUES(:nombre, :apellido, :direccion, :codigopostal, :email, :password_hash)");
     
   
      $query->bindParam(":email", $email);
      $query->bindParam(":password_hash", $password_hash);
      $result = $query->execute();

      if ($result) {
        $message = "Cuenta correctamente creada :)";
      } else {
        $message = "Error al ingresar los datos, intenta de nuevo!";
      }
    }
  } else {
    $message = "Intento enviar el formulario vacio";
  }
}
if (!empty($message)) {
  echo  '<p class = "error">" . $message . "</p>';
} ?>

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../vendors/feather/feather.css">
  <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.png" />
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
              <h4>Bienvenido Administrador <3</h4>
              <h6 class="font-weight-light"></h6>
              <form class="pt-3">
              <div>
                  <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email">
                </div>
               <br>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                </div>
               
                <div class="mt-3">
                  <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="../../index.html">SIGN UP</a>
                
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>