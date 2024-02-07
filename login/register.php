<?php
include('../database/dbconn.php');

$message = "";

// Submit data to DB 
if (isset($_REQUEST['submit'])) {
	// Capture user data 
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	// Assign admin status to session variable
	$_SESSION['admin'] = 0; // By default, user is not an admin
	// Validate if data already exist 
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$validate = $pdo->prepare("SELECT * FROM user WHERE email=:email || name=:name");
	$validate->bindParam(':email', $email);
	$validate->bindParam(':name', $name);
	$validate->execute();
	// Validate if we have a result 
	if ($validate->rowCount() > 0) {
		$message = "<div class='alert alert-danger text-center' role='alert'>El usuario o email ya existen </div>";
	} elseif ($email === "" || $name === "" || $password === "") { // Validate if variables are empty 
		$message = "<div class='alert alert-warning text-center' role='alert'>Por favor, introduzca sus datos</div>";
	} elseif (!isset($message)) {
		$message = "<div class='alert alert-info text-center' role='alert'>Por favor, llene los campos</div>";
	} else {
		// Prepare SQL query for submit user data to DB
		$insert = $pdo->prepare("INSERT INTO user (name, email, password) VALUES (:name, :email, :password)");
		//	Bind values 
		$insert->bindParam(':name', $name);
		$insert->bindParam(':email', $email);
		$insert->bindParam(':password', $password);
		// Execute query, assign value to $_SESSION variable and redirect 
		$insert->execute();
		$message = "<div class='alert alert-success text-center' role='alert'>Usuario registrado satisfactoriamente</div>";
		// Assign admin status to session variable
		$_SESSION['admin'] = 0; // By default, user is not an admin
		// Verificar el estado del usuario (si es admin o no)
		$checkAdmin = $pdo->prepare("SELECT admin FROM user WHERE email=:email");
		$checkAdmin->bindParam(':email', $email);
		$checkAdmin->execute();

		if ($checkAdmin->rowCount() > 0) {
			$userData = $checkAdmin->fetch(PDO::FETCH_ASSOC);
			$_SESSION['admin'] = $userData['admin'];
		}
		$_SESSION['user_session'] = $email;
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
</head>

<body>
	<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
		<div class="limiter">
			<div class="container-login100">
				<div class="access-note">
					<h4 class="mb-5">Nota:<br></h4>
					<p class="data-paragraph mb-3 h6">Ahora puedes ingresar sin registrarte con datos de prueba</p>
					<a href="login.php" class="note-link h6">Ve directo al login</a>
				</div>
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
							Register
						</span>
						<!-- Username -->
						<div class="wrap-input100 validate-input" data-validate="Enter username">
							<input class="input100" type="text" name="name" placeholder="Username">
							<span class="focus-input100" data-placeholder="&#xf207;"></span>
						</div>
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
								Register
							</button>
						</div>
					</form>
					<!-- Login -->
					<div class="login-register-div">
						<span><a href="login.php" class="login-register-link" style="color: black;">¿Ya tienes una cuenta? ¡Inicia sesión!</a></span>
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

</body>

</html>