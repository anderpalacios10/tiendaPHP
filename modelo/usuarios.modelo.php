<?php

require_once "conexion.php";

class mdlUsuarios
{
     

   static public function mdlEliminarUsuarios($tabla, $id)
{
    $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        return "ok";
    } else {
        error_log(print_r($stmt->errorInfo(), true));
        return "error";
    }

    $stmt = null;
}
   
   
    static public function mdlEditarUusarios($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare("update $tabla SET usuario=:NOM_E, password=:PASS_E, nombres=:NOMUSER, rol=:ROL WHERE id=:IDE");
        $stmt->bindParam(":IDE", $datos["idE"], PDO::PARAM_STR);
        $stmt->bindParam(":NOM_E", $datos["nom_usuarioE"], PDO::PARAM_STR);
        $stmt->bindParam(":NOMUSER", $datos["nom_userE"], PDO::PARAM_STR);
        $stmt->bindParam(":PASS_E", $datos["passE"], PDO::PARAM_STR);
        $stmt->bindParam(":ROL", $datos["rol_userE"], PDO::PARAM_STR);
        if ($stmt->execute()) {
            return "ok";
        } else {
            error_log(print_r($stmt->errorInfo(), true)); // log de error si falla
            return "error";
        }

        $stmt = null;
    }



    static public function mdlMostrarUsuarios1($tabla, $item, $valor)
    {

        $stmt = Conexion::conectar()->prepare("select * from $tabla where $item=:$item");
        $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();
    }



    static public function mdlMostrarUsuarios($tabla)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt = null;
    }

    static public function mdlguardarUsuarios($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(usuario, password, nombres, rol) 
                                               VALUES (:USUARIO_u, :PASS_u, :NOMBRE_u, :ROL_u)");

        $stmt->bindParam(":NOMBRE_u", $datos["nom_usuario"], PDO::PARAM_STR);
        $stmt->bindParam(":USUARIO_u", $datos["nom_user"], PDO::PARAM_STR);
        $stmt->bindParam(":PASS_u", $datos["pass_user"], PDO::PARAM_STR);
        $stmt->bindParam(":ROL_u", $datos["rol_user"], PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "ok";
        } else {
            error_log(print_r($stmt->errorInfo(), true)); // log de error si falla
            return "error";
        }

        $stmt = null;
    }
}
