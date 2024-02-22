<?php

class ModeloPersonas
{
    static public function readUsuarios($tabla)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
        $stmt->execute();
        $response = $stmt->fetchAll();
        $stmt->closeCursor();
        $stmt = null;
        return $response;
    }

    static public function readUsuariosPorCampo($tabla, $campo, $valor)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $campo = $valor");
        $stmt->execute();
        $response = $stmt->fetch();
        $stmt->closeCursor();
        $stmt = null;
        return $response;
    }

    static public function deleteUsuarios($tabla, $valor)
    {


        $stmt = Conexion::conectar()->prepare(
            "DELETE FROM $tabla WHERE id=:id"
        );
        $stmt->bindParam(":id", $valor, PDO::PARAM_INT);
        try {
            $stmt->execute();
            $stmt->closeCursor();
            $stmt = null;
            return "ok";
        } catch (\Throwable $th) {
            $stmt->closeCursor();
            $stmt = null;
            return "error";
        }
    }


    static public function updateUsuarios($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare(
            "UPDATE $tabla SET documento = :documento, nombre = :nombre, correo = :correo, telefono = :telefono, ciudad = :ciudad, direccion = :direccion  WHERE id=:id"
        );

        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
        $stmt->bindParam(":documento", $datos["documento"], PDO::PARAM_STR);
        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
        $stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
        $stmt->bindParam(":ciudad", $datos["ciudad"], PDO::PARAM_STR);
        $stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            print_r(Conexion::conectar()->errorInfo());
        }
        $stmt->closeCursor();
        $stmt = null;
    }


    static public function createUsuarios($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare(
            "INSERT INTO $tabla (documento, nombre, correo, contrasena, telefono, ciudad, direccion) VALUES (:documento, :nombre, :correo, :contrasena, :telefono, :ciudad, :direccion)"
        );

        $stmt->bindParam(":documento", $datos["documento"], PDO::PARAM_STR);
        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
        $stmt->bindParam(":contrasena", $datos["contrasena"], PDO::PARAM_STR);
        $stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
        $stmt->bindParam(":ciudad", $datos["ciudad"], PDO::PARAM_STR);
        $stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            print_r(Conexion::conectar()->errorInfo());
        }
        $stmt->closeCursor();
        $stmt = null;
    }
}

