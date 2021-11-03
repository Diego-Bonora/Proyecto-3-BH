<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "NetClip");
require 'assets/scripts/database.php';
require 'assets/scripts/carritocontent.php';

$message = "";

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


if (!empty($_POST['Nombre_T']) && !empty($_POST['Apellido_T']) && !empty($_POST['Numero_T']) && !empty($_POST['Vencimiento_T']) && !empty($_POST['CVV_T']) && !empty($_POST['carrito-check']) && !empty($_POST['condiciones'])) {
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
            if ($_POST['carrito-check'] == "clickgo") {
                echo '<script language="javascript">';
                echo 'window.location.replace("/proyecto-3BH/ticket.php")';
                echo '</script>';
            } else {
                echo '<script language="javascript">';
                echo 'window.location.replace("/proyecto-3BH/direccion.php")';
                echo '</script>';
            }
        } else {
            $message = '';
        }
    }
} else {
    $mensaje = 'se requiere llenar todos los campos';
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
        <div class="carrito-table">
            <table class="table table-light table-border">
                <tbody>
                    <tr>
                        <th width="40%">Producto</th>
                        <th width="15%">Cantidad</th>
                        <th width="20%">Precio</th>
                        <th width="20%">Total</th>
                        <td width="5%" align="center">
                            <form action="" method="post">
                                <input type="hidden" name="id" id="id" value="<?php echo $producto['ID']; ?>">
                                <button class="button-compra" name="btnAccion" type="submit" value="EliminarT">Eliminar todo</button>
                            </form>
                        </td>
                    </tr>
                    <?php $total = 0; ?>
                    <?php foreach ($_SESSION['CARRITO'] as $indice => $producto) { ?>
                        <tr>
                            <td width="40%"><?php echo $producto['NOMBRE'] ?></td>
                            <td width="15%"><?php echo $producto['CANTIDAD'] ?></td>
                            <td width="20%">$<?php echo $producto['PRECIO'] ?></td>
                            <td width="20%">$<?php echo number_format($producto['PRECIO'] * $producto['CANTIDAD'], 2)  ?></td>
                            <td width="5%" align="center">
                                <form action="" method="post">
                                    <input type="hidden" name="id" id="id" value="<?php echo $producto['ID']; ?>">
                                    <button class="button-compra" name="btnAccion" type="submit" value="Eliminar">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        <?php $total = $total + ($producto['PRECIO'] * $producto['CANTIDAD']); ?>
                    <?php } ?>
                    <tr>
                        <th colspan="3"></th>
                        <td>
                            <h3>$<?php echo number_format($total, 2); ?></h3>
                        </td>
                        <td>
                            <?php if (!empty($user)) :  ?>
                                <a class="button-compra" data-bs-toggle="modal" href="#comprar" role="button">Comprar</a>
                            <?php else : ?>
                                <a class="button-compra" data-bs-toggle="modal" href="#login_modal" role="button">Iniciar Sesión</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    <?php } else { ?>
        <div class="alert alert-success">No hay productos en el carrito</div>
    <?php } ?>




    <div class="modal fade" id="comprar" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-2">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="carrito.php" method="POST" class="sub">
                        <div class="sub-1">
                            <label for="">Tarjeta de Credito</label>

                            <div class="sub-2">
                                <input type="text" require placeholder="NOMBRE" maxlength="15" name="Nombre_T">
                            </div>

                            <div class="sub-2">
                                <input type="text" require placeholder="APELLIDO" maxlength="15" name="Apellido_T">
                            </div>

                            <div class="sub-2">
                                <input type="number" require placeholder="NUMERO" min=1 name="Numero_T">
                            </div>

                            <div class="sub-2">
                                <input type="text" require placeholder="MM/AA" name="Vencimiento_T">
                            </div>

                            <div class="sub-2">
                                <input type="number" require placeholder="CVV" min=1 name="CVV_T">
                            </div>
                            <div class="carrito-envio">
                                <input require type="radio" id="clickgo" name="carrito-check" value="clickgo">
                                <label for="clickgo">ClickGo</label>
                            </div>
                            <div class="carrito-envio">
                                <input require type="radio" id="envio" name="carrito-check" value="envio">
                                <label for="envio">Envio</label>
                            </div>

                            <p>
                                <input type="checkbox" name="condiciones" require />
                                Estoy de acuerdo con <a href="Terminos.php">Términos y Condiciones</a>
                            </p>
                            <input type="submit" class="button-compra" value="Comprar">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>

</body>



<?php require 'assets/scripts/footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>