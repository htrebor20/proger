<?php
$usuarios = ControladorPersonas::readUsuarios();
?>

<div class="container mt-3">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Usuarios</h2>
    <a class="btn delete-color col-2" href="index.php?ruta=personas&sesion=usuarios&accion=crear">Crear
      usuario</a>
  </div>

  <table class="table table-striped">
    <thead>
      <tr>
        <th>Documento</th>
        <th>Nombre</th>
        <th>Correo</th>
        <th>Tipo</th>
        <th>Ciudad</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>

      <?php foreach ($usuarios as $key => $value): ?>
        <tr>
          <td>
            <?php echo $value["documento"]; ?>
          </td>
          <td>
            <?php echo $value["nombre"]; ?>
          </td>
          <td>
            <?php echo $value["correo"]; ?>
          </td>
          <td>
            <?php echo $value["tipo_id"]; ?>
          </td>
          <td>
            <?php echo $value["ciudad"]; ?>
          </td>
          <td>
            <div class="btn-group">
              <form method="POST">
                <a class="btn  edit-color"
                  href="index.php?ruta=personas&sesion=usuarios&accion=actualizar&id=<?php echo $value['id']; ?>"><i
                    class="fa-solid fa-pencil"></i></a>

                <input type="hidden" value="<?php echo $value["id"]; ?>" name="eliminar_user">
                <button class="btn delete-color"><i class="fa-solid fa-trash"></i></button>
                <?php
                $eliminar = new ControladorPersonas();
                $eliminar->deleteUsuarios()
                  ?>
              </form>
            </div>
          </td>
        </tr>
      <?php endforeach ?>


    </tbody>
  </table>
</div>