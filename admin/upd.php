<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
include("../database/dbconn.php");

if(isset($_POST['id']) && isset($_POST['product_name']) && isset($_POST['product_size']) && isset($_POST['floor']) && isset($_POST['description'])){

  $id = $_POST['id'];
  $product_name = $_POST['product_name'];
  $product_size = $_POST['product_size'];
  $floor = $_POST['floor'];
  $description = $_POST['description'];
  // Verificar si la clave 'image' está presente en $_FILES
  if (isset($_FILES['image']['tmp_name']) && !empty($_FILES['image']['tmp_name'])) {
    $img_path = $_FILES['image']['tmp_name'];
    $img_content = file_get_contents($img_path);
} else {
    // Manejar el caso en que 'image' no está presente
    $img_content = null;  // O establecer un valor predeterminado según tus necesidades
    echo "No se ha proporcionado ninguna imagen.";
}


  $sql = $pdo->prepare("UPDATE product SET product_name=:product_name, product_size=:product_size, floor=:floor, image=:image, description=:description WHERE id=:id");
  $sql->bindParam(":id", $id);
  $sql->bindParam(":product_name", $product_name);
  $sql->bindParam(":product_size", $product_size);
  $sql->bindParam(":floor", $floor);
  $sql->bindParam(":description", $description);
  $sql->bindParam(":image", $img_content);
  $sql->execute();
  header("Location: index.php");
}