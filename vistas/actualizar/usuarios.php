<?php
if (isset($_GET["id"])) {
    $column = "id";
    $valor = $_GET["id"];
    $usuario = ControladorPersonas::readUsuariosPorCampo($column, $valor);
}
?>

<div class="p-3">
    <h2>Editar usuario</h2>
    <form method="POST">
        <div class="mb-3 mt-3 col-md-4">
            <label for="id" class="form-label">ID:</label>
            <input type="text" class="form-control" id="update_user_id" placeholder="Escriba su id"
                name="update_user_id" value="<?php echo $usuario["id"] ?>" readonly>
        </div>
        <div class="mb-3 mt-3 col-md-4">
            <label for="documento" class="form-label">Documento:</label>
            <input type="text" class="form-control" id="update_user_documento" placeholder="Escriba su documento"
                name="update_user_documento" value="<?php echo $usuario["documento"] ?>">
        </div>
        <div class="mb-3 mt-3 col-md-4">
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" class="form-control" id="update_user_nombre" placeholder="Escriba su nombre"
                name="update_user_nombre" value="<?php echo $usuario["nombre"] ?>">
        </div>

        <div class="mb-3 mt-3 col-md-4">
            <label for="correo" class="form-label">Correo:</label>
            <input type="text" class="form-control" id="update_user_correo" placeholder="Escriba su correo"
                name="update_user_correo" value="<?php echo $usuario["correo"] ?>">
        </div>

        <div class="mb-3 mt-3 col-md-4">
            <label for="telefono" class="form-label">Telefono:</label>
            <input type="text" class="form-control" id="update_user_telefono" placeholder="Escriba su telefono"
                name="update_user_telefono" value="<?php echo $usuario["telefono"] ?>">
        </div>

        <div class="mb-3 mt-3 col-md-4">
            <label for="ciudad" class="form-label">Ciudad:</label>
            <input type="text" class="form-control" id="update_user_ciudad" placeholder="Escriba su ciudad"
                name="update_user_ciudad" value="<?php echo $usuario["ciudad"] ?>">
        </div>

        <div class="mb-3 mt-3 col-md-4">
            <label for="direccion" class="form-label">Dirección:</label>
            <input type="text" class="form-control" id="update_user_direccion" placeholder="Escriba su direccion"
                name="update_user_direccion" value="<?php echo $usuario["direccion"] ?>">
        </div>
        <button type="submit" class="btn btn-primary delete-color col-md-1">Actualizar</button>
        <?php
        $persona = new ControladorPersonas();
        $persona->updateUsuarios();
        ?>
    </form>
</div>