<?php 
?>
<div class="container">
  <table class="table">
    <thead>
      <tr>
        <td class="text-center">ID</td>
        <td class="text-center">Nombre</td>
        <td class="text-center">Tamaño</td>
        <td class="text-center">Piso</td>
        <td class="text-center">Imagen</td>
        <td class="text-center">Descripción</td>
        <td class="text-center" colspan="2">Acciones</td>
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
          <?php echo $r['id'] ?>
          <td class="text-center"><img src="includes/image.php?id=<?php echo $r['id'] ?>" alt="image" class="w-50"></td>
          <?php echo $r['id'] ?>
          <td class="text-center"><?= $r['description'] ?></td>
          <td class="text-center"><a href="#">Actualizar</a></td>
          <td class="text-center"><a href="#">Eliminar</a></td>
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

</body>

</html>