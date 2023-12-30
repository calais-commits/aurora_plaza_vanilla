<?php
include('../database/dbconn.php');

//Verify if user is logged
if (isset($_SESSION['user_session'])) {
  try {
    //Capture user email
    $email = $_SESSION['user_session'];
    //Query access level for user, bind params and execute query
    $isAdmin = $pdo->prepare("SELECT admin FROM user WHERE email=:email");
    $isAdmin->bindParam(':email', $email);
    $isAdmin->execute();
    //Save results in a variable user
    $user = $isAdmin->fetch(PDO::FETCH_ASSOC);

    //Validate if email have value 1 in admin field
    if ($user) {
      if ($user['admin'] == 1) {
        //include("includes/footer.php");
      } else {
        header('Location: ../login/login.php');
        exit();
      }
    } else {
      header('Location: ../login/login.php');
      exit();
    }
  } catch (PDOException $e) {
    header('Location: ../login/login.php');
    echo "Error en la base de datos: " . $e->getMessage();
  }
} else {
  header('Location: ../login/login.php');
  exit();
}

if (isset($_POST['submit'])) {

  // Get the submited data from the form fields
  $product_name = $_POST['name'];
  $product_size = $_POST['size'];
  $product_floor = $_POST['floor'];
  $product_description = $_POST['description'];
  $product_url = $_POST['url'];

  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = $pdo->prepare("INSERT INTO product (product_name, product_size, floor, description, url) VALUES (:name, :size, :floor, :description, :url)");
  $sql->bindParam(':name', $product_name);
  $sql->bindParam(':size', $product_size);
  $sql->bindParam(':floor', $product_floor);
  $sql->bindParam(':description', $product_description);
  $sql->bindParam(':url', $product_url);
  $sql->execute();

  echo "Guardado exitosamente";

  // Query to get the ID of the last product submited
  $sql2 = $pdo->prepare("SELECT * FROM product WHERE id = LAST_INSERT_ID()");
  $sql2->execute();
  $product = $sql2->fetch(PDO::FETCH_ASSOC);


  // New file path
  $newPagePath = '../client/pages/local' . $product['id'] . '.php';

  // Template file path
  $templatePath = '../client/pages/local.php';

  // Read the content of the template
  $templateContent = file_get_contents($templatePath);

  // Write the content in the new file
  $result = file_put_contents($newPagePath, $templateContent);

}

include("includes/header.php");
?>

<!-- Create -->
<section class="container w-25">
  <div id="my-3 d-flex flex-row">
    <p>
    <h1 class="text-center">Añadir producto</h1>
    </p>
  </div>
  <form method="POST" action="create.php" enctype="multipart/form-data"><br>
    <div class="form-group">
      <input type="text" name="name" placeholder="Nombre del local" class="form-control"><br>
    </div>
    <div class="form-group">
      <input type="number" name="size" placeholder="Tamaño del local" class="form-control"><br>
    </div>
    <div class="form-group">
      <input type="number" name="floor" placeholder="Piso del local" class="form-control"><br>
    </div>
    <div class="form-group">
      <input type="text" name="url" placeholder="URL" class="form-control"><br>
    </div>
    <div class="form-group">
      <input type="text" rows="10" cols="10" name="description" placeholder="Descripción del local" class="form-control"><br>
    </div>
    <input type="submit" name="submit" value="Aceptar" class="btn btn-success" class="form-control">
  </form>
</section>

</body>

</html>