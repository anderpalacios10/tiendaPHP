$(".tablaRoles").DataTable({
	
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
// EDITAR
$(document).on("click", ".btnEditarUsuario", function(){
    var idRol = $(this).attr("idRol");

    var datos = new FormData();
    datos.append("idRolEditar", idRol);

    $.ajax({
        url:"ajax/roles.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType:"json",
        success:function(respuesta){
            console.log(respuesta);
            $("#idRolEditar").val(respuesta["id_roles"]); // id oculto en modal
            $("#editarRol").val(respuesta["nom_rol"]);    // input de nombre
        }
    });
});

/**ELIMINAR rol */

$(document).on("click", ".btnEliminarRol", function(){

    var idRolE = $(this).attr("idRolE"); // <-- lo toma del botón

    swal({
		title: '¿Está seguro de eliminar este rol?',
		text: "¡Si no lo está puede cancelar la acción!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si, eliminar rol!' 
	}).then(function(result){


		if (result.value) {

			var datos = new FormData();
            datos.append("idRolE", idRolE); // <-- lo enviamos a PHP

            $.ajax({
                url:"ajax/roles.ajax.php",
        
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
							text: "El rol ha sido borrado correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"
						}).then(function (result) {

							if (result.value){

								window.location = "index.php?pagina=roles";
                      }
                })

             }

          }

        })

      }

    })

})