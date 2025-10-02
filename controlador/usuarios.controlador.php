<?php

class ctrUsuarios
{

	static public function ctrIngresoUsuarios(){
		if(isset($_POST["log_user"])){
			
			$encriptarPass=crypt($_POST["log_pass"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');



			$tabla="usuarios";
			$item="usuario";
			$valor=$_POST["log_user"];
			$respuesta=mdlUsuarios::mdlMostrarUsuariosl($tabla,$item,$valor);
			if($respuesta["usuario"]==$_POST["log_user"] && $respuesta["password"]==$encriptarPass){

				$_SESSION["validarSession"]="ok";
				$_SESSION["idBackend"]=$respuesta["id"];
				echo '<script>

							window.location = "usuarios";

				 		</script>';



			}else{


				echo "<div class='alert alert-danger mt-3 small'>ERROR: Usuario y/o contraseña incorrectos</div>";


			}

			}


		}


	
	

	static public function ctrEliminarUsuarios($id){
		$tabla = "usuarios";
		$respuesta = mdlUsuarios::mdlEliminarUsuarios($tabla,$id);
		return $respuesta;
	

    
   }

	static public function ctrMostrarUsuarios1($item, $valor)
	{
		$tabla = "usuarios";
		$respuesta = mdlUsuarios::mdlMostrarUsuarios1($tabla, $item, $valor);
		return $respuesta;
	}
	static public function ctrMostrarUsuarios()
	{
		$tabla = "usuarios";
		$respuesta = mdlUsuarios::mdlMostrarUsuarios($tabla);
		return $respuesta;
	}

	static public function ctrEditarusuarios(){
		if (isset($_POST["idPerfilE"])){

			if($_POST["pass_userE"] != ""){
				$password = crypt($_POST["pass_userE"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
			}else{
				
				$password =$_POST["pass_usserActualE"];
			} 

			$datos =array("idE"=> $_POST["idPerfilE"],
			"nom_usuarioE"=> $_POST["nom_usuariosE"],
			"nom_userE"=> $_POST["nom_userE"],
			"passE"=> $password,
			"rol_userE"=> $_POST["rol_userE"]
		);
			$tabla="usuarios";
			$respuesta = mdlUsuarios::mdlEditarUusarios($tabla,$datos);
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
	

	static public function ctrGuardarusuarios()
	{
		if (isset($_POST["nom_usuario"])) {

			$encriptarPassword = crypt($_POST["pass_user"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

			$datos = array(
				"nom_usuario" => $_POST["nom_usuario"],
				"nom_user" => $_POST["nom_user"],
				"pass_user" => $encriptarPassword,
				"rol_user" => $_POST["rol_user"]
			);

			$tabla = "usuarios";

			$respuesta = mdlUsuarios::mdlguardarUsuarios($tabla, $datos);

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
