<!DOCTYPE html>
<html lang="en">
<?php
include 'global/ServerConfiguration.php';
include 'global/DbConnection.php';
?>

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin Usuarios</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
  <?php
  //isset(what we check)-?-if true-:-if false;
  $txtID = (isset($_POST['txtID'])) ? $_POST['txtID'] : "";
  $txtName = (isset($_POST['txtName'])) ? $_POST['txtName'] : "";
  $txtDescripcion = (isset($_POST['txtDescripcion'])) ? $_POST['txtDescripcion'] : "";
  $txtPrecio = (isset($_POST['txtPrecio'])) ? $_POST['txtPrecio'] : "";
  $txtImage = (isset($_POST['txtOldImg'])) ? $_FILES['txtOldImg'] : "";
  $txtOldImg = (isset($_FILES['txtImage']['name'])) ? $_FILES['txtImage']['name'] : "";

  $action = (isset($_POST['action'])) ? $_POST['action'] : "";

  switch ($action) {
    case 'Add':
      $InsertQuery = $pdo->prepare("INSERT INTO Producto (nombre, descripcion, precio, imagen) VALUES (:nombre, :descripcion, :precio, :imagen);");
      $date = new DateTime();
      $ImgFileName = ($txtImage!="")?$date->getTimestamp()."_".$_FILES["txtImage"]["name"]:"";  //09789799_image7.jpg
      //guardar el archivo temporalmente
      $ImgTmp=$_FILES["txtImage"]["tmp_name"];
      //si se subio un archivo entonces se mueve a la direccion de la carpeta de las imagenes
      if($ImgTmp!= "")  //si no es igual a nulo / si no esta vacīa/ si tiene informacion
      {
        move_uploaded_file($ImgTmp, "Admin/pages/forms/images/".$ImgFileName);
      }
      $InsertQuery->bindParam(':nombre', $txtName);
      $InsertQuery->bindParam(':descripcion', $txtDescripcion);
      $InsertQuery->bindParam(':precio', $txtPrecio);
      $InsertQuery->bindParam(':imagen', $ImgFileName);
      $InsertQuery->execute();
      break;

    case 'Select':
      $SelectQuery = $pdo->prepare("SELECT * FROM Producto WHERE idProducto=:idProducto;");
      $SelectQuery->bindParam(':idProducto', $txtID);
      $SelectQuery->execute();
      $AProducto = $SelectQuery->fetch(PDO::FETCH_LAZY);
      $txtName = $AProducto['nombre'];
      $txtDescripcion = $AProducto['descripcion'];
      $txtPrecio = $AProducto['precio'];
      $txtImage = $AProducto['imagen'];
      $txtOldImg = $AProducto['imagen'];
      break;

    case 'Modify':
      $ModifyQuery = $pdo->prepare("UPDATE Producto SET nombre=:nombre, descripcion=:descripcion, precio=:precio WHERE idProducto=:id;");
      $ModifyQuery->bindParam(':id', $txtID);
      $ModifyQuery->bindParam(':nombre', $txtName);
      $ModifyQuery->bindParam(':precio', $txtPrecio);
      $ModifyQuery->bindParam(':descripcion', $txtDescripcion);
      $ModifyQuery->execute();
      if ($txtImage!= "") {
        $date = new DateTime();
        //creacion del nuevo nombre de la imagen
        $ImgFileName = ($txtImage!= "")?$date->getTimestamp()."_".$_FILES["txtImage"]["name"]:"";
        $ImgTmp = $_FILES["txtImage"]["tmp_name"];
        move_uploaded_file($ImgTmp, "Admin/pages/forms/images/". $ImgFileName);

        $ModifyQuery = $pdo->prepare("SELECT imagen FROM Producto WHERE id_producto=:id");
        $ModifyQuery->bindParam('id',$txtID);
        $ModifyQuery->execute();

        $Producto = $ModifyQuery->fetch(PDO::FETCH_LAZY);
        if (isset($Producto["imagen"]) && ($Producto["imagen"]!="image.jpg")) {
          if (file_exists("Admin/pages/forms/images/". $Producto["imagen"])) 
          {
            unlink("Admin/pages/forms/images/".$Producto["imagen"]);
          }
        }
        $ModifyQuery = $pdo->prepare("UPDATE Producto SET imagen = :imagen WHERE idProducto=:id;");
        $ModifyQuery->bindParam(':imagen',$ImgFileName);
        $ModifyQuery->bindParam(':id',$txtID);
        $ModifyQuery->execute();
      } 
      else 
      {
        $ModifyQuery = $pdo->prepare("UPDATE Producto SET imagen = :imagen WHERE idProducto=:id;");
        $ModifyQuery->bindParam(':imagen',$ImgFileName);
        $ModifyQuery->bindParam(':id',$txtID);
        $ModifyQuery->execute();
      }
      break;

    case 'Delete':
      $DeleteQuery = $pdo->prepare("SELECT imagen FROM Producto WHERE idProducto=:id;");
      $DeleteQuery->bindParam(':idProducto',$txtID);
      $DeleteQuery->execute();
      $Producto = $DeleteQuery->fetch(PDO::FETCH_LAZY);

      if (isset($Producto["imagen"]) && ($Producto["imagen"]!="image.jpg")){
        if (file_exists("Admin/pages/forms/images/".$Producto["imagen"])) {
          unlink("Admin/pages/forms/images/".$Producto["imagen"]);
        }
      }
      $DeleteQuery = $pdo->prepare("DELETE FROM Producto WHERE idProducto=:idProducto;");
      $DeleteQuery->bindParam(':idProducto', $txtID);
      $DeleteQuery->execute();
      //header('Location: ')
      break;
      
    case 'Cancel':
      $txtName = "";
      $txtDescripcion = "";
      $txtPrecio = "";
      $txtImage = "";
      break;

    default;
      echo "Invalid option";
      break;
  } ?>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="Producto.html"><img src="images/LOGO-BARON-EFECTO.png" class="mr-2" alt="logo"></a>
        <a class="navbar-brand brand-logo-mini" href="Producto.html"><img src="images/LOGO-BARON-EFECTO.png" alt="logo"></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
       
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme">
            <div class="img-ss rounded-circle bg-light border mr-3"></div>Light
          </div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme">
            <div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark
          </div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>

      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="Producto.php">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Producto</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Usertype.php">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">Tipo de usuario</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Categoria.php">
              <i class="icon-columns menu-icon"></i>
              <span class="menu-title">Categoria</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="userform.php">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">Usuario</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Cliente.php">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">Cliente</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <form method="POST" enctype="multipart/form-data">
                        <h4 class="card-title">Crear Producto</h4>
                        <div class="form-group">
                          <label for="txtName">Nombre</label>
                          <input type="text" name="txtName" id="txtName" value="<?php echo $txtName; ?>" class="form-control single-input" placeholder="Nombre">
                        </div>
                        <div class="form-group" <label for="txtDescripcion">Descripcion</label>
                          <input type="text" name="txtDescripcion" id="txtDescripcion" value="<?php echo $txtDescripcion; ?>" class="form-control single-input" placeholder="Descripcion">
                        </div>

                        <div class="form-group">
                          <label for="txtPrecio">Precio</label>
                          <input type="price" name="txtPrecio" id="txtPrecio" value="<?php echo $txtPrecio; ?>" class="form-control single-input" placeholder="Precio">
                        </div>
                        <div class="form-group">
                          <label for="txtImage"></label>
                          <input type="hidden" name="txtOldImg" value="<?php echo $txtImage; ?>">
                          <input type="file" name="txtImage" id="txtImage" class="form-control" placeholder="Image">
                        </div>

                        <label for="txtID"></label>
                        <input type="hidden" name="txtID" id="txtID" value="<?php echo $txtID; ?>" class="form-control single-input" placeholder="ID">
                        <div>
                          <input type="submit" name="action" value="Add" class="btn btn-primary">
                          <input type="submit" name="action" value="Cancel" class="btn btn-danger">
                          <input type="submit" name="action" value="Modify" class="btn btn-danger">
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <?php
              $ProductoQuery = $pdo->prepare("SELECT * FROM Producto;");
              $ProductoQuery->execute();
              $ListProducto = $ProductoQuery->fetchAll(PDO::FETCH_ASSOC);
              //var_dump($ListCategories);
              ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title mb-0">Producto</p>
                  <div class="table-responsive">
                    <table class="table table-striped table-borderless">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Nombre</th>
                          <th>Descripcion</th>
                          <th>Precio</th>
                          <th>Imagen</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($ListProducto as $Producto) { ?>
                          <tr class="odd">
                            <td><?php echo $Producto['idProducto'] ?> </td>
                            <td><?php echo $Producto['nombre']; ?> </td>
                            <td><?php echo $Producto['descripcion']; ?> </td>
                            <td><?php echo $Producto['precio']; ?> </td>
                            <td><img src="../images/<?php echo $Producto['imagen']; ?>" width=”50%”><?php echo $Producto['imagen']; ?></td>
                            <td>
                              <form method="POST">
                                <input type="hidden" name="txtID" value="<?php echo $Producto['idProducto']; ?>">
                                <input type="submit" name="action" value="Select" class="btn btn-primary">
                                <input type="submit" name="action" value="Delete" class="btn btn-danger">
                              </form>
                            </td>
                          </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>










  </div>


  <!-- partial -->
  </div>
  <!-- main-panel ends -->
  </div>
  <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <script src="js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->
</body>

</html>