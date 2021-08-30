<?php
require 'assets/scripts/database.php';

$message = '';

if (!empty($_POST['Nombre']) && !empty($_POST['Apellido']) && !empty($_POST['Email']) && !empty($_POST['Password'])){
$sql = "INSERT INTO usuarios (Nombre, Apellido, Email, Password) VALUES (:Nombre, :Apellido, :Email, :Password)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':Nombre',$_POST['Nombre']);
$stmt->bindParam(':Apellido',$_POST['Apellido']);
$stmt->bindParam(':Email',$_POST['Email']);
$Password = password_hash($_POST['Password'], PASSWORD_BCRYPT);
$stmt->bindParam(':Password', $Password);



if ($stmt->execute()){
  header('Location: /proyecto-3-BH/proyecto%20utu/suizo/login.php');
  } else {
    $message = '';
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
          <li><a class="nav-link" href="./catalogo.php"> CATALOGO </a></li>
          <li><a class="nav-link" href="#"> CONTACTO </a></li>
        </ul>
      </nav>
    </header>
    <form class="form" action="register.php" method="post">
      <div>

          <?php if(!empty($message)): ?>
            <p><?= $message ?> </p>
          <?php endif; ?>

        <h3 class="sub-title">Formulario Registro</h3>
        <!--usar la clase del h3 -->
        <section id="login">
          <div class="field">
            <label for="Nombre">Ingrese su Nombre</label>
            <input type="text" id="form-input" placeholder="Nombre" name="Nombre"/>
          </div>
          <div class="field">
            <label for="Apellidos">Ingrese su apellido</label>
            <input type="text" id="form-input" placeholder="Apellido" name="Apellido" />
          </div>
          <div class="field">
            <label for="E-mail">Ingrese su E-mail</label>
            <input type="email" id="form-input" placeholder="E-mail" name="Email" />
          </div>
          <div class="field">
            <label for="Password">Ingrese su Contraseña</label>
            <input type="Password" id="form-input" placeholder="Password" name="Password"/>
          </div>
          <p>
            <input type="checkbox" name="condiciones" checked="checked" />
            Estoy de acuerdo con <a href="#">Términos y Condiciones</a></p>
        <p><a href="./login.php">Ya estoy registrado</a></p>
          <input type="submit"></input>
      </div>
        </section>
      </div>
      <div></div>
    </form>
    <script src="./assets/scripts/main.js"></script>
  </body>
</html>
