<div class="p-3">
    <h2>Crear usuario</h2>
    <form method="POST">
        <div class="mb-3 mt-3 col-md-4">
            <label for="documento" class="form-label">Documento:</label>
            <input type="text" class="form-control" id="create_user_documento" placeholder="Escriba su documento"
                name="create_user_documento" required>
        </div>
        <div class="mb-3 mt-3 col-md-4">
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" class="form-control" id="create_user_nombre" placeholder="Escriba su nombre"
                name="create_user_nombre" required>
        </div>

        <div class="mb-3 mt-3 col-md-4">
            <label for="correo" class="form-label">Correo:</label>
            <input type="text" class="form-control" id="create_user_correo" placeholder="Escriba su correo"
                name="create_user_correo" required>
        </div>

        <div class="mb-3 mt-3 col-md-4">
            <label for="contrasena" class="form-label">Contraseña:</label>
            <input type="text" class="form-control" id="create_user_contrasena" placeholder="Escriba su contraseña"
                name="create_user_contrasena" required>
        </div>

        <div class="mb-3 mt-3 col-md-4">
            <label for="telefono" class="form-label">Telefono:</label>
            <input type="text" class="form-control" id="create_user_telefono" placeholder="Escriba su telefono"
                name="create_user_telefono" required>
        </div>

        <div class="mb-3 mt-3 col-md-4">
            <label for="ciudad" class="form-label">Ciudad:</label>
            <input type="text" class="form-control" id="create_user_ciudad" placeholder="Escriba su ciudad"
                name="create_user_ciudad" required>
        </div>

        <div class="mb-3 mt-3 col-md-4">
            <label for="direccion" class="form-label">Dirección:</label>
            <input type="text" class="form-control" id="create_user_direccion" placeholder="Escriba su direccion"
                name="create_user_direccion" required>
        </div>
        <button type="submit" class="btn btn-primary delete-color col-md-1">Crear</button>
        <?php
        $persona = new ControladorPersonas();
        $persona->createUsuarios();
        ?>
    </form>
</div>