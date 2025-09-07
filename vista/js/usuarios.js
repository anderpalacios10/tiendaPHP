
$(".tablausuarios").DataTable({
	
	"deferRender": true,
	"retrieve": true,
	"processing": true,
	"language": {

		"sProcessing":     "Procesando...",
		"sLengthMenu":     "Mostrar _MENU_ registros",
		"sZeroRecords":    "No se encontraron resultados",
		"sEmptyTable":     "Ningún dato disponible en esta tabla",
		"sInfo":           "Mostrando registros del _START_ al _END_",
		"sInfoEmpty":      "Mostrando registros del 0 al 0",
		"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
		"sInfoPostFix":    "",
		"sSearch":         "Buscar:",
		"sUrl":            "",
		"sInfoThousands":  ",",
		"sLoadingRecords": "Cargando...",
		"oPaginate": {
			"sFirst":    "Primero",
			"sLast":     "Último",
			"sNext":     "Siguiente",
			"sPrevious": "Anterior"
		},
		"oAria": {
			"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
			"sSortDescending": ": Activar para ordenar la columna de manera descendente"
		}

	}

});



  
  /*=============================================
    VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
    =============================================*/




/*EDITAR USUARIOI*/

$(".tablausuarios").on("click", ".btnEditarUsuario", function(){



	var idUsuario = $(this).attr("idUsuario");

	//console.log(idUsuario);

	var datos = new FormData();

	datos.append("idUsuario", idUsuario);


	$.ajax({

		url:"ajax/usuarios.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function (respuesta) {

			

			$("#idPerfilE").val(respuesta["id"]);
			$("#nom_usuariosE").val(respuesta["nombres"]);
			$("#nom_userE").val(respuesta["usuario"]);  
			$("#pass_userE").val(respuesta["password"]);
		
			
			$("#pass_usserActualE").val(respuesta["password"]);

			
			
			


		}


	})

})









/**ELIMINAR USUARIO */

$(document).on("click", ".eliminarUsuario", function(){

	var idUsuario = $(this).attr("idUsuario");

	
	swal({
		title: '¿Está seguro de eliminar este usario?',
		text: "¡Si no lo está puede cancelar la acción!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si, eliminar usuario!' 
	}).then(function(result){


		if (result.value) {

			var datos = new FormData();
			datos.append("idEliminar", idUsuario);
			
			

			$.ajax({

				url: "ajax/usuarios.ajax.php",
				method: "POST",
				data: datos,
				cache: false,
				contentType: false,
				processData: false,
				success:function (respuesta) {

					console.log(respuesta);

					if (respuesta == "ok") {
						swal({
							type: "success",
							title: "¡CORRECTO!",
							text: "El usuario ha sido borrado correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"
						}).then(function (result) {

							if (result.value){

								window.location = "usuarios";
                     }
                })

             }

          }

        })

      }

    })

})











	
	
	





