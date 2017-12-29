$(document).ready(function()
{
	verificar();
});

$("#formInformacionAvalista").on("submit", function()
{
	var codigoGarantia = $("#codigoGarantia").val();
	var nombresApellidosAvalista = $("#nombresApellidosAvalista").val();
	var telefonoAvalista = $("#telefonoAvalista").val();
	var ocupacion = $("#ocupacion").val();
	var observacion = $("#observacion").val();

	$.ajax({
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		method: "POST",
		url: "/admin/informacionAvalistaAlmacenar",
		dataType: 'json',
		data: { codigoGarantia: codigoGarantia,
				nombresApellidosAvalista: nombresApellidosAvalista,
				telefonoAvalista: telefonoAvalista,
				ocupacion: ocupacion,
				observacion: observacion }
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
		url: "/admin/validarInformacionAvalista",
		dataType: 'json',
		data: {  }
	})

	.done(function(response){
		if (response.siguienteInformacionReferencia == "true") {
			verificarInformacion();
			$("#formInformacionAvalista").show();
		} else {
			$("#siguiente").show();
			$("#siguiente").html("No se ha ingresado la información del paso anterior");
		}
	});
}

function verificarInformacion()
{
	$.ajax({
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		method: "POST",
		url: "/admin/verificarInformacionAvalista",
		dataType: 'json',
		data: {  }
	})

	.done(function(response){
		$("#codigoGarantia").val(response.codigoGarantia);
		$("#nombresApellidosAvalista").val(response.nombresApellidosAvalista);
		$("#telefonoAvalista").val(response.telefonoAvalista);
		$("#ocupacion").val(response.ocupacion);
		$("#observacion").val(response.observacion);
	});
}

function continuar()
{
	var siguienteInformacionAvalista = true;

	$.ajax({
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		method: "POST",
		url: "/admin/informacionAvalistaContinuar",
		dataType: 'json',
		data: { siguienteInformacionAvalista: siguienteInformacionAvalista }
	})

	.done(function(response){
		document.location ="/admin/resultadoVisita";
	});
}