<?php

require 'assets/scripts/database.php';

session_start();
if (isset($_SESSION['user_id'])) {
  header('Location: /proyecto%20utu/proyecto%20utu/suizo/');
}

$message = '';

if (!empty($_POST['Email']) && !empty($_POST['Password'])){
   $records = $conn->prepare('SELECT ID_usuarios, Email, Password FROM usuarios WHERE Email=:Email');
   $records->bindParam(':Email', $_POST['Email']);
   $records->execute();
   $results = $records->fetch(PDO::FETCH_ASSOC);

   if (count($results) > 0 && password_verify($_POST['Password'], $results['Password'])){
     $_SESSION['user_id'] = $results['ID_usuarios'];
    header('Location: /proyecto%20utu/proyecto%20utu/suizo/');
   } else {
     $message = 'E-mail o Password incorrecto';
   }
}
?>

<!DOCTYPE html>
<html lang="e">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./assets/style/style.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Suizo</title>
  </head>
  <body>
    <header class="header">
      <div class="title-container">
        <h1 class="title">SUIZO</h1>
        <span class="open-nav">
          <img src="./assets/media/buttons/menu1.svg" alt="boton menu" />
        </span>
      </div>
      <nav class="nav">
        <ul>
          <li><a class="nav-link" href="./index.php"> INICIO </a></li>
          <li><a class="nav-link" href="#"> EMPRESA </a></li>
          <li><a class="nav-link" href="#"> TRABAJOS </a></li>
          <li><a class="nav-link" href="#"> CONTACTO </a></li>
        </ul>
      </nav>
    </header>
    <form class="form" action="login.php" method="post">
      <div>
        <h3 class="sub-title">Iniciar sesión</h3>
        <!--usar la clase del h3 -->
        <section id="login">
          <div class="field">
            <label for="nombre">E-mail</label>
            <input type="Email" id="form-input" placeholder="E-mail" name="Email"/>
          </div>
          <div class="field">
            <label for="password">Password</label>
            <input type="password" id="form-input" placeholder="Password" name="Password"/>
          </div>
          <input type="submit"></input>

          <?php if (!empty($message)) : ?>
            <p> <?= $message ?> </p>
          <?php endif; ?>

        <a class="button-a" href="./register.php">regístrate</a>
        </section>
      </div>
      <div>
      </div>
    </form>
    <script src="./assets/scripts/main.js"></script>
  </body>
</html>
