<?php
$proyectos = ControladorProyectos::readTareas();
?>

<div class="container mt-3">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Tareas</h2>
    <a class="btn delete-color col-2" href="index.php?ruta=proyectos&sesion=tareas&accion=crear">Crear
      tarea</a>
  </div>

  <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Estado</th>
        <th>Fecha de inicio</th>
        <th>Fecha de fin</th>
        <th>Proyecto</th>
        <th>Asignado a </th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>

      <?php foreach ($proyectos as $key => $value): ?>
        <tr>
          <td>
            <?php echo $value["id"]; ?>
          </td>
          <td>
            <?php echo $value["nombre"]; ?>
          </td>
          <td class="truncate-tabla-texto" >
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
            <?php echo $value["nombre_proyecto"]; ?>
          </td>
          <td>
            <?php echo $value["nombre_usuario"]; ?>
          </td>
          <td>
            <div class="btn-group">
              <form method="POST">
                <a class="btn  edit-color"
                  href="index.php?ruta=proyectos&sesion=tareas&accion=actualizar&id=<?php echo $value['id']; ?>"><i
                    class="fa-solid fa-pencil"></i></a>

                <input type="hidden" value="<?php echo $value["id"]; ?>" name="eliminar_proyecto">
                <button class="btn delete-color"><i class="fa-solid fa-trash"></i></button>
                <?php
                $eliminar = new ControladorProyectos();
                $eliminar->deleteTareas("index.php?ruta=proyectos&sesion=tareas")
                  ?>
              </form>
            </div>
          </td>
        </tr>
      <?php endforeach ?>


    </tbody>
  </table>
</div>