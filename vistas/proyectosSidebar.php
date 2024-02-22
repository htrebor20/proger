<ul class="nav nav-pills flex-column pt-3">
  <li class="nav-item">
    <a class="nav-link <?php echo ($_GET["sesion"] == "proyectos") ? "active" : ""; ?>" href="index.php?ruta=proyectos&sesion=proyectos">Proyectos</a>
  </li>
  <li class="nav-item">
  <a class="nav-link <?php echo ($_GET["sesion"] == "tareas") ? "active" : ""; ?>" href="index.php?ruta=proyectos&sesion=tareas">Tareas</a>
  </li>
</ul>