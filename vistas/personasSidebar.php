<ul class="nav nav-pills flex-column pt-3">
  <li class="nav-item">
    <a class="nav-link <?php echo ($_GET["sesion"] == "usuarios") ? "active" : ""; ?>" href="index.php?ruta=personas&sesion=usuarios">Usuarios</a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?php echo ($_GET["sesion"] == "clientes") ? "active" : ""; ?>" href="index.php?ruta=personas&sesion=clientes">Clientes</a>
  </li>
</ul>