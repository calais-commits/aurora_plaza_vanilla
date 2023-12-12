<?php
session_start();
include('../database/dbconn.php');
if(!isset($_SESSION['user_session'])){
  header('Location: ../database/logout.php');
}

// Get products from database
$get_products = $pdo->prepare("SELECT * FROM product");
$get_products->execute();

// Generate a page for each product
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
  $template = file_get_contents('product_template.php');

  // Reemplazar placeholders con datos del producto
  $template = str_replace('{ProductoTitle}', $row['product_name'], $template);
  $template = str_replace('{ProductoDescripcion}', $row['descripcion'], $template);
  $template = str_replace('{ProductoImagen}', base64_encode($row['imagen']), $template);
  // Guardar la página generada en un archivo
  file_put_contents("product_pages/{$row['nombre']}.php", $template);
}

$conn = null;
?>
