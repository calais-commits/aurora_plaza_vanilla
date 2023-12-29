<?php

session_start();

/* DB data */
$host = "127.0.0.1";
$dbname = "aurora_plaza_vanilla";
$dbuser = "root";
$dbpass = "";

/* Connect with DB */
try {
  $pdo = new PDO("mysql:host=$host;dbname=$dbname", $dbuser, $dbpass);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo "Error al conectar con la base de datos: " . $e->getMessage();
  die();
}

?>