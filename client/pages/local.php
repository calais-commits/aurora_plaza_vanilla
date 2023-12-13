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

    <section class="second-section">
      <div class="product-name">
        <h1 class="text-primary-emphasis text-center"><?= $product['product_name']; ?></h1>
      </div>
      <div class="description">
        <p class="text-center"><?= $product['description']; ?></p>
      </div>
    </section>

    <section class="first-section">

      <div class="banner text-center">
        <div id="carouselExample" class="carousel slide">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="<?= $product['url']; ?>" class="banner-img" alt="...">
            </div>
            <div class="carousel-item">
              <img src="<?= $product['url']; ?>" class="banner-img" alt="...">
            </div>
            <div class="carousel-item">
              <img src="<?= $product['url']; ?>" class="banner-img" alt="...">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>

      </div>
    </section>

    <section class="third-section">
      <div class="description-title">
        <h1 class="text-primary-emphasis text-center"> ¿Te interesa?</h1>
      </div>
      <div class="description">
        <p class="text-center text-secondary-emphasis">¡Comunícate con nosotros mediante nuestra información de contacto que encontrarás en la página o en nuestras redes sociales! <br><br></p>
        <h2 class="text-info text-center">Horario de atención 24/7</h2>
      </div>
    </section>

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