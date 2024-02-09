<?php

class ModeloLogin
{
    static public function modeloFormularios($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare(
            "SELECT * FROM $tabla WHERE correo = :correo AND contrasena = :contrasena;"
        );

        $stmt->bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
        $stmt->bindParam(":contrasena", $datos["contrasena"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            $stmt = null;
            if ($resultado) {
                return true; 
            } else {
                return false; 
            }
        } else {
            $stmt->closeCursor();
            $stmt = null;
            return false;
        }
    }
}

