<?php
//DB connection
include('../database/dbconn.php');
session_start();

// Verify is session variable already exist
if (isset($_SESSION['user_session'])) {
	// Verify if is admin or client
	if ($_SESSION['admin'] == 1) {
			// Readirect to admin page
			header("Location: ../admin/index.php");
			exit();
	} else {
			// Redirect to client page
			header("Location: ../client/index.php");
			exit();
	}
}

//Validate if we have a global variable $_POST for email and password.
if (isset($_POST['submit'])) {
	//Capture user data
	$email = $_POST['email'];
	$password = $_POST['password'];
	$admin;
	$message = "";
	//Prepare SQL query for submit user data to DB.
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = $pdo->prepare("SELECT *, admin, name FROM user WHERE email=:email AND password=:password");
	$sql->bindParam(':email', $email);
	$sql->bindParam(':password', $password);
	//Try to xecute query and capture result from query.
	$sql->execute();
	$user = $sql->fetch(PDO::FETCH_ASSOC);
	//Log as admin.
	if ($user['email'] === $email && $user['password'] === $password && $user['admin'] == 1) {
		$_SESSION['user_session'] = $user['email'];
		$_SESSION['user_name'] = $user['name'];
		$_SESSION['admin'] = TRUE;
		header('Location: ../admin/index.php');
		$message = "<div class='alert alert-success text-center' role='alert'>Has ingresado satisfactoriamente como administrador.</div>";
	}
	//Log as client .
	elseif ($user['email'] === $email && $user['password'] === $password && $user['admin'] != 1) {
		$_SESSION['user_session'] = $user['email'];
		$_SESSION['user_name'] = $user['name'];
		$_SESSION['admin'] = FALSE;
		header('Location: ../client/index.php');
		$message = "<div class='alert alert-success text-center' role='alert'>Has ingresado satisfactoriamente como cliente.</div>";
	}
	//Validate if fields are empty.
	elseif ($email === "" || $name === "" || $password === "") {
		$message = "<div class='alert alert-warning text-center' role='alert'>Por favor, ingrese sus datos.</div>";
	}
	//If introduced data are incorrect
	elseif($email!=$user['email'] || $password!=$user['password']){
		$message = "<div class='alert alert-danger text-center' role='alert'>Datos incorrectos.</div>";
	}
	//If a session already exist.
	elseif (isset($_SESSION['user_session'])){
		//Redirect to admin
		if($admin == TRUE){
			header('Location: ../admin/index.php');
		}
		//Redirect to client
		elseif($admin == FALSE){
			header('Location: ../client/index.php');
		}
	}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Login V3</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
	<form action="login.php" method="POST">
		<div class="limiter">
			<div class="container-login100">
				<div class="wrap-login100">
					<form class="login100-form validate-form">
						<!-- Message -->
						<?php if ($message) : ?>
							<?= $message; ?>
						<?php endif; ?>
						<!-- Logo -->
						<span class="login100-form-logo">
							<i class="zmdi zmdi-landscape"></i>
						</span>
						<!-- Title -->
						<span class="login100-form-title p-b-34 p-t-27">
							Log in
						</span>
						<!-- Email -->
						<div class="wrap-input100 validate-input" data-validate="Enter email">
							<input class="input100" type="email" name="email" placeholder="Email">
							<span class="focus-input100" data-placeholder="&#xf207;"></span>
						</div>
						<!-- Password -->
						<div class="wrap-input100 validate-input" data-validate="Enter password">
							<input class="input100" type="password" name="password" placeholder="Password">
							<span class="focus-input100" data-placeholder="&#xf191;"></span>
						</div>
						<!-- Login -->
						<div class="container-login100-form-btn">
							<button class="login100-form-btn" type="submit" name="submit" value="submit">
								Login
							</button>
						</div>
					</form>
					<!-- Register -->
					<div class="login-register-div">
						<span><a href="register.php" class="login-register-link">¿No tienes un usuario? ¡Regístrate!</a></span>
					</div>
				</div>
			</div>
		</div>
		<div id="dropDownSelect1"></div>
	</form>




	<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="js/main.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>

</html>