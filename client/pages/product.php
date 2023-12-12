<?php
include('../database/dbconn.php');
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Local 1</title>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../styles/local-styles.css">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../styles/index-styles.css">
</head>

<body>

  <header class="nav-container">
    <?php include("../includes/local-header.html"); ?>
  </header>
  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <!-- This section is for product image display and title -->
    <section class="first-section">
      <div class="product-image">
        <h1><?php echo $row['nombre']; ?></h1>
        <p><?php echo $row['descripcion']; ?></p>
        <p>Precio: <?php echo $row['precio']; ?></p>
        <img src="data:image/jpeg;base64,<?php echo base64_encode($row['imagen']); ?>" alt="Imagen del producto">
        <!-- Otros detalles del producto -->
      </div>
    </section>
  </main>

  <footer class="footer-section d-flex flex-column align-items-center bg-primary row mt-3">
    <?php include("../includes/footer.html");  ?>
  </footer>

  <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
  <script src="js/bootstrap.min.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>