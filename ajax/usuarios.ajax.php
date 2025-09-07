<?php

require_once "../controlador/usuarios.controlador.php";
require_once "../modelo/usuarios.modelo.php";


class AjaxUsuarios
{

    public $idUsuario;

    public function ajaxEditarUsuarios()
    {
        $item = "id";#usuarios,id
        $valor = $this->idUsuario;
        $respuesta = ctrUsuarios::ctrMostrarUsuarios1($item, $valor);
        return $respuesta;
    }


    // public $idEliminar;
    // static public function ajaxEliminarUsuarios(){
    //     $respuesta = ctrUsuarios::ctrEliminarUsuarios($this->idEliminar);
    //     	echo $respuesta;
    public $idEliminar;

    public function ajaxEliminarUsuarios()
{
    $respuesta = ctrUsuarios::ctrEliminarUsuarios($this->idEliminar);
    echo $respuesta;
}

}






//editar usuarioexi
if (isset($_POST["idUsuario"])) {

    $editar = new AjaxUsuarios();
    $editar->idUsuario = $_POST["idUsuario"];
    echo json_encode($editar->ajaxEditarUsuarios());
}

//eliminar usuarioexi
// if (isset($_POST["idUsuario"])) {

//     $eliminar = new AjaxUsuarios();
//     $eliminar->$idEliminar = $_POST["idEliminar"];
//     echo json_encode($eliminar->ajaxEliminarUsarios());
// }
// Eliminar usuario
if (isset($_POST["idEliminar"])) {
    $eliminar = new AjaxUsuarios();
    $eliminar->idEliminar = $_POST["idEliminar"];
    $eliminar->ajaxEliminarUsuarios();
}