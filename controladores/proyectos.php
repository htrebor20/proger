<?php

class ControladorProyectos
{
    static public function readProyectos()
    {
        $tabla = "proyectos";
        $respuesta = ModeloProyectos::readProyectos($tabla);
        return $respuesta;
    }

    static public function readProyectosPorCampo($campo, $valor)
    {
        $tabla = "proyectos";
        $respuesta = ModeloProyectos::readProyectosPorCampo($tabla, $campo, $valor);
        return $respuesta;
    }

    static public function deleteProyectos()
    {
        if (!empty($_POST["eliminar_proyecto"])) {
            $tabla = "proyectos";
            $valor = $_POST["eliminar_proyecto"];
            $respuesta = ModeloProyectos::deleteProyectos($tabla, $valor);

            if ($respuesta == "ok") {
                echo '<script> 
                    if(window.history.replaceState){
                        window.history.replaceState(null, null, window.location.href);
                    }
                    window.location = "index.php?ruta=proyectos&sesion=proyectos"
                </script>';
            }
        }
    }

    static public function updateProyectos()
    {
        if (
            !empty($_POST["update_proyecto_id"]) &&
            !empty($_POST["update_proyecto_nombre"]) &&
            !empty($_POST["update_proyecto_desc"]) &&
            !empty($_POST["update_proyecto_fecha_ini"]) &&
            !empty($_POST["update_proyecto_fecha_fin"])

        ) {
            $tabla = "proyectos";
            $datos = array(
                "id" => $_POST["update_proyecto_id"],
                "nombre" => $_POST["update_proyecto_nombre"],
                "descripcion" => $_POST["update_proyecto_desc"],
                "fecha_inicio" => $_POST["update_proyecto_fecha_ini"],
                "fecha_fin" => $_POST["update_proyecto_fecha_fin"],
            );

            $respuesta = ModeloProyectos::updateProyectos($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script> 
                    if(window.history.replaceState){
                        window.history.replaceState(null, null, window.location.href);
                    }
                </script>';
                echo '<div class="alert alert-success mt-2 col-md-4">Proyecto actualizado correctamente. Refresca la página</div>';
            }
            return $respuesta;
        }
    }

    static public function createProyecto()
    {
        if (
            !empty($_POST["create_proyecto_nombre"]) &&
            !empty($_POST["create_proyecto_desc"]) &&
            !empty($_POST["create_proyecto_fecha_ini"]) &&
            !empty($_POST["create_proyecto_fecha_fin"])
        ) {
            $tabla = "proyectos";
            $datos = array(
                "nombre" => $_POST["create_proyecto_nombre"],
                "descripcion" => $_POST["create_proyecto_desc"],
                "fecha_inicio" => $_POST["create_proyecto_fecha_ini"],
                "fecha_fin" => $_POST["create_proyecto_fecha_fin"]
            );
            $respuesta = ModeloProyectos::createProyectos($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script> 
                    if(window.history.replaceState){
                        window.history.replaceState(null, null, window.location.href);
                    }
                </script>';
                echo '<div class="alert alert-success mt-2 col-md-4">Proyecto creado correctamente.</div>';
            }
            return $respuesta;
        }
    }

    // -------------------- Tareas -------------------- //

    static public function readTareas()
    {
        $tabla = "tareas";
        $respuesta = ModeloProyectos::readTareas($tabla);
        return $respuesta;
    }

    static public function readTareasPorCampo($campo, $valor, $todosLosRegistros)
    {
        $tabla = "tareas";
        $respuesta = ModeloProyectos::readTareasPorCampo($tabla, $campo, $valor, $todosLosRegistros);
        return $respuesta;
    }

    static public function deleteTareas($url)
    {
        if (!empty($_POST["eliminar_proyecto"])) {
            $tabla = "tareas";
            $valor = $_POST["eliminar_proyecto"];
            $respuesta = ModeloProyectos::deleteProyectos($tabla, $valor);
            if ($respuesta == "ok") {
                echo '<script> 
                    if(window.history.replaceState){
                        window.history.replaceState(null, null, window.location.href);
                    }
                    window.location = "' . $url . '";
                </script>';
            }
        }
    }

    static public function updateTareas()
    {
        if (
            !empty($_POST["update_tarea_id"]) &&
            !empty($_POST["update_tarea_nombre"]) &&
            !empty($_POST["update_tarea_desc"]) &&
            !empty($_POST["update_tarea_proyecto"]) &&
            !empty($_POST["update_tarea_usuario"]) &&
            !empty($_POST["update_tarea_estado"]) &&
            !empty($_POST["update_tarea_fecha_ini"]) &&
            !empty($_POST["update_tarea_fecha_fin"])

        ) {
            $tabla = "tareas";
            $datos = array(
                "id" => $_POST["update_tarea_id"],
                "nombre" => $_POST["update_tarea_nombre"],
                "descripcion" => $_POST["update_tarea_desc"],
                "id_proyecto" => $_POST["update_tarea_proyecto"],
                "id_usuario" => $_POST["update_tarea_usuario"],
                "estado" => $_POST["update_tarea_estado"],
                "fecha_inicio" => $_POST["update_tarea_fecha_ini"],
                "fecha_fin" => $_POST["update_tarea_fecha_fin"],
            );

            $respuesta = ModeloProyectos::updateTareas($tabla, $datos);

             if ($respuesta == "ok") {
                echo '<script> 
                    if(window.history.replaceState){
                        window.history.replaceState(null, null, window.location.href);
                    }
                </script>';
                echo '<div class="alert alert-success mt-2 col-md-4">Tarea actualizada correctamente. Refresca la página</div>';
            }
        }
    }

    static public function createTarea()
    {
        if (
            !empty($_POST["create_tarea_nombre"]) &&
            !empty($_POST["create_tarea_desc"]) &&
            !empty($_POST["create_tarea_estado"]) &&
            !empty($_POST["create_tarea_proyecto"]) &&
            !empty($_POST["create_tarea_usuario"]) &&
            !empty($_POST["create_tarea_fecha_ini"]) &&
            !empty($_POST["create_tarea_fecha_fin"])
        ) {
            $tabla = "tareas";
            $datos = array(
                "nombre" => $_POST["create_tarea_nombre"],
                "descripcion" => $_POST["create_tarea_desc"],
                "estado" => $_POST["create_tarea_estado"],
                "id_proyecto" => $_POST["create_tarea_proyecto"],
                "id_usuario" => $_POST["create_tarea_usuario"],
                "fecha_inicio" => $_POST["create_tarea_fecha_ini"],
                "fecha_fin" => $_POST["create_tarea_fecha_fin"]
            );

            $respuesta = ModeloProyectos::createTareas($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script> 
                    if(window.history.replaceState){
                        window.history.replaceState(null, null, window.location.href);
                    }
                </script>';
                echo '<div class="alert alert-success mt-2 col-md-4">Tarea creada correctamente.</div>';
            }
            return $respuesta;
        }
    }
}


