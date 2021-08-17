<?php

  session_start();
  $connect = mysqli_connect("localhost", "root", "", "NetClip");
  require 'assets/scripts/database.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT ID_usuarios, Email, Password, Nombre, Apellido FROM usuarios WHERE ID_usuarios = :ID_usuarios');
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/style/style.css?v=<?php echo time(); ?>">
    <title>Suizo</title>

  </head>
  <body>
    <header class="header">
      <div class="title-container">
        <h1 class="title">SUIZO</h1>
         <div class="search-box">
        <input type="text" class="input-search" placeholder="Buscar...">
      </div>
        <div class="nav1">
          <?php if(!empty($user)): ?>
            <div class="dropdown">
              <button class="dropdown_nav" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                <?= $user['Nombre'] ?> <?= $user['Apellido'] ?>
             </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li class="item"><a class="dropdown-i" href="assets/scripts/logout.php">Cerrar Seción</a></li>
                <li class="item"><a class="dropdown-i" href="#">Suscripcion</a></li>      
              </ul>
            </div>
          <?php else: ?>
          <a class="button-a" href="./login.php">Iniciar sesión</a>
          <?php endif; ?>
          <div class="dropdown">
              <button class="nav_menu" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="./assets/media/buttons/menu1.svg" alt="boton menu" />
             </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li class="item"><a class="dropdown-i" href="./index.php">INICIO</a></li>
                <li class="item"><a class="dropdown-i" href="#">EMPRESA</a></li>   
                <li class="item"><a class="dropdown-i" href="./catalogo.php">CATALOGO</a></li>
                <li class="item"><a class="dropdown-i" href="#">CONTACTO</a></li>    
              </ul>
          </div>
        </div>
      </div>
    </header>
    
    <!-- <script src="./assets/scripts/main.js"></script> -->
    <!-- <div class="container">  -->
			<?php
				$query = "SELECT * FROM catalogo ORDER BY ID_productos ASC";
				$result = mysqli_query($connect, $query);
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_array($result))
					{
				?>
			<div class="col-sm-3">
      
				<form method="post" action="index.php?action=add&id=<?php echo $row["ID_productos"]; ?>">
					<div class="div-catalogo">
						<img src="assets/media/images/<?php echo $row["Img_link"]; ?>"  class="img-catalogo" ><br>

            <h4 class="name"><?php echo $row["Nombre"]; ?></h4>

						<h4 class="text-danger"><?php echo $row["Precio"]; ?></h4>

				    <input type="text" name="quantity" value="1" class="form-control" />

						<input type="hidden" name="hidden_name" value="<?php echo $row["Nombre"]; ?>" />

						<input type="hidden" name="hidden_price" value="<?php echo $row["Precio"]; ?>" />

						<input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />

					</div>
				</form>
			</div>
      <?php
					}
				}
			?>
     </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
