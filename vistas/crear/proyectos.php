<div class="p-3">
    <h2>Crear Proyecto</h2>
    <form method="POST">
        <div class="mb-3 mt-3 col-md-4">
            <label for="create_proyecto_nombre" class="form-label">Nombre:</label>
            <input type="text" class="form-control" id="create_proyecto_nombre" placeholder="Nombre del proyecto"
                name="create_proyecto_nombre" required>
        </div>

        <div class="mb-3 mt-3 col-md-4">
            <label for="create_proyecto_desc" class="form-label">Descripción:</label>
            <textarea type="text" class="form-control" id="create_proyecto_desc" placeholder="Descripción del proyecto"
                name="create_proyecto_desc" required></textarea>
        </div>

        <div class="mb-3 mt-3 col-md-4">
            <label for="create_proyecto_fecha_ini" class="form-label">Fecha de inicio:</label>
            <input type="date" id="create_proyecto_fecha_ini" class="form-control" name="create_proyecto_fecha_ini"
                value="" min="2018-01-01" max="2118-12-31" required/>
        </div>

        <div class="mb-3 mt-3 col-md-4">
            <label for="create_proyecto_fecha_fin" class="form-label">Fecha de fin:</label>
            <input type="date" id="create_proyecto_fecha_fin" class="form-control" name="create_proyecto_fecha_fin"
                value="" min="2018-01-01" max="2118-12-31" required/>
        </div>
        <button type="submit" class="btn btn-primary delete-color col-md-1">Crear</button>
        <?php
        $persona = new ControladorProyectos();
        $persona->createProyecto();
        ?>
    </form>
</div>