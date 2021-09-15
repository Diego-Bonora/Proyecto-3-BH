<!DOCTYPE html>
<html lang="en">

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
</head>

<body>
    <header class="header">
        <div class="title-container">
            <h1 class="title">SUIZO</h1>

            <div class="nav1">
                <div class="div-search">
                    <div id="hover-cont">
                        <form action="catalogo.php" method="POST" class="form-imput">
                            <input type="text" value="" id="busca-input" class="busca-noshow">
                            <input type="image" src="./assets/media/buttons/lupa.png" class="submit-img" />
                        </form>
                    </div>
                </div>
                <div>
                    <button type="button" class="nav-carrito">
                        <img src="./assets/media/buttons/carrito.png" />
                    </button>
                </div>
                <?php if (!empty($user)) : ?>
                    <div class="dropdown">
                        <button class="dropdown_nav" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <?= $user['Nombre'] ?> <?= $user['Apellido'] ?>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li class="item"><a class="dropdown-i" href="assets/scripts/logout.php">Cerrar Seción</a></li>
                            <li class="item"><a class="dropdown-i" href="#">Suscripcion</a></li>
                        </ul>
                    </div>
                <?php else : ?>
                    <a class="button-a" data-bs-toggle="modal" href="#login_modal" role="button">Iniciar Sesión</a>

                <?php endif; ?>
                <div class="dropdown">
                    <button class="nav_menu" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="./assets/media/buttons/menu1.svg" alt="boton menu" />
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                        <li class="item"><a class="dropdown-i" href="./index.php">INICIO</a></li>
                        <li class="item"><a class="dropdown-i" href="#">EMPRESA</a></li>
                        <li class="item"><a class="dropdown-i" href="./catalogo.php">CATALOGO</a></li>
                        <li class="item"><a class="dropdown-i" href="#">CONTACTO</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <div class="modal fade" id="login_modal" aria-hidden="true" aria-labelledby="exampleModalLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php

                    $message = '';

                    if (!empty($_POST['EmailLogin']) && !empty($_POST['Password-Login'])) {
                        $records = $conn->prepare('SELECT ID_usuarios, Email, Password FROM usuarios WHERE Email=:EmailLogin');
                        $records->bindParam(':EmailLogin', $_POST['EmailLogin']);
                        $records->execute();
                        $results = $records->fetch(PDO::FETCH_ASSOC);

                        if ($results > 0 && password_verify($_POST['Password-Login'], $results['Password'])) {
                            $_SESSION['user_id'] = $results['ID_usuarios'];
                    ?> <script>
                                window.location.replace(index.php)
                            </script> <?php

                                    } else {
                                        $message = 'E-mail o Password incorrecto';
                                    }
                                }
                                        ?>
                    <form class="form" action="index.php" method="post" id="prueba">
                        <div>
                            <h3 class="sub-title">Iniciar sesión</h3>
                            <!--usar la clase del h3 -->
                            <section id="login">
                                <div class="field">
                                    <label for="nombre">E-mail</label>
                                    <input type="Email" class="form-input" id="form-input" placeholder="E-mail" name="EmailLogin" />
                                </div>
                                <div class="field">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-input" id="form-input" placeholder="Password" name="Password-Login" />
                                </div>
                                <input type="submit"></input>
                                <?php if (!empty($message)) : ?>
                                    <?= $message ?>
                                <?php endif; ?>
                            </section>
                        </div>
                        <div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="register-button" data-bs-target="#register_modal" data-bs-toggle="modal" data-bs-dismiss="modal">registrate</button>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="modal fade" id="register_modal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    </h5>
                </div>
                <div class="modal-body">
                    <?php

                    $message = '';

                    if (!empty($_POST['Nombre']) && !empty($_POST['Apellido']) && !empty($_POST['Email']) && !empty($_POST['Password'])) {
                        $sql = "INSERT INTO usuarios (Nombre, Apellido, Email, Password) VALUES (:Nombre, :Apellido, :Email, :Password)";
                        $stmt = $conn->prepare($sql);
                        $stmt->bindParam(':Nombre', $_POST['Nombre']);
                        $stmt->bindParam(':Apellido', $_POST['Apellido']);
                        $stmt->bindParam(':Email', $_POST['Email']);
                        $Password = password_hash($_POST['Password'], PASSWORD_BCRYPT);
                        $stmt->bindParam(':Password', $Password);

                        if ($stmt->execute()) {
                        } else {
                            $message = '';
                        }
                    }
                    ?>
                    <form class="form" action="index.php" method="post">
                        <div>
                            <?php if (!empty($message)) : ?>
                                <p><?= $message ?> </p>
                            <?php endif; ?>

                            <h3 class="sub-title">Formulario Registro</h3>

                            <section id="login">
                                <div class="field">
                                    <label for="Nombre">Ingrese su Nombre</label>
                                    <input type="text" class="form-input" id="form-input" placeholder="Nombre" name="Nombre" />
                                </div>
                                <div class="field">
                                    <label for="Apellidos">Ingrese su apellido</label>
                                    <input type="text" class="form-input" id="form-input" placeholder="Apellido" name="Apellido" />
                                </div>
                                <div class="field">
                                    <label for="E-mail">Ingrese su E-mail</label>
                                    <input type="email" class="form-input" id="form-input" placeholder="E-mail" name="Email" />
                                </div>
                                <div class="field">
                                    <label for="Password">Ingrese su Contraseña</label>
                                    <input type="Password" class="form-input" id="form-input" placeholder="Password" name="Password" />
                                </div>
                                <p>
                                    <input type="checkbox" name="condiciones" checked="checked" />
                                    Estoy de acuerdo con <a href="#">Términos y Condiciones</a>
                                </p>
                                <input type="submit"></input>
                            </section>
                        </div>
                    </form>
                </div>
                <div class="modal-footer"></div>
                <div></div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>