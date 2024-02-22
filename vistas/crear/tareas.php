<?php
    $proyectos = ControladorProyectos::readProyectos();
    $usuarios = ControladorPersonas::readUsuarios();
?>

<div class="p-3">
    <h2>Crear tarea</h2>
    <form method="POST" >
        <div class="mb-3 mt-3 col-md-4">
            <label for="create_tarea_nombre" class="form-label">Nombre:</label>
            <input type="text" class="form-control" id="create_tarea_nombre" placeholder="Nombre de la tarea"
                name="create_tarea_nombre" required>
           
        </div>
        <div class="mb-3 mt-3 col-md-4">
            <label for="create_tarea_desc" class="form-label">Descripción:</label>
            <textarea type="text" class="form-control" id="create_tarea_desc" placeholder="Descripción de la tarea"
                name="create_tarea_desc" required></textarea>
        </div>
        <div class="mb-3 mt-3 col-md-4">
            <label for="create_tarea_proyecto" class="form-label">Seleccione un proyecto:</label>
            <select class="form-select" id="create_tarea_proyecto" name="create_tarea_proyecto">
                <?php foreach ($proyectos as $key => $value): ?>
                    <option value="<?= $value['id'] ?>">
                        <?= $value['nombre'] ?>
                    </option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="mb-3 mt-3 col-md-4">
            <label for="create_tarea_usuario" class="form-label">Seleccione un proyecto:</label>
            <select class="form-select" id="create_tarea_usuario" name="create_tarea_usuario">
                <?php foreach ($usuarios as $key => $value): ?>
                    <option value="<?= $value['id'] ?>">
                        <?= $value['nombre'] ?>
                    </option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="mb-3 mt-3 col-md-4">
            <label for="create_tarea_estado" class="form-label">Estado:</label>
            <select class="form-select" id="create_tarea_estado" name="create_tarea_estado">
                <option value="Pendiente">Seleccione un estado</option>
                <option value="Pendiente">Pendiente</option>
                <option value="En progreso">En progreso</option>
                <option value="Completada">Completada</option>
            </select>
        </div>

        <div class="mb-3 mt-3 col-md-4">
            <label for="create_tarea_fecha_ini" class="form-label">Fecha de inicio:</label>
            <input type="date" id="create_tarea_fecha_ini" class="form-control" name="create_tarea_fecha_ini" value=""
                min="2018-01-01" max="2118-12-31" required/>
        </div>

        <div class="mb-3 mt-3 col-md-4">
            <label for="create_tarea_fecha_fin" class="form-label">Fecha de fin:</label>
            <input type="date" id="create_tarea_fecha_fin" class="form-control" name="create_tarea_fecha_fin" value=""
                min="2018-01-01" max="2118-12-31" required/>
        </div>
        <button type="submit" class="btn btn-primary delete-color col-md-1">Crear</button>
        <?php
        $persona = new ControladorProyectos();
        $persona->createTarea();
        ?>
    </form>
</div>