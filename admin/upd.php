<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include("../database/dbconn.php");

if (isset($_POST['id']) && isset($_POST['product_name']) && isset($_POST['product_size']) && isset($_POST['floor']) && isset($_POST['description'])) {

  $id = $_POST['id'];
  $product_name = $_POST['product_name'];
  $product_size = $_POST['product_size'];
  $floor = $_POST['floor'];
  $url = $_POST['url'];

  //Verify if the key 'image' is placed in $_FILES
  if (isset($_FILES['image']['tmp_name']) && !empty($_FILES['image']['tmp_name'])) {
    $img_path = $_FILES['image']['tmp_name'];
    $img_content = file_get_contents($img_path);
  } else {
    // Handle in case of 'image' isn't placed
    // Manejar el caso en que 'image' no está presente
    $sql_fetch_image = $pdo->prepare("SELECT image FROM product WHERE id = :id");
    $sql_fetch_image->bindParam(":id", $id);
    $sql_fetch_image->execute();
    $current_image = $sql_fetch_image->fetchColumn();
    $img_content = $current_image;  // O define a default value 
  }


  $id = $_POST['id'];
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = $pdo->prepare("SELECT * FROM product WHERE id = :id");
  $sql->bindParam(":id", $id);
  $sql->execute();
  $count = $sql->rowCount();

  if ($count > 0) {
    $data = $sql->fetch(PDO::FETCH_ASSOC);
  }

  // Verify if the field 'description' is empty
  $description = (!empty($_POST['description'])) ? $_POST['description'] : $data['description'];

  $sql = $pdo->prepare("UPDATE product SET product_name=:product_name, product_size=:product_size, floor=:floor, image=:image, url=:url, description=:description WHERE id=:id");
  $sql->bindParam(":id", $id);
  $sql->bindParam(":product_name", $product_name);
  $sql->bindParam(":product_size", $product_size);
  $sql->bindParam(":floor", $floor);
  $sql->bindParam(":description", $description);
  $sql->bindParam(":image", $img_content);
  $sql->bindParam(":url", $url);
  $sql->execute();
  header("Location: index.php");
}
