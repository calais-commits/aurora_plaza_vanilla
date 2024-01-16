<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include("../database/dbconn.php");

if (isset($_POST['id']) && isset($_POST['product_name']) && isset($_POST['product_size']) && isset($_POST['floor']) && isset($_POST['description']) && isset($_POST['url'])) {

  $id = $_POST['id'];
  $product_name = $_POST['product_name'];
  $product_size = $_POST['product_size'];
  $floor = $_POST['floor'];
  $url = $_POST['url'];

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

  $sql = $pdo->prepare("UPDATE product SET product_name=:product_name, product_size=:product_size, floor=:floor, url=:url, description=:description WHERE id=:id");
  $sql->bindParam(":id", $id);
  $sql->bindParam(":product_name", $product_name);
  $sql->bindParam(":product_size", $product_size);
  $sql->bindParam(":floor", $floor);
  $sql->bindParam(":description", $description);
  $sql->bindParam(":url", $url);
  $sql->execute();
  header("Location: index.php");
}
