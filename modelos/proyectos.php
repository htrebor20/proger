<?php

class ModeloProyectos
{
    static public function readProyectos($tabla)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
        $stmt->execute();
        $response = $stmt->fetchAll();
        $stmt->closeCursor();
        $stmt = null;
        return $response;
    }

    static public function readProyectosPorCampo($tabla, $campo, $valor)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $campo = $valor");
        $stmt->execute();
        $response = $stmt->fetch();
        $stmt->closeCursor();
        $stmt = null;
        return $response;
    }

    static public function deleteProyectos($tabla, $valor)
    {
        $stmt = Conexion::conectar()->prepare(
            "DELETE FROM $tabla WHERE id=:id"
        );

        $stmt->bindParam(":id", $valor, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "ok";
        } else {
            print_r(Conexion::conectar()->errorInfo());
        }
        $stmt->closeCursor();
        $stmt = null;
    }

    static public function updateProyectos($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare(
            "UPDATE $tabla SET nombre = :nombre, descripcion = :descripcion, fecha_inicio = :fecha_inicio, fecha_fin = :fecha_fin  WHERE id=:id"
        );

        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha_inicio", $datos["fecha_inicio"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha_fin", $datos["fecha_fin"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            print_r(Conexion::conectar()->errorInfo());
        }
        $stmt->closeCursor();
        $stmt = null;
    }

    static public function createProyectos($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare(
            "INSERT INTO $tabla (nombre, descripcion, fecha_inicio, fecha_fin) VALUES (:nombre, :descripcion, :fecha_inicio, :fecha_fin)"
        );

        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha_inicio", $datos["fecha_inicio"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha_fin", $datos["fecha_fin"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            print_r(Conexion::conectar()->errorInfo());
        }
        $stmt->closeCursor();
        $stmt = null;
    }

    // -------------------- Tareas -------------------- //

    static public function readTareas($tabla)
    {
        $stmt = Conexion::conectar()->prepare("SELECT t.*, p.nombre AS nombre_proyecto, u.nombre AS nombre_usuario FROM tareas t INNER JOIN proyectos p ON t.id_proyecto = p.id INNER JOIN usuario u ON t.id_usuario= u.id ORDER BY t.id ASC;");
        $stmt->execute();
        $response = $stmt->fetchAll();
        $stmt->closeCursor();
        $stmt = null;
        return $response;
    }

    static public function readTareasPorCampo($tabla, $campo, $valor, $todosLosRegistros)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $campo = $valor");
        $stmt->execute();
        if($todosLosRegistros){
            $response = $stmt->fetchAll();
        } else{
            $response = $stmt->fetch();
        }
        $stmt->closeCursor();
        $stmt = null;
        return $response;
    }

    static public function deleteTareas($tabla, $valor)
    {
        $stmt = Conexion::conectar()->prepare(
            "DELETE FROM $tabla WHERE id=:id"
        );

        $stmt->bindParam(":id", $valor, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "ok";
        } else {
            print_r(Conexion::conectar()->errorInfo());
        }
        $stmt->closeCursor();
        $stmt = null;
    }


    static public function updateTareas($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare(
            "UPDATE $tabla SET nombre = :nombre, descripcion = :descripcion, id_proyecto = :id_proyecto, id_usuario = :id_usuario, estado = :estado , fecha_inicio = :fecha_inicio, fecha_fin = :fecha_fin  WHERE id=:id"
        );

        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
        $stmt->bindParam(":id_proyecto", $datos["id_proyecto"], PDO::PARAM_INT);
        $stmt->bindParam(":id_usuario", $datos["id_usuario"], PDO::PARAM_INT);
        $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha_inicio", $datos["fecha_inicio"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha_fin", $datos["fecha_fin"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            print_r(Conexion::conectar()->errorInfo());
        }
        $stmt->closeCursor();
        $stmt = null;
    }

    static public function createTareas($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare(
            "INSERT INTO $tabla (nombre, descripcion, estado, id_proyecto, id_usuario, fecha_inicio, fecha_fin) VALUES (:nombre, :descripcion, :estado, :id_proyecto, :id_usuario, :fecha_inicio, :fecha_fin)"
        );

        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
        $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
        $stmt->bindParam(":id_proyecto", $datos["id_proyecto"], PDO::PARAM_INT);
        $stmt->bindParam(":id_usuario", $datos["id_usuario"], PDO::PARAM_INT);
        $stmt->bindParam(":fecha_inicio", $datos["fecha_inicio"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha_fin", $datos["fecha_fin"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            print_r(Conexion::conectar()->errorInfo());
        }
        $stmt->closeCursor();
        $stmt = null;
    }
}

