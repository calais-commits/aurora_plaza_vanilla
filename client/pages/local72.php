<?php
include('../../database/dbconn.php');

if (isset($_GET['id'])) {
  $id = $_GET['id'];

  $sql = $pdo->prepare("SELECT * FROM product WHERE id = :id");
  $sql->bindParam(':id', $id);
  $sql->execute();
  $product = $sql->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Local</title>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../styles/local-styles.css">
</head>

<body>

  <header class="nav-container">
    <?php include("../includes/local-header.html"); ?>
  </header>

  <main>
    <?php include("../includes/local-main.php"); ?>
  </main>

  <footer class="footer-section d-flex flex-column align-items-center bg-primary row mt-3">
    <?php include("../includes/footer.html");  ?>
  </footer>

  <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>