<?php
$mensaje = "";

if (isset($_POST['btnAccion'])) {
    switch ($_POST['btnAccion']) {
        case 'Agregar':
            if (is_numeric($_POST['id'])) {
                $ID = $_POST['id'];
            }

            if (is_string($_POST['nombre'])) {
                $Nombre = $_POST['nombre'];
            }

            if (is_numeric($_POST['precio'])) {
                $Precio = $_POST['precio'];
            }

            if (is_numeric($_POST['cantidad'])) {
                $Cantidad = $_POST['cantidad'];
            }

            if (!isset($_SESSION['CARRITO'])) {
                $producto = array(
                    'ID' => $ID,
                    'NOMBRE' => $Nombre,
                    'PRECIO' => $Precio,
                    'CANTIDAD' => $Cantidad,
                );
                $_SESSION['CARRITO'][0] = $producto;
                $mensaje = "Producto agregado al carrito.";
            } else {
                $idProductos = array_column($_SESSION['CARRITO'], "ID");
                if (in_array($ID, $idProductos)) {
                    $mensaje = "El producto ya fue seleccionado";
                } else {
                    $NumeroProductos = count($_SESSION['CARRITO']);
                    $producto = array(
                        'ID' => $ID,
                        'NOMBRE' => $Nombre,
                        'PRECIO' => $Precio,
                        'CANTIDAD' => $Cantidad,
                    );
                    $_SESSION['CARRITO'][$NumeroProductos] = $producto;
                    $mensaje = "Producto agregado al carrito.";
                }
            }


            break;
        case 'Eliminar';
            if (is_numeric($_POST['id'])) {
                $ID = $_POST['id'];
                foreach ($_SESSION['CARRITO'] as $indice => $producto) {
                    if ($producto['ID'] == $ID) {
                        unset($_SESSION['CARRITO'][$indice]);
                        $mensaje = "Producto borrado";
                    }
                }
            } else {
                $mensaje .= "id incorrecto";
            }
            break;
        case 'EliminarT';
            unset($_SESSION['CARRITO']);
            echo "<script>alert('Todos los productos borrados');</script>";
            break;
    }
}
