<div class="container">
  <button class="mb-4 btn btn-info"><a href="create.php" class="text-decoration-none text-white d-flex align-items-center">
    <strong>Añadir</strong>
      <ion-icon class="ml-1" name="create"></ion-icon>
    </a>
  </button>
  <table class="table">
    <thead>
      <tr>
        <td class="text-center"><strong>ID</strong></td>
        <td class="text-center"><strong>Nombre</strong></td>
        <td class="text-center"><strong>Tamaño</strong></td>
        <td class="text-center"><strong>Piso</strong></td>
        <td class="text-center"><strong>Imagen</strong></td>
        <td class="text-center"><strong>Descripción</strong></td>
        <td class="text-center" colspan="2"><strong>Acciones</strong></td>
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
          <td class="text-center"><?= $r['id'] ?></td>
          <td class="text-center"><?= $r['product_name'] ?></td>
          <td class="text-center"><?= $r['product_size'] ?></td>
          <td class="text-center"><?= $r['floor'] ?></td>
          <td class="text-center"><img src="image.php?id=<?php echo $r['id'] ?>" alt="image" class="w-50"></td>
          <td class="text-center"><?= $r['description'] ?></td>
          <td class="text-center align-middle">
            <button class="btn btn-warning  align-middle">
              <a class="text-white text-decoration-none d-flex align-items-center" href="update.php?upd=<?= $r['id'] ?>">
                Actualizar
                <ion-icon class="ml-1 d-inline-block" name="hammer"></ion-icon>
              </a>
            </button>
          </td>
          <td class="text-center align-middle">
            <button class="btn btn-danger">
              <a class="text-white text-decoration-none d-flex align-items-center" href="remove.php?rm=<?= $r['id'] ?>">
                Eliminar
                <ion-icon class="ml-1 d-inline" name="trash"></ion-icon>
              </a>
            </button>
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