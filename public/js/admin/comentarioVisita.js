$(document).ready(function()
{
	verificar();
});

$("#formComentarioVisita").on("submit", function()
{
	var acuerdo = $('input:radio[name=acuerdo]:checked').val();
	var nDeProducto = $("#nDeProducto").val();
	var fechaCompromiso = $("#fechaCompromiso").val();
	var vrPromesa = $("#vrPromesa").val();
	var alternativa = $("#alternativa").val();

	$.ajax({
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		method: "POST",
		url: "/admin/comentarioVisitaAlmacenar",
		dataType: 'json',
		data: { acuerdo: acuerdo,
				nDeProducto: nDeProducto,
				fechaCompromiso: fechaCompromiso,
				vrPromesa: vrPromesa,
				alternativa: alternativa }
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
		url: "/admin/validarComentarioVisita",
		dataType: 'json',
		data: {  }
	})

	.done(function(response){
		if (response.siguienteResultadoVisita != "true") {
			verificarInformacion();
			$("#formComentarioVisita").show();
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
		url: "/admin/verificarComentarioVisita",
		dataType: 'json',
		data: {  }
	})

	.done(function(response){
		if (response.acuerdo == "si") {
			$('#si').prop("checked", true);
		} else if (response.acuerdo == "no") {
			$('#no').prop("checked", true);
		}
		$("#nDeProducto").val(response.nDeProducto);
		if (response.fechaCompromiso == null) {
			fecha();
		} else {
			$("#fechaCompromiso").val(response.fechaCompromiso);
		}
		$("#vrPromesa").val(response.vrPromesa);
		$("#alternativa").val(response.alternativa);		
	});
}

function continuar()
{
	var siguienteComentarioVisita = true;

	$.ajax({
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		method: "POST",
		url: "/admin/comentarioVisitaContinuar",
		dataType: 'json',
		data: { siguienteComentarioVisita: siguienteComentarioVisita }
	})

	.done(function(response){
		document.location ="/admin/";
	});
}