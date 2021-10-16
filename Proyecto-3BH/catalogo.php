<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "NetClip");
require 'assets/scripts/database.php';
require 'assets/scripts/carritocontent.php';

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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/style/style.css?v=<?php echo time(); ?>">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://kit.fontawesome.com/68768a5d73.js" crossorigin="anonymous"></script>
  <title>Suizo</title>

  <script>
    $(document).ready(function() {

      $("#hover-cont").mouseover(function() {
        $("#busca-input").removeClass("busca-noshow").addClass("busca-show");
      });

      $("#hover-cont").mouseout(function() {
        $("#busca-input").removeClass("busca-show").addClass("busca-noshow");
      });

      $("#hover-cont").focusin(function() {
        $("#busca-input").removeClass("busca-noshow").addClass("busca-show");
      });

      $("#hover-cont").focusout(function() {
        $("#busca-input").removeClass("busca-show").addClass("busca-noshow");
      });

    });
  </script>


</head>
<?php require './assets/scripts/header.php'; ?>


<body>
  <section id="tabla-fondo"></section>

  <?php
  if (!empty($mensaje)) {
  ?>
    <div class="alert-top">
      <p><?php echo $mensaje; ?></p>
      <a class="button-alert" href="carrito.php">ver carrito</a>
    </div>
    <?php
  }



  if (isset($_GET["page"])) {
    $page = $_GET["page"];
  } else {
    $page = 1;
  }

  $num_per_page = 12;
  $start_from = ($page - 1) * 12;

  if (isset($_POST['search'])) {
    $q = $_POST['search'];
  } else {
    $q = "";
  }

  if ($q == "") {
    $query = "SELECT * FROM catalogo limit $start_from,$num_per_page";
  }
  $query = "SELECT * FROM catalogo WHERE Nombre LIKE '%" . $q . "%' limit $start_from,$num_per_page";



  $result = mysqli_query($connect, $query);
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
    ?>
      <div class="col-sm-3">
        <div class="div-catalogo">
          <img src="assets/media/images/<?php echo $row["Img_link"]; ?>" class="img-catalogo"><br>
          <div class="centrar">
            <h4 class="name"><?php echo $row["Nombre"]; ?></h4>

            <h4 class="text-danger">$<?php echo $row["Precio"]; ?></h4>
          </div>

          <div class="submit-catalogo">
            <form action="" method="post">
              <input type="number" min=1 value="1" class="cantidad" />

              <input type="hidden" name="id" id="id" value="<?php echo $row["ID_productos"]; ?>">
              <input type="hidden" name="nombre" id="nombre" value="<?php echo $row["Nombre"]; ?>">
              <input type="hidden" name="precio" id="precio" value="<?php echo $row["Precio"]; ?>">
              <input type="hidden" name="cantidad" id="cant" value="<?php echo 1; ?>">

              <button class="button-catalogo" name="btnAccion" value="Agregar" type="submit">
                Agregar al carrito
              </button>
            </form>
          </div>
        </div>
      </div>
  <?php
    }
  }

  $sql = "SELECT * FROM catalogo ";
  $rs_result = mysqli_query($connect, $sql);
  $total_records = mysqli_num_rows($rs_result);
  $total_pages = ceil($total_records / $num_per_page);

  ?>
  <?php


  echo "<div class='paginacion'>";
  for ($i = 1; $i <= $total_pages; $i++) {
    echo "<div class='paginacion-num'><a href='catalogo.php?page=" . $i . "'>" . $i . "</a></div>";
  }
  echo "</div>";

  require 'assets/scripts/footer.php';
  ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>