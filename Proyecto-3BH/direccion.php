<?php

session_start();
$connect = mysqli_connect("localhost", "root", "", "NetClip");
require 'assets/scripts/database.php';
require './assets/scripts/ticketcontent.php';

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



if (!empty($_POST['departamento']) && !empty($_POST['calle']) && !empty($_POST['apartamento']) && !empty($_POST['descripcion'])) {
    $sql = "INSERT INTO direccion (departamento, calle, apartamento) VALUES (:departamento, :calle, :apartamento)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':departamento', $_POST['departamento']);
    $stmt->bindParam(':calle', $_POST['calle']);
    $stmt->bindParam(':apartamento', $_POST['apartamento']);

    if ($stmt->execute()) {
        echo '<script language="javascript">';
        echo 'window.location.replace("/proyecto-3BH/ticket.php")';
        echo '</script>';
    } else {
        $message = '';
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8" />
    <meta http - equiv="X-UA-Compatible" content="IE=edge" />
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

<body>
    <section id="tabla-fondo-ticket"></section>
    <div class="ticket">
        <H1 class="centrar">Direccion</H1>
        <form class="form-direccion" action="" method="post">
            <input class="input-direccion" type="text" name="departamento" placeholder="Departamento">
            <input class="input-direccion" type="text" name="calle" placeholder="Calle">
            <input class="input-direccion" type="text" name="apartamento" placeholder="Apartamento">
            <input class="input-direccion" type="text" name="descripcion" placeholder="descripcion ">
            <button class="button-ticket" type="submit" name="send-direccion" value="Enviar">enviar<button>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>