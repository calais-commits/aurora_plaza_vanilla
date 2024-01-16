<?php 
include("../database/dbconn.php");
include_once("includes/header.php");


if(isset($_GET['upd'])){
  $id = $_GET['upd'];
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = $pdo->prepare("SELECT * FROM product WHERE id = :id");
  $sql->bindParam(":id", $id);
  $sql->execute();
  $count = $sql->rowCount();

  if($count > 0){
    $data = $sql->fetch(PDO::FETCH_ASSOC);
  }
}

?>

<div class="container m-auto w-25 flex-grow-1">
  <div id="my-3 text-center d-flex flex-row justify-content-center"><p><h1>Actualizar producto</h1></p></div>
  <form action="upd.php" method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <input type="hidden" name="id" value="<?= $data['id'] ?>">
      <input type="text" name="product_name" id="product_name" class="form-control" placeholder="Nombre" value="<?= $data['product_name']; ?>">
    </div>
    <div class="form-group">
      <input type="number" name="product_size" id="product_size" class="form-control" placeholder="Tamaño" value="<?= $data['product_size']; ?>">
    </div>
    <div class="form-group">
      <input type="number" name="floor" id="floor" class="form-control" placeholder="Piso" value="<?= $data['floor']; ?>">
    </div>
    <div class="form-group">
      <input type="text" name="url" id="url" class="form-control" placeholder="URL" value="<?= $data['url']; ?>">
    </div>
    <div class="form-group">
      <img class="w-100" src="<?php echo $data['url']; ?>">
    </div>
    <div class="form-group">
      <input type="text" name="description" id="description" class="form-control" placeholder="<?= $data['description']; ?>">
    </div>
    <input type="submit" value="Aceptar" class="btn btn-success">
  </form>
</div>
  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
  
  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>
  
  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>
  
</body class="mb-4">
<?php 
  include_once("includes/footer.php");
?>
</html>