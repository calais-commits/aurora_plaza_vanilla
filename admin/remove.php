<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('../database/dbconn.php');

// Verifica si se proporciona un ID en la URL
if (isset($_GET['rm'])) {
  $id = $_GET['rm'];
  // Realiza la consulta SQL con el ID proporcionado
  $query = $pdo->prepare("DELETE FROM product WHERE id = :id");
  $query->bindParam(':id', $id);
  $query->execute();

  // Verifica errores después de la ejecución de la consulta
  $errorInfo = $query->errorInfo();
  if ($errorInfo[0] !== '00000') {
    die("Error en la consulta: " . print_r($errorInfo, true));
  }
  header("Location: index.php");
}
?>