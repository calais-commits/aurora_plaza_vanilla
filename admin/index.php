<?php
//Connection to DB
include('../database/dbconn.php');
session_start();

//Verify if user is logged
if (isset($_SESSION['user_session'])){
  try{
    //Capture user email
    $email = $_SESSION['user_session'];
    //Query access level for user, bind params and execute query
    $isAdmin = $pdo->prepare("SELECT admin FROM user WHERE email=:email");
    $isAdmin->bindParam(':email', $email);
    $isAdmin->execute();
    //Save results in a variable user
    $user = $isAdmin->fetch(PDO::FETCH_ASSOC);
    
    //Validate if email have value 1 in admin field
    if($user){
      if($user['admin'] == 1){
        echo $user['email'] . $user['admin'];
        include("includes/header.html");
        include("includes/main.html");
        include("includes/footer.html");
      } else {
        header('Location: ../login/login.php');
        exit();
      }
    } else {
      echo $user['email'] . $user['admin'];
      header('Location: ../login/login.php');
      exit();
    }

  } catch(PDOException $e){
    echo $user['email'] . $user['admin'];
    echo "Error en la base de datos: " . $e->getMessage();
  }

} else {
  echo $user['email'] . $user['admin'];
  exit();
}
