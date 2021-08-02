<?php

  session_start();

  require 'assets/scripts/database.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT ID_usuarios, Email, Password, Nombre FROM usuarios WHERE ID_usuarios = :ID_usuarios');
    $records->bindParam(':ID_usuarios', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }
?>


<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./assets/style/style.css" />
    <title>Suizo</title>
  </head>
  <body>
    <header class="header">
      <div class="title-container">
        <h1 class="title">SUIZO</h1>
        <span class="open-nav">
          <?php if(!empty($user)): ?>
            <?= $user['Nombre'] ?>
            <a href="assets/scripts/logout.php">logout</a>
          <?php else: ?>
          <a class="button-a" href="./login.php">Iniciar sesión</a>
          <?php endif; ?>
          <img src="./assets/media/buttons/menu1.svg" alt="boton menu" />
        </span>
      </div>
      <nav class="nav">
        <ul>
          <li><a class="nav-link" href="#"> INICIO </a></li>
          <li><a class="nav-link" href="#"> EMPRESA </a></li>
          <li><a class="nav-link" href="#"> TRABAJOS </a></li>
          <li><a class="nav-link" href="#"> CONTACTO </a></li>
        </ul>
      </nav>
    </header>
    <script src="./assets/scripts/main.js"></script>
  </body>
</html>
