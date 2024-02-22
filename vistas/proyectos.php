<?php
$proyectos = ControladorProyectos::readProyectos();
?>

<div class="container mt-3">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Proyectos</h2>
    <a class="btn delete-color col-2" href="index.php?ruta=proyectos&sesion=proyectos&accion=crear">Crear
      proyecto</a>
  </div>

  <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Fecha de inicio</th>
        <th>Fecha de fin</th>
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
            <?php echo $value["fecha_inicio"]; ?>
          </td>
          <td>
            <?php echo $value["fecha_fin"]; ?>
          </td>
          <td>
            <div class="btn-group">
              <form method="POST">
                <a class="btn  edit-color"
                  href="index.php?ruta=proyectos&sesion=proyectos&accion=actualizar&id=<?php echo $value['id']; ?>"><i
                    class="fa-solid fa-pencil"></i></a>

                <input type="hidden" value="<?php echo $value["id"]; ?>" name="eliminar_proyecto">
                <button class="btn delete-color"><i class="fa-solid fa-trash"></i></button>
                <?php
                $eliminar = new ControladorProyectos();
                $eliminar->deleteProyectos()
                  ?>
              </form>
            </div>
          </td>
        </tr>
      <?php endforeach ?>


    </tbody>
  </table>
</div>