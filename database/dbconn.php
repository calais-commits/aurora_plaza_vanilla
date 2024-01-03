<?php

session_start();

/* DB data */
$host = "localhost";
$dbname = "id21747204_aurora_plaza_vanilla";
$dbuser = "id21747204_admin";
$dbpass = "Admin123*";

/* Connect with DB */
try {
  $pdo = new PDO("mysql:host=$host;dbname=$dbname", $dbuser, $dbpass);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo "Error al conectar con la base de datos: " . $e->getMessage();
  die();
}

?>