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
          <img src="<?= $product['url']; ?>" class="banner-img" alt="img1">
        </div>
        <div class="carousel-item">
          <img src="<?= $product['url']; ?>" class="banner-img" alt="img2">
        </div>
        <div class="carousel-item">
          <img src="<?= $product['url']; ?>" class="banner-img" alt="img3">
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

<section class="third-section mt-3">
  <div class="description-title">
    <h1 class="text-primary-emphasis text-center">¿Te interesa?</h1>
  </div>
  <div class="description">
    <p class="text-center text-secondary-emphasis">¡Comunícate con nosotros mediante nuestra información de contacto que encontrarás en la página o en nuestras redes sociales! <br><br></p>
    <h2 class="text-info text-center">Horario de atención 24/7</h2>
  </div>
</section>

