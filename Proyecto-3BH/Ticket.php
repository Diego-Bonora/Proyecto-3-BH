<?php

session_start();
$connect = mysqli_connect("localhost", "root", "", "NetClip");
require 'assets/scripts/database.php';
require './assets/scripts/ticketcontent.php';
require './assets/scripts/carritocontent.php';


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
$recordss = $conn->prepare('SELECT departamento, Calle, apartamento FROM direccion WHERE ID_direccion = 1');
$recordss->execute();
$resultss = $recordss->fetch(PDO::FETCH_ASSOC);

if (count($resultss) > 0) {
    $direccion = $resultss;
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
        <div class="left-ticket">
            <p>sur</p>
            <p>enrique sanz</p>
            <p>calle artigas</p>
            <p>atlantida canelones</p>
            <p>tel: 099854456</p>
            <table class="table-ticket-left">
                <tbody>
                    <tr>
                        <th>consumidor final</th>
                    </tr>
                    <tr>
                        <td>
                            <p><?php echo $user['Nombre'] ?></p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="right-ticket">
            <p>Rut:110265746974</p>
            <p>E-Ticket de credito</p>
            <p>SerieA N°5001</p>
            <table class="table-ticket-right">
                <tbody>
                    <tr>
                        <th width="1px"></th>
                        <th width="20%">Fecha</th>
                        <th width="1px"></th>
                    </tr>
                    <tr>
                        <td>25</td>
                        <td>10</td>
                        <td>2021</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="flex-center">
            <p>Nombre :</p>
            <p> <?php echo $user['Nombre'], $user['Apellido'] ?></p>
        </div>
        <div class="flex-center">
            <?php $ticket = $_SESSION['TICKET']; ?>
            <p>Direccion :</p>
            <p> <?php echo $direccion['departamento'] ?><?php echo $direccion['Calle'] ?><?php echo $direccion['apartamento'] ?></p>
        </div>

        <table class="table table-light table-border table-ticket">
            <tbody>
                <tr>
                    <th width="20%">Cantidad</th>
                    <th width="40%">producto</th>
                    <th width="20%">precio unitario</th>
                    <th width="20%">precio total</th>
                </tr>
                <?php
                $subtotal = 0;
                $iva = 0;
                $total = 0;
                ?>
                <?php foreach ($_SESSION['CARRITO'] as $indice => $producto) { ?>
                    <tr>
                        <td width="20%"><?php echo $producto['CANTIDAD'] ?></td>
                        <td width="40%"><?php echo $producto['NOMBRE'] ?></td>
                        <td width="20%">$<?php echo $producto['PRECIO'] ?></td>
                        <td width="20%">$<?php echo number_format($producto['PRECIO'] * $producto['CANTIDAD'], 2)  ?></td>
                    </tr>
                    <?php
                    $subtotal = $subtotal + ($producto['PRECIO'] * $producto['CANTIDAD']);
                    $iva = $subtotal * 0.22;
                    $total = $subtotal + $iva;
                    ?>
                <?php } ?>
            </tbody>
        </table>
        <div class="bottom-left">
            <p>I.V.A al dia</p>
            <p>C.A.E: 8737</p>
            <p>E-Ticket de credito</p>
            <p>A 5000 a 6000</p>
            <p>Vencimiento 4/10/2024</p>
        </div>
        <div class="extencion-tabla">
            <div class="flex">
                <p>Subtotal</p>
                <h3>$<?php echo number_format($subtotal, 2); ?></h3>
            </div>
            <div class="flex">
                <p>I.V.A</p>
                <h3>$<?php echo number_format($iva, 2); ?></h3>
            </div>
            <div class="flex">
                <P>Total</P>
                <h3>$<?php echo number_format($total, 2); ?></h3>
            </div>
        </div>
        <?php
        if (!empty($_POST['cerrar'])) {
            unset($_SESSION['CARRITO']);
            unset($_SESSION['TICKET']);
            echo '<script language="javascript">';
            echo 'window.location.replace("/proyecto-3BH/carrito.php")';
            echo '</script>';
            echo '<script language="javascript">';
            echo 'alert("compra exitosa")';
            echo '</script>';
        }
        ?>
        <div class="close-ticket">
            <form action="" method="post">
                <input type="checkbox" name="cerrar" require />
                <input class="button-ticket" type="submit" value="cerrar">
            </form>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>