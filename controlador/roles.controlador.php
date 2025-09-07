<?php

class ctrRoles
{

    static public function ctrMostrarRoles($item, $valor)
    {

        $tabla = "roles";
        $respuesta = mdlroles::mdlMostrarRoles($tabla, $item, $valor);
        return $respuesta;
    }

    static public function ctrMostrarRoles2()
    {

        $tabla = "roles";
        $respuesta = mdlroles::mdlMostrarRoles2($tabla);
        return $respuesta;
    }

    static public function ctrGuardarRol()
    {
        if (isset($_POST["nom_rol"])) {
            $nomRol = $_POST["nom_rol"];
            $tabla = "roles";
            $respuesta = mdlroles::mdlGuardarRoles($tabla, $nomRol);
            if ($respuesta == "ok") {

                echo '<script>
					swal({
						type: "success",
						title: "¡CORRECTO!",
						text: "El usuario ha sido creado correctamente",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
					}).then(function(result){
						if(result.value){   
							history.back();
						} 
					});
				</script>';
            } else {
                echo "<div class='alert alert-danger mt-3 small'>Registro fallido</div>";
            }
        }
    }
}
