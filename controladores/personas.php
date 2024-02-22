<?php

class ControladorPersonas
{
    static public function readUsuarios()
    {
        $tabla = "usuario";
        $respuesta = ModeloPersonas::readUsuarios($tabla);
        return $respuesta;
    }

    static public function readUsuariosPorCampo($campo, $valor)
    {
        $tabla = "usuario";
        $respuesta = ModeloPersonas::readUsuariosPorCampo($tabla, $campo, $valor);
        return $respuesta;
    }

    static public function deleteUsuarios()
    {
        if (!empty($_POST["eliminar_user"])) {
            $tabla = "usuario";
            $valor = $_POST["eliminar_user"];
            $respuesta = ModeloPersonas::deleteUsuarios($tabla, $valor);

            if ($respuesta == "ok") {
                echo '<script> 
                    if(window.history.replaceState){
                        window.history.replaceState(null, null, window.location.href);
                    }
                    window.location = "index.php?ruta=personas&sesion=usuarios"
                </script>';
                return "ok";
            } else {
                return "error";
            }
        }
    }

    static public function updateUsuarios()
    {
        if (
            !empty($_POST["update_user_id"]) &&
            !empty($_POST["update_user_documento"]) &&
            !empty($_POST["update_user_nombre"]) &&
            !empty($_POST["update_user_correo"]) &&
            !empty($_POST["update_user_telefono"]) &&
            !empty($_POST["update_user_ciudad"]) &&
            !empty($_POST["update_user_direccion"])
        ) {
            $tabla = "usuario";
            $datos = array(
                "id" => $_POST["update_user_id"],
                "documento" => $_POST["update_user_documento"],
                "nombre" => $_POST["update_user_nombre"],
                "correo" => $_POST["update_user_correo"],
                "telefono" => $_POST["update_user_telefono"],
                "ciudad" => $_POST["update_user_ciudad"],
                "direccion" => $_POST["update_user_direccion"],
            );

            $respuesta = ModeloPersonas::updateUsuarios($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script> 
                    if(window.history.replaceState){
                        window.history.replaceState(null, null, window.location.href);
                    }
                </script>';
                echo '<div class="alert alert-success mt-2 col-md-4">Usuario actualizado correctamente. Refresca la página</div>';
            }
            return $respuesta;
        }
    }

    static public function createUsuarios()
    {
        if (
            !empty($_POST["create_user_documento"]) &&
            !empty($_POST["create_user_nombre"]) &&
            !empty($_POST["create_user_correo"]) &&
            !empty($_POST["create_user_contrasena"]) &&
            !empty($_POST["create_user_telefono"]) &&
            !empty($_POST["create_user_ciudad"]) &&
            !empty($_POST["create_user_direccion"])
        ) {
            $tabla = "usuario";
            $datos = array(
                "documento" => $_POST["create_user_documento"],
                "nombre" => $_POST["create_user_nombre"],
                "correo" => $_POST["create_user_correo"],
                "contrasena" => $_POST["create_user_contrasena"],
                "telefono" => $_POST["create_user_telefono"],
                "ciudad" => $_POST["create_user_ciudad"],
                "direccion" => $_POST["create_user_direccion"],
            );

            $respuesta = ModeloPersonas::createUsuarios($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script> 
                    if(window.history.replaceState){
                        window.history.replaceState(null, null, window.location.href);
                    }
                </script>';
                echo '<div class="alert alert-success mt-2 col-md-4">Usuario creado correctamente.</div>';
            }
            return $respuesta;
        }
    }
}
