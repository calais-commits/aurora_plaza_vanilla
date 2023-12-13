<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('../database/dbconn.php');

// Verifica si se proporciona un ID en la URL
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  // Realiza la consulta SQL con el ID proporcionado
  $query = $pdo->prepare("SELECT image FROM product WHERE id = :id");
  $query->bindParam(':id', $id);
  $query->execute();

  // Verifica errores después de la ejecución de la consulta
  $errorInfo = $query->errorInfo();
  if ($errorInfo[0] !== '00000') {
    die("Error en la consulta: " . print_r($errorInfo, true));
  }


  $img_data = $query->fetch(PDO::FETCH_ASSOC);

  // Si se encontró la imagen, envía los encabezados adecuados y muestra la imagen
  if ($img_data) {
    header("Content-type: image/jpeg");
    echo $img_data['image'];
  }
}
?>