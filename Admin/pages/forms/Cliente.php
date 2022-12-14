<!DOCTYPE html>
<html lang="en">
<?php
include '../../../global/ServerConfiguration.php';
include '../../../global/DbConnection.php';
?>

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>Admin Cliente</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css" />
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css" />
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css" />
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/select2/select2.min.css" />
  <link rel="stylesheet" href="vendors/select2-bootstrap-theme/select2-bootstrap.min.css" />
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/vertical-layout-light/style.css" />
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
<?php
  //isset(what we check)-?-if true-:-if false;
  $txtID = (isset($_POST['txtID'])) ? $_POST['txtID'] : "";
  $txtName = (isset($_POST['txtName'])) ? $_POST['txtName'] : "";
  $txtApel = (isset($_POST['txtApel'])) ? $_POST['txtApel'] : "";
  $txtEmail = (isset($_POST['txtEmail'])) ? $_POST['txtEmail'] : "";
  $txtPassword = (isset($_POST['txtPassword'])) ? $_POST['txtPassword'] : "";
  $txtDir = (isset($_POST['txtDir'])) ? $_POST['txtDir'] : "";
  $txtCodp = (isset($_POST['txtCodp'])) ? $_POST['txtCodp'] : "";
  $action = (isset($_POST['action'])) ? $_POST['action'] : "";

  switch ($action) {
    case 'Add':
      $InsertQuery = $pdo->prepare("INSERT INTO Cliente (nombre, apellido, email, password, direccion, codigo_postal) VALUES (:nombre, :apellido, :email, :password, :direccion, :codigo_postal);");
      $InsertQuery->bindParam(':nombre', $txtName);
      $InsertQuery->bindParam(':apellido', $txtApel);
      $InsertQuery->bindParam(':email', $txtEmail);
      $InsertQuery->bindParam(':password', $txtPassword);
      $InsertQuery->bindParam(':direccion', $txtDir);
      $InsertQuery->bindParam(':codigo_postal', $txtCodp);
      var_dump($pdo);
      $InsertQuery->execute();
      break;

    case 'Select':
      $SelectQuery = $pdo->prepare("SELECT * FROM Cliente WHERE idCliente=:idCliente;");
      $SelectQuery->bindParam(':idCliente', $txtID);
      $SelectQuery->execute();
      $ACliente = $SelectQuery->fetch(PDO::FETCH_LAZY);
      $txtName = $ACliente['nombre'];
      $txtApel = $ACliente['apellido'];
      $txtEmail = $ACliente['email'];
      $txtPassword = $ACliente['password'];
      $txtDir = $ACliente['direccion'];
      $txtCodp = $ACliente['codigo_postal'];
      break;

      case 'Modify':
        echo "mofify";
        $ModifyQuery = $pdo->prepare("UPDATE Cliente SET nombre = :nombre, apellido = :apellido, email = :email, password = :password, direccion = :direccion, codigo_postal = :codigo_postal WHERE idCliente=:id;");
        $ModifyQuery->bindParam(':nombre', $txtName);
        $ModifyQuery->bindParam(':apellido', $txtApel);
        $ModifyQuery->bindParam(':email', $txtEmail);
        $ModifyQuery->bindParam(':password', $txtPassword);
        $ModifyQuery->bindParam(':direccion', $txtDir);
        $ModifyQuery->bindParam(':codigo_postal', $txtCodp);
        $ModifyQuery->execute();
        break;

    case 'Delete':
      $DeleteQuery = $pdo->prepare("DELETE FROM Cliente WHERE idCliente=:idCliente;");
      $DeleteQuery->bindParam(':idCliente', $txtID);
      $DeleteQuery->execute();
      break;

      case 'Cancel':
        $txtName = "";
        $txtApel = "";
        $txtEmail = "";
        $txtPassword = "";
        $txtDir = "";
        $txtCodp = "";
        break;

    default;
      echo "Invalid option";
      break;
  } ?>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="index.html"><img src="../../images/LOGO-BARON-EFECTO.png" class="mr-2" alt="logo"></a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="../../images/LOGO-BARON-EFECTO.png" alt="logo"></a>
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
            <div class="img-ss rounded-circle bg-light border mr-3"></div>
            Light
          </div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme">
            <div class="img-ss rounded-circle bg-dark border mr-3"></div>
            Dark
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
      <div id="right-sidebar" class="settings-panel">
        <i class="settings-close ti-close"></i>
        <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a>
          </li>
        </ul>
        <div class="tab-content" id="setting-content">
          <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
            <div class="add-items d-flex px-3 mb-0">
              <form class="form w-100">
                <div class="form-group d-flex">
                  <input type="text" class="form-control todo-list-input" placeholder="Add To-do" />
                  <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">
                    Add
                  </button>
                </div>
              </form>
            </div>
            <div class="list-wrapper px-3">
              <ul class="d-flex flex-column-reverse todo-list">
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" />
                      Team review meeting at 3.00 PM
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" />
                      Prepare for presentation
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" />
                      Resolve all the low priority tickets due today
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked />
                      Schedule meeting for next week
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked />
                      Project review
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
              </ul>
            </div>
            <h4 class="px-3 text-muted mt-5 font-weight-light mb-0">
              Events
            </h4>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="ti-control-record text-primary mr-2"></i>
                <span>Feb 11 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">
                Creating component page build a js
              </p>
              <p class="text-gray mb-0">The total number of sessions</p>
            </div>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="ti-control-record text-primary mr-2"></i>
                <span>Feb 7 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">
                Meeting with Alisa
              </p>
              <p class="text-gray mb-0">Call Sarah Graves</p>
            </div>
          </div>
          <!-- To do section tab ends -->
          <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
            <div class="d-flex align-items-center justify-content-between border-bottom">
              <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">
                Friends
              </p>
              <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 font-weight-normal">See
                All</small>
            </div>
            <ul class="chat-list">
              <li class="list active">
                <div class="profile">
                  <img src="images/faces/face1.jpg" alt="image" /><span class="online"></span>
                </div>
                <div class="info">
                  <p>Thomas Douglas</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">19 min</small>
              </li>
              <li class="list">
                <div class="profile">
                  <img src="images/faces/face2.jpg" alt="image" /><span class="offline"></span>
                </div>
                <div class="info">
                  <div class="wrapper d-flex">
                    <p>Catherine</p>
                  </div>
                  <p>Away</p>
                </div>
                <div class="badge badge-success badge-pill my-auto mx-2">
                  4
                </div>
                <small class="text-muted my-auto">23 min</small>
              </li>
              <li class="list">
                <div class="profile">
                  <img src="images/faces/face3.jpg" alt="image" /><span class="online"></span>
                </div>
                <div class="info">
                  <p>Daniel Russell</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">14 min</small>
              </li>
              <li class="list">
                <div class="profile">
                  <img src="images/faces/face4.jpg" alt="image" /><span class="offline"></span>
                </div>
                <div class="info">
                  <p>James Richardson</p>
                  <p>Away</p>
                </div>
                <small class="text-muted my-auto">2 min</small>
              </li>
              <li class="list">
                <div class="profile">
                  <img src="images/faces/face5.jpg" alt="image" /><span class="online"></span>
                </div>
                <div class="info">
                  <p>Madeline Kennedy</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">5 min</small>
              </li>
              <li class="list">
                <div class="profile">
                  <img src="images/faces/face6.jpg" alt="image" /><span class="online"></span>
                </div>
                <div class="info">
                  <p>Sarah Graves</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">47 min</small>
              </li>
            </ul>
          </div>
          <!-- chat tab ends -->
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
          <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
              <form method="post">
                <h4 class="card-title">Formulario cliente</h4>
                <div class="form-group">
                <label for="txtName">Nombre</label>
                    <input type="text" name="txtName" id="txtName" value="<?php echo $txtName; ?>" class="form-control single-input" placeholder="Username">
                  </div>
                  <div class="form-group">
                <label for="txtApel">Apellido</label>
                    <input type="text" name="txtApel" id="txtApel" value="<?php echo $txtApel; ?>" class="form-control single-input" placeholder="Apellido">
                  </div>
                  <div class="form-group">
                    <label for="txtEmail">Email</label>
                    <input type="email" name="txtEmail" id="txtEmail" value="<?php echo $txtEmail; ?>" class="form-control single-input" placeholder="Email">
                    <br>
                  </div>
                  <div class="form-group">
                    <label for="txtPassword">Password</label>
                    <input type="password" name="txtPassword" id="txtPassword" value="<?php echo $txtPassword; ?>" class="form-control single-input" placeholder="Password">
                  </div>
                  <div class="form-group">
                <label for="txtDir">Direccion</label>
                    <input type="text" name="txtDir" id="txtDir" value="<?php echo $txtDir; ?>" class="form-control single-input" placeholder="Direccion">
                  </div>
                  <div class="form-group">
                <label for="txtCodp">Codigo Postal</label>
                    <input type="text" name="txtCodp" id="txtCodp" value="<?php echo $txtCodp; ?>" class="form-control single-input" placeholder="Codigo Postal">
                  </div>
                  <div>
                  <label for="txtID"></label>
                  <input type="hidden" name="txtID" id="txtID" value="<?php echo $txtID; ?>" class="form-control single-input" placeholder="ID">
                  </div>
                  <input type="submit" name="action" value="Add" class="btn btn-primary">
                  <input type="submit" name="action" value="Cancel" class="btn btn-danger">
                  <input type="submit" name="action" value="Modify" class="btn btn-danger">
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php
      $ClienteQuery = $pdo->prepare("SELECT * FROM Cliente;");
      $ClienteQuery->execute();
      $ListCliente = $ClienteQuery->fetchAll(PDO::FETCH_ASSOC);
      //var_dump($Listclientes);
      ?>
      <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <p class="card-title mb-0">Administradores</p>
              <div class="table-responsive">
                <table class="table table-striped table-borderless">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nombre</th>
                      <th>Apellido</th>
                      <th>Email</th>
                      <th>Password</th>
                      <th>Direccion</th>
                      <th>Codigo Postal</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($ListCliente as $Cliente) { ?>
                      <tr class="odd">
                      <td><?php echo $Cliente['idCliente'] ?> </td>
                        <td><?php echo $Cliente['nombre']; ?> </td>
                        <td><?php echo $Cliente['apellido']; ?> </td>
                        <td><?php echo $Cliente['email']; ?> </td>
                        <td><?php echo $Cliente['password']; ?> </td>
                        <td><?php echo $Cliente['direccion']; ?> </td>
                        <td><?php echo $Cliente['codigo_postal']; ?> </td>
                        <td>
                          <form method="POST">
                                <input type="hidden" name="txtID" value="<?php echo $Cliente['idCliente']; ?>">
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
    






        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->  <div class="d-sm-flex justify-content-center justify-content-sm-between">
          </div>
        </footer>
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
  <script src="vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <script src="vendors/select2/select2.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/file-upload.js"></script>
  <script src="js/typeahead.js"></script>
  <script src="js/select2.js"></script>
  <!-- End custom js for this page-->
</body>

</html>