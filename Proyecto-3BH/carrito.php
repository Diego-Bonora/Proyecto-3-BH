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
    <?php if (!empty($_SESSION['CARRITO'])) { ?>
        <div class="alert alert-success"> <?php echo $mensaje; ?> </div>
        <table class="table table-light table-border">
            <tbody>
                <tr>
                    <th width="40%">Descripcion</th>
                    <th width="15%">Cantidad</th>
                    <th width="20%">Precio</th>
                    <th width="20%">Total</th>
                    <th width="5%">
                        <form action="" method="post">
                            <input type="hidden" name="id" id="id" value="<?php echo $producto['ID']; ?>">
                            <button class="btn btn-danger" name="btnAccion" type="submit" value="EliminarT">Eliminar todo</button>
                        </form>
                    </th>
                </tr>
                <?php $total = 0; ?>
                <?php foreach ($_SESSION['CARRITO'] as $indice => $producto) { ?>
                    <tr>
                        <td width="40%"><?php echo $producto['NOMBRE'] ?></td>
                        <td width="15%"><?php echo $producto['CANTIDAD'] ?></td>
                        <td width="20%">$<?php echo $producto['PRECIO'] ?></td>
                        <td width="20%">$<?php echo number_format($producto['PRECIO'] * $producto['CANTIDAD'], 2)  ?></td>
                        <td width="5%">
                            <form action="" method="post">
                                <input type="hidden" name="id" id="id" value="<?php echo $producto['ID']; ?>">
                                <button class="btn btn-danger" name="btnAccion" type="submit" value="Eliminar">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    <?php $total = $total + ($producto['PRECIO'] * $producto['CANTIDAD']); ?>
                <?php } ?>
                <tr>
                    <td colspan="3" align="right">total</td>
                    <td align="right">
                        <h3>$<?php echo number_format($total, 2); ?></h3>
                    </td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    <?php } else { ?>
        <div class="alert alert-success">No hay productos en el carrito</div>
    <?php } ?>
</body>



<?php require 'assets/scripts/footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>