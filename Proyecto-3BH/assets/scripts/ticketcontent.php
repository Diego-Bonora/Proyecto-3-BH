<?php
$mensaje = "";

if (isset($_POST['send-direccion'])) {
    switch ($_POST['send-direccion']) {
        case 'Enviar':
            if (is_string($_POST['departamento'])) {
                $DEP = $_POST['departamento'];
            }

            if (is_string($_POST['calle'])) {
                $Calle = $_POST['calle'];
            }

            if (is_string($_POST['apartamento'])) {
                $Apartamento = $_POST['apartamento'];
            }

            if (is_string($_POST['descripcion'])) {
                $Descripcion = $_POST['descripcion'];
            }

            if (!isset($_SESSION['TICKET'])) {
                $ticket = array(
                    'DEPARTAMENTO' => $DEP,
                    'CALLE' => $Calle,
                    'APARTAMENTO' => $Apartamento,
                    'DESCRIPCION' => $Descripcion,
                );
                $_SESSION['TICKET'][0] = $ticket;
            } else {
                $direccion = array_column($_SESSION['TICKET'], "APARTAMENTO");
                if (in_array($Apartamento, $direccion)) {
                    $mensaje = "El producto ya fue seleccionado";
                } else {
                    $Numeroapt = count($_SESSION['TICKET']);
                    $ticket = array(
                        'DEPARTAMENTO' => $DEP,
                        'CALLE' => $Calle,
                        'APARTAMENTO' => $Apartamento,
                        'DESCRIPCION' => $Descripcion,
                    );
                    $_SESSION['TICKET'][$Numeroapt] = $ticket;
                    $mensaje = "Producto agregado al carrito.";
                }
            }
            break;
    }
}
