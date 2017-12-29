$(document).ready(function()
{
	$("#formResultadoVisita").hide();
	$("#noContacta").hide();
	verificar();
});

$("#formResultadoVisita").on("submit", function()
{
	var contactaTitular = $('input:radio[name=contactaTitular]:checked').val();
	var noContactaTitular = $('input:radio[name=noContactaTitular]:checked').val();
	var nombresApellidosVisita = $("#nombresApellidosVisita").val();
	var parentesco = $("#parentesco").val();
	var actividadEconomica = $("#actividadEconomica").val();
	var noPago = $("#noPago").val();
	var observacionesNoPago = $("#observacionesNoPago").val();

	$.ajax({
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		method: "POST",
		url: "/admin/resultadoVisitaAlmacenar",
		dataType: 'json',
		data: { contactaTitular: contactaTitular,
				noContactaTitular: noContactaTitular,
				nombresApellidosVisita: nombresApellidosVisita,
				parentesco: parentesco,
				actividadEconomica: actividadEconomica,
				noPago: noPago,
				observacionesNoPago: observacionesNoPago }
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
		if (response.contactaTitular == "si") {
			$('#si').prop("checked", true);
		} else if (response.direccionDeMayorContacto == "no") {
			$('#no').prop("checked", true);
		}
		if (response.noContactaTitular == "si") {
			$('#si2').prop("checked", true);
		} else if (response.direccionDeMayorContacto == "no") {
			$('#no2').prop("checked", true);
		}
		$("#nombresApellidosVisita").val(response.nombresApellidosVisita);
		$("#parentesco").val(response.parentesco);
		$("#actividadEconomica").val(response.actividadEconomica);
		$("#noPago").val(response.noPago);
		$("#observacionesNoPago").val(response.observacionesNoPago);
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

$("#formResultadoVisita").on("click", 'input[type="radio"]', function()
{
	var contactaTitular = $('input:radio[name=contactaTitular]:checked').val();

	if (contactaTitular == "si") {
		$("#noContacta").hide();
		$('#si2').prop("checked", false);
		$('#no2').prop("checked", false);
	} else if (contactaTitular == "no") {
		$("#noContacta").show();
	}
});