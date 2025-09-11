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
   static public function mdlEditarRol($tabla, $datos){

    $stmt = Conexion::conectar()->prepare(
        "UPDATE $tabla SET nom_rol = :nom_rol WHERE id_roles = :id_roles"
    );

    $stmt->bindParam(":nom_rol", $datos["nom_rol"], PDO::PARAM_STR);
    $stmt->bindParam(":id_roles", $datos["id_roles"], PDO::PARAM_INT);

    if($stmt->execute()){
        return "ok";
    }else{
        return "error";
    }

    $stmt = null;
}
public static function mdlEliminarRol($tabla, $item, $valor) {

    $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE $item = :$item");

    $stmt->bindParam(":".$item, $valor, PDO::PARAM_INT);

    if ($stmt->execute()) {
        return "ok";
    } else {
        return "error";
    }

    $stmt = null;
}


}

?>