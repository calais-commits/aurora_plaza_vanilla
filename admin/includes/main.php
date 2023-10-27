<div class="container">
  <button class="mb-4 btn btn-info">
    <a href="create.php" class="text-decoration-none text-white d-flex align-items-center">
      <strong>Añadir</strong>
      <ion-icon class="ml-1" name="create"></ion-icon>
    </a>
  </button>
  <table class="table table-responsive">
    <thead>
      <tr>
        <td class="text-center"><strong>ID</strong></td>
        <td class="text-center"><strong>Nombre</strong></td>
        <td class="text-center"><strong>Tamaño</strong></td>
        <td class="text-center"><strong>Piso</strong></td>
        <td class="text-center d-none d-lg-block"><strong>Imagen</strong></td>
        <td class="text-center"><strong>Descripción</strong></td>
        <td class="text-center"><strong>Acciones</strong></td>
      </tr>
    </thead>
    <tbody>
      <?php
      $sql = $pdo->prepare("SELECT * FROM product");
      $sql->execute();
      $count = $sql->rowCount();

      if ($count > 0) {
        $records = $sql->fetchAll();
      }

      foreach ($records as $r) :
        $recordsId[] = $r['id']; // Agregar el ID al array
      ?>
        <tr>
          <td class="text-center align-middle"><?= $r['id'] ?></td>
          <td class="text-center align-middle"><?= $r['product_name'] ?></td>
          <td class="text-center align-middle"><?= $r['product_size'] ?></td>
          <td class="text-center align-middle"><?= $r['floor'] ?></td>
          <td class="text-center d-none d-lg-block">
            <img class="img-fluid w-75" src="image.php?id=<?= $r['id'] ?>" alt="image">
          </td>
          <td class="text-center align-middle"><?= $r['description'] ?></td>
          <td class="text-center align-middle">
            <div class="d-lg-flex flex-lg-column">
              <a class="btn btn-warning mb-2 text-white text-decoration-none mt-xl-5 mt-lg-3 mt-sm-1 mt-xs-auto d-md-inline-block pr-3" href="update.php?upd=<?= $r['id'] ?>">
                Editar
                <ion-icon class="ml-1" name="hammer"></ion-icon>
              </a>
              <a class="btn btn-danger text-white text-decoration-none mb-lg-3 mb-xl-3 d-md-inline-block" href="remove.php?rm=<?= $r['id'] ?>">
                Borrar
                <ion-icon class="ml-1" name="trash"></ion-icon>
              </a>
            </div>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>


<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>
<!-- ionic icons -->
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>

</html>