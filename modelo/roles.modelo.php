<?php
require_once "conexion.php";


class  mdlroles{

    static public function mdlMostrarRoles($tabla, $item, $valor){

        $stmt =Conexion::conectar()->prepare("select * from $tabla where $item=:$item");
        $stmt ->bindParam(":".$item, $valor, PDO::PARAM_STR);
        $stmt ->execute();
        return $stmt->fetch();



    }

     static public function mdlMostrarRoles2($tabla){
    $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
    $stmt->execute();
    return $stmt->fetchAll();
}

  static public function mdlGuardarRoles($tabla,$nomRol){
   $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nom_rol) values(:NOMBRE_ROL)");
      $stmt->bindParam(":NOMBRE_ROL", $nomRol, PDO::PARAM_STR);
      
        if ($stmt->execute()) {
            return "ok";
        } else {
            error_log(print_r($stmt->errorInfo(), true)); // log de error si falla
            return "error";
        }

        $stmt = null;
  }
}

?>