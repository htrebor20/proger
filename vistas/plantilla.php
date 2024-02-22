<?php
if (!isset($_GET["ruta"])) {
    header("Location: index.php?ruta=proyectos&sesion=proyectos");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/e47d01163a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/layout.css">
    <title>Tus tareas</title>
</head>

<body>
    <!-- header -->
    <nav class="navbar navbar-expand-sm color-custom navbar-dark">
        <div class="container-fluid">

            <img src="imagenes/logoBlanco.png" alt="Avatar Logo" style="width:140px;" class="navbar-brand">

            <ul class="navbar-nav nav">
                <li class="nav-item">
                    <a class="nav-link <?php echo ($_GET["ruta"] == "proyectos") ? "active" : ""; ?>"
                        href="index.php?ruta=proyectos&sesion=proyectos">Proyectos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($_GET["ruta"] == "personas") ? "active" : ""; ?>"
                        href="index.php?ruta=personas&sesion=usuarios">Personas</a>
                </li>
            </ul>
            <div class="btn-group">
                <button type="button" class="btn btn-primary color-custom dropdown-toggle" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <img src="imagenes/avatar.png" width="40" height="40" class="rounded-circle me-2">
                    Usuario
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="index.php?ruta=salir">Cerrar sesión</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <!-- Sidebar -->
        <div class="row" style="height:100%;">
            <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-light col-md-3 col-lg-2 sidebar"
                style="height:100vh;">
                <?php
                if (isset($_GET["ruta"])) {
                    if ($_GET["ruta"] == "proyectos" || $_GET["ruta"] == "personas") {
                        include "$_GET[ruta]Sidebar" . ".php";
                    }
                } else {
                    include "proyectos.php";
                }
                ?>
            </div>

            <!-- Contenido principal -->
            <div class="col-md-9 col-lg-10 pt-3">
                <?php
                $nombreArchivo = "";
                if (isset($_GET["ruta"])) {
                    if ($_GET["ruta"] == "proyectos"  || $_GET["ruta"] == "personas" || $_GET["ruta"] == "salir") {
                        $nombreArchivo = "$_GET[ruta]" . ".php";
                    } else {
                        return include "404.php";
                    }
                    if (isset($_GET["sesion"])) {
                        if ($_GET["sesion"] == "usuarios" || $_GET["sesion"] == "proyectos" || $_GET["sesion"] == "tareas") {
                            $nombreArchivo = "$_GET[sesion]" . ".php";
                        }
                    }
                    if (isset($_GET["accion"])) {
                        if ($_GET["accion"] == "crear" || $_GET["accion"] == "actualizar") {
                            $nombreArchivo = "$_GET[accion]/" . $nombreArchivo;
                        }
                    }
                    include $nombreArchivo;
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>