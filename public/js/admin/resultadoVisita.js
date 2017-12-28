$(document).ready(function()
{
	$("#formResultadoVisita").hide();
	verificar();
});

$("#formResultadoVisita").on("submit", function()
{
	var codigoGarantia = $("#codigoGarantia").val();
	var nombresApellidosAvalista = $("#nombresApellidosAvalista").val();
	var telefonoAvalista = $("#telefonoAvalista").val();
	var ocupacion = $("#ocupacion").val();
	var observacion = $("#observacion").val();

	$.ajax({
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		method: "POST",
		url: "/admin/resultadoVisitaAlmacenar",
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
		url: "/admin/validarResultadoVisita",
		dataType: 'json',
		data: {  }
	})

	.done(function(response){
		if (response.siguienteInformacionAvalista == "true") {
			verificarInformacion();
			$("#formResultadoVisita").show();
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
		url: "/admin/verificarResultadoVisita",
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
	var siguienteResultadoVisita = true;

	$.ajax({
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		method: "POST",
		url: "/admin/resultadoVisitaContinuar",
		dataType: 'json',
		data: { siguienteResultadoVisita: siguienteResultadoVisita }
	})

	.done(function(response){
		// document.location ="/admin/resultadoVisita";
	});
}