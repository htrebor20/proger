<?php
if (isset($_GET["id"])) {
    $column = "id";
    $valor = $_GET["id"];
    $proyectos = ControladorProyectos::readProyectos();
    $usuarios = ControladorPersonas::readUsuarios();
    $tarea = ControladorProyectos::readTareasPorCampo($column, $valor, null);
}
?>

<div class="p-3">
    <h2>Editar tarea</h2>
    <form method="POST">
        <div class="mb-3 mt-3 col-md-4">
            <label for="update_tarea_id" class="form-label">ID:</label>
            <input type="text" class="form-control" id="update_tarea_id" placeholder="ID del proyecto"
                name="update_tarea_id" value="<?php echo $tarea["id"] ?>" readonly>
        </div>
        <div class="mb-3 mt-3 col-md-4">
            <label for="update_tarea_nombre" class="form-label">Nombre:</label>
            <input type="text" class="form-control" id="update_tarea_nombre" placeholder="Nombre del proyecto"
                name="update_tarea_nombre" value="<?php echo $tarea["nombre"] ?>" required>
        </div>
        <div class="mb-3 mt-3 col-md-4">
            <label for="update_tarea_desc" class="form-label">Descripción:</label>
            <textarea type="text" class="form-control" id="update_tarea_desc" placeholder="Descripción del proyecto"
                name="update_tarea_desc" required><?php echo $tarea["descripcion"] ?></textarea>
        </div>
        <div class="mb-3 mt-3 col-md-4">
            <label for="update_tarea_proyecto" class="form-label">Seleccione un proyecto:</label>
            <select class="form-select" id="update_tarea_proyecto" name="update_tarea_proyecto">
                <?php foreach ($proyectos as $key => $value): ?>
                    <?php if ($value['id'] == $tarea["id_proyecto"]): ?>
                        <option value="<?= $value['id'] ?>" selected>
                            <?= $value['nombre'] ?>
                        </option>
                    <?php else: ?>
                        <option value="<?= $value['id'] ?>">
                            <?= $value['nombre'] ?>
                        </option>
                    <?php endif ?>
                <?php endforeach ?>
            </select>
        </div>
        <div class="mb-3 mt-3 col-md-4">
            <label for="update_tarea_usuario" class="form-label">Asignado a:</label>
            <select class="form-select" id="update_tarea_usuario" name="update_tarea_usuario">
                <?php foreach ($usuarios as $key => $value): ?>
                    <?php if ($value['id'] == $tarea["id_usuario"]): ?>
                        <option value="<?= $value['id'] ?>" selected>
                            <?= $value['nombre'] ?>
                        </option>
                    <?php else: ?>
                        <option value="<?= $value['id'] ?>">
                            <?= $value['nombre'] ?>
                        </option>
                    <?php endif ?>
                <?php endforeach ?>
            </select>
        </div>
        <div class="mb-3 mt-3 col-md-4">
            <label for="update_tarea_estado" class="form-label">Estado:</label>
            <select class="form-select" id="update_tarea_estado" name="update_tarea_estado">
                <option value="Pendiente" <?= ($tarea["estado"] == "Pendiente") ? "selected" : "" ?>>Pendiente</option>
                <option value="En progreso" <?= ($tarea["estado"] == "En progreso") ? "selected" : "" ?>>En progreso
                </option>
                <option value="Completada" <?= ($tarea["estado"] == "Completada") ? "selected" : "" ?>>Completada</option>
            </select>
        </div>
        <div class="mb-3 mt-3 col-md-4">
            <label for="update_tarea_fecha_ini" class="form-label">Fecha de inicio:</label>
            <input type="date" id="update_tarea_fecha_ini" class="form-control" name="update_tarea_fecha_ini"
                value="<?php echo $tarea["fecha_inicio"] ?>" min="2018-01-01" max="2118-12-31" required/>
        </div>

        <div class="mb-3 mt-3 col-md-4">
            <label for="update_tarea_fecha_fin" class="form-label">Fecha de fin:</label>
            <input type="date" id="update_tarea_fecha_fin" class="form-control" name="update_tarea_fecha_fin"
                value="<?php echo $tarea["fecha_fin"] ?>" min="2018-01-01" max="2118-12-31" required/>
        </div>
        <button type="submit" class="btn btn-primary delete-color col-md-2">Actualizar</button>
        <?php
        $persona = new ControladorProyectos();
        $persona->updateTareas();
        ?>
    </form>
</div>