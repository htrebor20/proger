<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/layout.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <title>Tus tareas</title>
</head>

<body>
    <div class="login-background column text-center">
        <img class="logo" src="imagenes/logoBlanco.png" alt="Logo Proger">
        <div>
            <h2 class="login-titulo">Inicio de Sesión</h2>
            <p class="login-saludo">¡Hola de Nuevo!</p>
        </div>
        <form class="formulario" method="POST">

            <input type="email" id="loginEmail" name="loginEmail" placeholder="Ingresa tu Correo">
            <input type="password" id="loginPassword" name="loginPassword" placeholder="Contraseña">
            <button class="btn btn-light btn-lg" type="submit">Iniciar Sesión</button>

            <?php

            if (!empty($_POST["loginEmail"]) && !empty($_POST["loginPassword"])) {

                echo '<script> 
                        if(window.history.replaceState){
                            window.history.replaceState(null, null, window.location.href);
                        }
                    </script>';

                $login = new Login();
                $login->login();
            }
            ?>

        </form>
        <div>
            <ul class="navbar-nav nav login-options">
                <li class="nav-item">
                    <a class="nav-link fs-4 mt-3 text-decoration-underline" href="recuperarcontrasena.html">Crear una
                        cuenta</a>
                </li>
            </ul>
        </div>
    </div>
</body>

</html>