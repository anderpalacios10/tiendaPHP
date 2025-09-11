<?php

require_once "../controlador/roles.controlador.php";
require_once "../modelo/roles.modelo.php";

class AjaxRoles
{

    public $idRol;

    /*=============================================
    EDITAR ROL
    =============================================*/
    public function ajaxEditarRol()
    {
        $item = "id_roles";
        $valor = $this->idRol;
        $respuesta = ctrRoles::ctrMostrarRoles($item, $valor);
        echo json_encode($respuesta);
    }

    /*=============================================
    ELIMINAR ROL
    =============================================*/

    public $idRolE;

    public function ajaxEliminarRol()
    {
        $item = "id_roles";
        $valor = $this->idRolE;
        $respuesta = ctrRoles::ctrEliminarRol($item,$valor);
        echo json_encode($respuesta);
    }
}

/*=============================================
PETICIONES AJAX
=============================================*/

// Editar
if (isset($_POST["idRolEditar"])) {
    $editar = new AjaxRoles();
    $editar->idRol = $_POST["idRolEditar"];
    $editar->ajaxEditarRol();
}

// Eliminar
if (isset($_POST["idRolE"])) {
    $eliminar = new AjaxRoles();
    $eliminar->idRolE = $_POST["idRolE"];
    $eliminar->ajaxEliminarRol();
}
