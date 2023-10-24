<?php
include('../database/dbconn.php');

//Verify if user is logged
if (isset($_SESSION['user_session'])) {
  try {
    //Capture user email
    $email = $_SESSION['user_session'];
    //Query access level for user, bind params and execute query
    $isAdmin = $pdo->prepare("SELECT admin FROM user WHERE email=:email");
    $isAdmin->bindParam(':email', $email);
    $isAdmin->execute();
    //Save results in a variable user
    $user = $isAdmin->fetch(PDO::FETCH_ASSOC);

    //Validate if email have value 1 in admin field
    if ($user) {
      if ($user['admin'] == 1) {
        //include("includes/footer.php");
      } else {
        header('Location: ../login/login.php');
        exit();
      }
    } else {
      header('Location: ../login/login.php');
      exit();
    }
  } catch (PDOException $e) {
    header('Location: ../login/login.php');
    echo "Error en la base de datos: " . $e->getMessage();
  }
} else {
  header('Location: ../login/login.php');
  exit();
}

if (isset($_POST['submit'])) {

  $product_name = $_POST['name'];
  $product_size = $_POST['size'];
  $product_floor = $_POST['floor'];
  $product_description = $_POST['description'];

  // Verifica si se ha subido un archivo
  if (isset($_FILES['img']['tmp_name']) && !empty($_FILES['img']['tmp_name'])) {
    $img_info = getimagesize($_FILES['img']['tmp_name']);

    if ($img_info !== false) {
      // El archivo es una imagen, entonces movemos el archivo y obtenemos su contenido
      $img_path = $_FILES['img']['tmp_name'];
      $img_content = file_get_contents($img_path);
    } else {
      // No es una imagen, manejar según sea necesario
      $img_content = "";
      echo "El archivo no es una imagen válida.";
    }
  } else {
    // No se subió ningún archivo
    $img_content = "";
    echo "No se subió ningún archivo.";
  }


  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = $pdo->prepare("INSERT INTO product (product_name, product_size, floor, image, description) VALUES (:name, :size, :floor, :img, :description)");
  $sql->bindParam(':name', $product_name);
  $sql->bindParam(':size', $product_size);
  $sql->bindParam(':floor', $product_floor);
  $sql->bindParam(':description', $product_description);
  $sql->bindParam(':img', $img_content);
  $sql->execute();

  echo "Guardado exitosamente";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create new product</title>
</head>

<body>

  <!DOCTYPE html>
  <html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Aurora Plaza - Admin</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="navbar-nav bg-gradient-custom sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
          <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
          </div>
          <div class="sidebar-brand-text mx-3">Aurora Plaza Admin</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Menú principal -->
        <li class="nav-item active">
          <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Menú principal</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
          Interface
        </div>

        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Utilities</span>
          </a>
          <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <a class="collapse-item" href="utilities-color.html">Añadir local</a>
            </div>
          </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

      </ul>
      <!-- End of Sidebar -->

      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

          <!-- Topbar -->
          <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">
              <div class="topbar-divider d-none d-sm-block"></div>
              <!-- Nav Item - User Information -->
              <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="mr-2 d-lg-inline text-gray-600 small"><?php echo $_SESSION['user_name']; ?></span>
                  <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <a href="../database/logout.php" class="pl-3"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-blue-200">Logout</i></a>
                  </a>
                </div>
              </li>

            </ul>

          </nav>
          <!-- End of Topbar -->
          <!-- Create -->
          <section>
            <form method="POST" action="create.php" enctype="multipart/form-data"><br>
              <input type="text" name="name" placeholder="Nombre del local"><br>
              <input type="number" name="size" placeholder="Tamaño del local"><br>
              <input type="number" name="floor" placeholder="Piso del local"><br>
              <input type="text" rows="10" cols="10" name="description" placeholder="Descripción del local"><br>
              <input type="file" name="img" placeholder="Imagen"><br>
              <input type="submit" name="submit" value="Aceptar">
            </form>
          </section>
        </div>
      </div>
    </div>

  </body>
  <?php include("includes/footer.php"); ?>

  </html>