<?php
date_default_timezone_set('America/Sao_Paulo');
include("./../app/config.php");
include("./../app/autoload.php");

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= APP_NAME ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="/public/css/style.css">
</head>
<body>
  <?php
    include '../app/Views/header.php';
    $routes = new Routes();
    include '../app/Views/footer.php';
  ?>

<script src="./public/js/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"></script>
<script src="./public/js/main.js"></script>
</body>
</html>