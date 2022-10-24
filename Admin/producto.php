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
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-4" href="index.html"><img src="images/LOGO-BARON-EFECTO.png" class="mr-2" alt="logo" /></a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="images/logo-mini.svg" alt="logo" /></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
              <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                <span class="input-group-text" id="search">
                  <i class="icon-search"></i>
                </span>
              </div>
              <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search">
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="icon-bell mx-0"></i>
              <span class="count"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>



            </div>
          </li>
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="images/faces/face28.jpg" alt="profile" />
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item">
                <i class="ti-settings text-primary"></i>
                Settings
              </a>
              <a class="dropdown-item">
                <i class="ti-power-off text-primary"></i>
                Logout
              </a>
            </div>
          </li>
          <li class="nav-item nav-settings d-none d-lg-flex">
            <a class="nav-link" href="#">
              <i class="icon-ellipsis"></i>
            </a>
          </li>
        </ul>
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
            <a class="nav-link" href="index.html">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
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
                      <h4 class="card-title">Crear Producto</h4>
                      <p class="card-description">
                      </p>
                      <form class="forms-sample">
                        <div class="form-group">
                          <label for="exampleInputUsername1">Nombre</label>
                          <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Nombre">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Descripcion</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Descripcion">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Cantidad</label>
                          <input type="Number" class="form-control" id="exampleInputPassword1" placeholder="Cantidad">
                        </div>
                        <div class="form-group">
                          <label for="Categoria">Medidas </label>
                          <select class="form-control" id="Categoria">
                            <option>9"</option>
                            <option>14"</option>
                            <option>No tiene</option>

                          </select>
                        </div>
                        <div class="form-group">
                          <label for="Categoria">Categoria </label>
                          <select class="form-control" id="Categoria">
                            <option>Pizza</option>
                            <option>Boneless</option>
                            <option>Entradas</option>
                            <option>Bebidas</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputConfirmPassword1">Precio</label>
                          <input type="Number" class="form-control" id="exampleInputConfirmPassword1" placeholder="Precio">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputConfirmPassword1">Imagen</label>
                          <input type="file" class="form-control" id="exampleInputConfirmPassword1" placeholder="Imagen">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mr-2">Guardar</button>
                    <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
                <?php

                $ProductoQuery = $pdo->prepare("SELECT * FROM Producto;");
                $ProductoQuery->execute();
                $ListProductos = $ProductoQuery->fetchAll(PDO::FETCH_ASSOC);
                var_dump($ListProductos);
                ?>

                <div class="row">
                  <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <p class="card-title mb-0">Producto</p>
                        <div class="table-responsive">
                          <table class="table table-striped table-borderless">
                            <thead>
                              <tr>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>Cantidad</th>
                                <th>Medida</th>
                                <th>Categoria</th>
                                <th>Precio</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($ListProductos as $Productos) { ?>
                             <tr class="table-row">
                              <td><?php echo $Productos['idProducto']; ?> </td>
                              <td><?php echo $Productos['nombre']; ?> </td>
                              <td><?php echo $Productos['descripcion']; ?> </td>
                              <td><?php echo $Productos['cantidad']; ?> </td>
                              <td><?php echo $Productos['medida']; ?> </td>
                              <td><?php echo $Productos['categoria']; ?> </td>
                              <td><?php echo $Productos['precio']; ?> </td>

                                                        
                                                            <form method="POST" enctype="multipart/form-data">
                                                                <!--change method to POST, we use enctype to allow file submission-->
                                                                <div class="form-group">
                                                                    <label for="txtName">Name</label>
                                                                    <input type="text" name="txtName" id="txtName" value="<?php echo $txtName; ?>" class="form-control single-input" placeholder="Name">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="txtPrice">Price</label>
                                                                    <input type="text" name="txtPrice" id="txtPrice" value="<?php echo $txtPrice; ?>" class="form-control progress-table-wrap" placeholder="Product price">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="txtDescription">Description</label>
                                                                    <input type="text" name="txtDescription" value="<?php echo $txtDescription; ?>" id="txtDescription" class="form-control progress-table-wrap" placeholder="Product description">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="txtCategory">Categories</label>
                                                                    <?php echo $txtCategory; ?>
                                                                    <select class="form-control" name="txtCategory" id="txtCategory">
                                                                        <option value="00">-- Seleccione --</option>
                                                                        <?php $sentenciaCategories = $pdo->prepare("SELECT * from Category;");
                                                                        $sentenciaCategories->execute();
                                                                        $ListCategories = $sentenciaCategories->fetchAll();
                                                                        foreach ($ListCategories as $category) {
                                                                            echo '<option value="' . $category['CategoryID'] . '">' . $category['NameCategory'] . '</option>';
                                                                        } ?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="txtImage"></label>
                                                                    <?php echo $txtImage; ?>
                                                                    <input type="file" name="txtImage" id="txtImage" class="form-control" placeholder="Image">
                                                                </div>
                                                                <div class="btn-group" role="group">
                                                                    <button type="submit" name="accion" value="add" class="genric-btn success circle arrow">Add</button>
                                                                    <!--value must match with switch-->
                                                                    <button type="submit" name="accion" value="Cancel" class="genric-btn danger circle arrow">Cancel</button>

                                                                    <form method="post">
                                                                        <input type="hidden" name="txtID" value="<?php echo $Productos['idProducto']; ?>">
                                                                        <input type="submit" name="accion" value="modify" class="btn btn-primary">
                                                                        <input type="submit" name="accion" value="delete" class="btn btn-danger">   

                                                        
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



        <div class="row">


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