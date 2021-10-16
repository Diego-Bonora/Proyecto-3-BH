<?php

session_start();
require 'assets/scripts/database.php';
$connect = mysqli_connect("localhost", "root", "", "NetClip");
if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT ID_usuarios, Email, Password, Nombre, Apellido, suscripto FROM usuarios WHERE ID_usuarios = :ID_usuarios');
    $records->bindParam(':ID_usuarios', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
        $user = $results;
    }
}

?>

<?php
$records = $conn->prepare('SELECT ID_usuarios, suscripto FROM usuarios WHERE ID_usuarios = :ID_usuarios AND suscripto = "si"');
$records->bindParam(':ID_usuarios', $_SESSION['user_id']);
$records->execute();
$results = $records->fetch(PDO::FETCH_ASSOC);
if ($results != null) {
    if (count($results) > 0) {
        $verificacion = "si";
    }
} else {
    $verificacion = "no";
}
$message = '';

if (!empty($_POST['Nombre_T']) && !empty($_POST['Apellido_T']) && !empty($_POST['Numero_T']) && !empty($_POST['Vencimiento_T']) && !empty($_POST['CVV_T'])) {
    $sql = "SELECT Numero_T FROM tarjetas WHERE Numero_T = :Numero_T";
    $records = $conn->prepare($sql);
    $records->bindParam(':Numero_T', $_POST['Numero_T']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    if ($results != null) {
        if (count($results) > 0) {
            echo '<script language="javascript">';
            echo 'alert("esa tarjeta ya se registro")';
            echo '</script>';
        }
    } else {
        $sql = "INSERT INTO tarjetas (Nombre_T, Apellido_T, Numero_T, Vencimiento_T, CVV_T) VALUES (:Nombre_T, :Apellido_T, :Numero_T, :Vencimiento_T, :CVV_T)";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':Nombre_T', $_POST['Nombre_T']);
        $stmt->bindValue(':Apellido_T', $_POST['Apellido_T']);
        $stmt->bindValue(':Numero_T', $_POST['Numero_T']);
        $stmt->bindValue(':Vencimiento_T', $_POST['Vencimiento_T']);
        $stmt->bindValue(':CVV_T', $_POST['CVV_T']);

        if ($stmt->execute()) {
            $sql = "UPDATE usuarios SET suscripto = 'si' WHERE ID_usuarios = " . $_SESSION['user_id'] . "";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
        } else {
            $message = '';
        }
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
    <?php require './assets/scripts/header.php'; ?>
    <div class="modal fade" id="suscripcion" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-2">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel">Modal 1</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="suscripcion.php" method="POST" class="sub">
                        <div class="sub-1">
                            <label for="">SUSCRIPCION</label>

                            <div class="sub-2">
                                <input type="text" placeholder="NOMBRE" maxlength="15" name="Nombre_T">
                            </div>

                            <div class="sub-2">
                                <input type="text" placeholder="APELLIDO" maxlength="15" name="Apellido_T">
                            </div>

                            <div class="sub-2">
                                <input type="number" placeholder="NUMERO" min=1 name="Numero_T">
                            </div>

                            <div class="sub-2">
                                <input type="text" placeholder="MM/AA" name="Vencimiento_T">
                            </div>

                            <div class="sub-2">
                                <input type="number" placeholder="CVV" min=1 name="CVV_T">
                            </div>
                            <p>
                                <input type="checkbox" name="condiciones" checked="checked" />
                                Estoy de acuerdo con <a href="#">Términos y Condiciones</a>
                            </p>
                            <input type="submit" class="button-1" value="SUSCRIBIRCE">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
    <?php

    $records = $conn->prepare('SELECT ID_usuarios, suscripto FROM usuarios WHERE ID_usuarios = :ID_usuarios AND suscripto = "si"');
    $records->bindParam(':ID_usuarios', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    if ($results != null) {
        if (count($results) > 0) {
            $verificacion = "si";
        }
    } else {
        $verificacion = "no";
    }

    ?>
    <?php if ($verificacion != "si") : ?>
        <p class="suscribete"> Suscribete para tener acceso a los descuentos y otros bonos de la tienda </p>
        <a class="button-b" data-bs-toggle="modal" href="#suscripcion" role="button">Suscribete</a>
    <?php else : ?>
        <section id="tabla-fondo"></section>
        <div class="tabla-puntos">
            <p class="separacion">Puntos
                <?php
                $records = $conn->prepare('SELECT ID_usuarios, puntos FROM usuarios WHERE ID_usuarios = :ID_usuarios');
                $records->bindParam(':ID_usuarios', $_SESSION['user_id']);
                $records->execute();
                $results = $records->fetch(PDO::FETCH_ASSOC);
                if ($results != null) {
                    if (count($results) > 0) {
                        $puntos = $results;
                        echo $puntos['puntos'];
                    }
                } else {
                }
                ?></p>
        </div>
    <?php endif; ?>
    <?php require 'assets/scripts/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>