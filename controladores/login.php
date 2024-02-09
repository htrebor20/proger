<?php

class Login
{
    public function login()
    {
        if (!empty($_POST["loginEmail"]) && !empty($_POST["loginPassword"])) {
            $tabla = "usuario";
            $datos = array(
                "correo" => $_POST["loginEmail"],
                "contrasena" => $_POST["loginPassword"]
            );

            $respuesta = ModeloLogin::modeloFormularios($tabla, $datos);
            if ($respuesta) {
                $_SESSION["autorizarIngreso"] = "ok";

                echo '<script> 
                    if(window.history.replaceState){
                        window.history.replaceState(null, null, window.location.href);
                    }
                    window.location = "index.php?task"
                </script>';
            } else {
                echo '<div class="alert alert-danger mt-2">¡Correo o contraseña incorrecta!</div>';
            }

            return $respuesta;
        }
    }
}