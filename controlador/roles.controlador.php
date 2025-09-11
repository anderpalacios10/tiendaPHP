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
    static public function ctrEditarRol(){

    if (isset($_POST["editar_rol"])){

        $tabla = "roles";

        $datos = array(
            "id_roles" => $_POST["id_rol"],
            "nom_rol" => $_POST["editar_rol"]
        );

        $respuesta = mdlRoles::mdlEditarRol($tabla, $datos);

        if($respuesta == "ok"){
            echo '<script>
                Swal.fire({
                    icon: "success",
                    title: "El rol ha sido editado correctamente",
                    showConfirmButton: false,
                    timer: 1500
                }).then(function(){
                    window.location = "roles";
                });
            </script>';
        }
    }
}
static public function ctrEliminarRol($item,$valor){

        $tabla = "roles";
        $respuesta = mdlroles::mdlEliminarRol($tabla,$item, $valor);

        return $respuesta;
    }
}
