<section class="carousel-section" id="home">
  <!-- Carousel -->
  <div id="carouselExampleIndicators" class="carousel" data-ride="carousel">
    <div class="carousel-inner banner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="assets/mall-2.jpg" alt="First slide">
        <div class="carousel-caption d-none d-sm-block">
          <h1 class="text-primary-emphasis">Aurora Plaza</h1>
          <h2 class="text-secondary-emphasis">¡Únete a nosotros!</h2>
        </div>
      </div>
    </div>
</section>
<section class="second-section mb-1 d-flex align-items-center" id="aboutus">
  <!-- Contenedor -->
  <div class="container my-4">
    <div class="row">
      <!-- Texto -->
      <div class="col-6 align-self-center" id="second-section-text-container">
        <h2 class="text-primary" id="second-section-title">Sobre nosotros</h2>
        <p class="text-secondary">¡Construimos centros comerciales desde el año 1401 y seguimos aquí! Contamos con muchas sucursales a lo largo de América y Europa. Abre tu local con nosotros y sé parte de nuestro inmenso de equipo y emprendedores que han dado vida a sus negocios con nosotros.</p>
        <p>¿Qué esperas? ¡Abre tu tienda con nosotros!</p>
      </div>
      <!-- Imagen -->
      <div class="col-6 d-flex align-items-center" id="second-section-img-container">
        <div class="img-container w-75">
          <img class="img-fluid w-100" id="img-about-us" src="assets/aboutus2.jpg" alt="aboutus-img">
        </div>
      </div>
    </div>
  </div>
</section>
<section class="third-section mx-4">
  <!-- Título de la sección -->
  <div class="third-section-title my-3">
    <h2 class="text-primary text-center py-5">Locales disponibles</h2>
  </div>
  <!-- Carousel -->
  <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner cards-inner m-auto d-flex">
      <!-- Cartas -->
      <?php
      //Get all products for DB 
      $sql = $pdo->prepare("SELECT * FROM product");
      $sql->execute();
      $count = $sql->rowCount();
      //Make a card for each product
      if ($count > 0) {
        $products = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach ($products as $product) {

          echo '<div class="carousel-item cards-item">
          <div class="card text-white bg-primary">
          <img src="'.$product['url'].'" class="d-block img-fluid c-img img1">
          <div class="card-body">
          <h4 class="card-title">'.$product["product_name"].'</h4>
          <p class="card-text">'.$product["description"].'</p>
          <div class="button-container">
          <a href="pages/local'.$product["id"].'.php?id='.$product["id"].'">
          <button id="btn" type="button" class="btn btn-info">Ver</button>
          </a>
          </div>
          </div>
          </div>
          </div>';
        }
      }
      ?>
    <!-- Controles -->
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
    </div>
  </div>

</section>