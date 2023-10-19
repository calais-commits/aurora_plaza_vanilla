<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "upload_max_filesize: " . ini_get('upload_max_filesize') . "<br>";
echo "post_max_size: " . ini_get('post_max_size') . "<br>";
echo "memory_limit: " . ini_get('memory_limit') . "<br>";
echo "max_allowed_packet: " . ini_get('mysqlnd.net_cmd_buffer_size') . "<br>";


include('../database/dbconn.php');

if (isset($_POST['submit'])) {

  $product_name = $_POST['name'];
  $product_size = $_POST['size'];
  $product_floor = $_POST['floor'];
  $product_description = $_POST['description'];

  // Verifica si se ha subido un archivo
  if (isset($_FILES['img']['tmp_name']) && !empty($_FILES['img']['tmp_name'])) {
    $img_info = getimagesize($_FILES['img']['tmp_name']);
  
    if ($img_info !== false) {
      // El archivo es una imagen, entonces movemos el archivo y obtenemos su contenido
      $img_path = $_FILES['img']['tmp_name'];
      $img_content = addslashes(file_get_contents($img_path));
    } else {
      // No es una imagen, manejar según sea necesario
      $img_content = "";
      echo "El archivo no es una imagen válida.";
    }
  } else {
    // No se subió ningún archivo
    $img_content = "";
    echo "No se subió ningún archivo.";
  }


  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = $pdo->prepare("INSERT INTO product (product_name, product_size, floor, image, description) VALUES (:name, :size, :floor, :img, :description)");
  $sql->bindParam(':name', $product_name);
  $sql->bindParam(':size', $product_size);
  $sql->bindParam(':floor', $product_floor);
  $sql->bindParam(':description', $product_description);
  $sql->bindParam(':img', $img_content);
  $sql->execute();

  echo " Guardado exitosamente";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create new product</title>
</head>

<body>
  <section>
    <form method="POST" action="create.php" enctype="multipart/form-data"><br>
      <input type="text" name="name" placeholder="Nombre del local"><br>
      <input type="number" name="size" placeholder="Tamaño del local"><br>
      <input type="number" name="floor" placeholder="Piso del local"><br>
      <input type="text" rows="10" cols="10" name="description" placeholder="Descripción del local"><br>
      <input type="file" name="img" placeholder="Imagen"><br>
      <input type="submit" name="submit" value="Aceptar">
    </form>
  </section>
</body>

</html>