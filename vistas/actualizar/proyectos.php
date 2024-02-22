<?php
if (isset($_GET["id"])) {
    $column = "id";
    $columnTarea = "id_proyecto";
    $valor = $_GET["id"];
    $proyecto = ControladorProyectos::readProyectosPorCampo($column, $valor);
    $tareas = ControladorProyectos::readTareasPorCampo($columnTarea, $valor, true);
}
?>

<div class="p-3">
    <h2>Editar proyecto</h2>
    <form method="POST">
        <div class="mb-3 mt-3 col-md-4">
            <label for="update_proyecto_id" class="form-label">ID:</label>
            <input type="text" class="form-control" id="update_proyecto_id" placeholder="ID del proyecto"
                name="update_proyecto_id" value="<?php echo $proyecto["id"] ?>" readonly>
        </div>
        <div class="mb-3 mt-3 col-md-4">
            <label for="update_proyecto_nombre" class="form-label">Nombre:</label>
            <input type="text" class="form-control" id="update_proyecto_nombre" placeholder="Nombre del proyecto"
                name="update_proyecto_nombre" value="<?php echo $proyecto["nombre"] ?>" required>
        </div>
        <div class="mb-3 mt-3 col-md-4">
            <label for="update_proyecto_desc" class="form-label">Descripción:</label>
            <textarea type="text" class="form-control" id="update_proyecto_desc" placeholder="Descripción del proyecto"
                name="update_proyecto_desc" required><?php echo $proyecto["descripcion"] ?></textarea>
        </div>

        <div class=" my-4 col-md-10">
            <h5>Tareas</h5>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Estado</th>
                        <th>Fecha de inicio</th>
                        <th>Fecha de fin</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($tareas as $key => $value): ?>
                        <tr>
                            <td>
                                <?php echo $value["id"]; ?>
                            </td>
                            <td>
                                <?php echo $value["nombre"]; ?>
                            </td>
                            <td class="truncate-tabla-texto">
                                <?php echo $value["descripcion"]; ?>
                            </td>
                            <td>
                                <?php echo $value["estado"]; ?>
                            </td>
                            <td>
                                <?php echo $value["fecha_inicio"]; ?>
                            </td>
                            <td>
                                <?php echo $value["fecha_fin"]; ?>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <form method="POST">
                                        <a class="btn edit-color"
                                            href="index.php?ruta=proyectos&sesion=tareas&accion=actualizar&id=<?php echo $value['id']; ?>"><i
                                                class="fa-solid fa-pencil"></i></a>

                                        <input type="hidden" value="<?php echo $value["id"]; ?>" name="eliminar_proyecto">
                                        <button class="btn delete-color"><i class="fa-solid fa-trash"></i></button>
                                        <?php
                                        $eliminar = new ControladorProyectos();
                                        $eliminar->deleteTareas("index.php?ruta=proyectos&sesion=proyectos&accion=actualizar&id=" . $valor . "")
                                            ?>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>

        <div class="mb-3 mt-3 col-md-4">
            <label for="update_proyecto_fecha_ini" class="form-label">Fecha de inicio:</label>
            <input type="date" id="update_proyecto_fecha_ini" class="form-control" name="update_proyecto_fecha_ini"
                value="<?php echo $proyecto["fecha_inicio"] ?>" min="2018-01-01" max="2118-12-31" required/>
        </div>

        <div class="mb-3 mt-3 col-md-4">
            <label for="update_proyecto_fecha_fin" class="form-label">Fecha de fin:</label>
            <input type="date" id="update_proyecto_fecha_fin" class="form-control" name="update_proyecto_fecha_fin"
                value="<?php echo $proyecto["fecha_fin"] ?>" min="2018-01-01" max="2118-12-31" required/>
        </div>
        <button type="submit" class="btn btn-primary delete-color col-md-2">Actualizar</button>
        <?php
        $persona = new ControladorProyectos();
        $persona->updateProyectos();
        ?>
    </form>
</div>