$(document).ready(function()
{
	$("#formInformacionReferencia").hide();
	verificar();
});

$("#formInformacionReferencia").on("submit", function()
{
	var nombresApellidosReferencia = $("#nombresApellidosReferencia").val();
	var telefonoReferencia = $("#telefonoReferencia").val();

	$.ajax({
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		method: "POST",
		url: "/admin/informacionReferenciaAlmacenar",
		dataType: 'json',
		data: { nombresApellidosReferencia: nombresApellidosReferencia,
				telefonoReferencia: telefonoReferencia }
	})

	.done(function(response){
		continuar();
	});

	return false;
});

function verificar()
{
	$.ajax({
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		method: "POST",
		url: "/admin/validarInformacionReferencia",
		dataType: 'json',
		data: {  }
	})

	.done(function(response){
		if (response.siguienteInformacionCliente == "true") {
			verificarInformacion();
			$("#formInformacionReferencia").show();
		} else {
			$("#siguiente").html("No se ha ingresado la información del paso anterior");
		}
	});
}

function verificarInformacion()
{
	$.ajax({
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		method: "POST",
		url: "/admin/verificarInformacionReferencia",
		dataType: 'json',
		data: {  }
	})

	.done(function(response){
		$("#nombresApellidosReferencia").val(response.nombresApellidosReferencia);
		$("#telefonoReferencia").val(response.telefonoReferencia);
	});
}

function continuar()
{
	var siguienteInformacionReferencia = true;

	$.ajax({
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		method: "POST",
		url: "/admin/informacionReferenciaContinuar",
		dataType: 'json',
		data: { siguienteInformacionReferencia: siguienteInformacionReferencia }
	})

	.done(function(response){
		document.location ="/admin/informacionAvalista";
	});
}