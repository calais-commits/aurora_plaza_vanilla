<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="styles.css">
  <title>Aurora Plaza</title>
</head>

<body>
  <header class="nav-container">
    <?php include("includes/header.html"); ?>
  </header>

  <main>
    <?php include("includes/main.html"); ?>
  </main>

  <footer class="footer-section d-flex flex-column align-items-center bg-primary row">
    <?php include("includes/footer.html") ?>
  </footer>
  <script src="js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <script src="index.js"></script>
</body>

</html>