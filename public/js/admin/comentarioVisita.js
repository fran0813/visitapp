$(document).ready(function()
{
	verificar();
});

$("#formComentarioVisita").on("submit", function()
{
	var comentario = $("#comentario").val();
	var efectoVisita = $('input:radio[name=efectoVisita]:checked').val();
	var motivo = $('input:radio[name=motivo]:checked').val();
	if (motivo == "otro") {
		var otroMotivo = $("#otroMotivo").val();
	} else {
		var otroMotivo = null;
	}
	var direccionInexistente = $('input:radio[name=direccionInexistente]:checked').val();
	var subrogacion = $('input:radio[name=subrogacion]:checked').val();
	var tipoContacto = $('input:radio[name=tipoContacto]:checked').val();

	$.ajax({
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		method: "POST",
		url: "/admin/comentarioVisitaAlmacenar",
		dataType: 'json',
		data: { comentario: comentario,
				efectoVisita: efectoVisita,
				motivo: motivo,
				otroMotivo: otroMotivo,
				direccionInexistente: direccionInexistente,
				subrogacion: subrogacion,
				tipoContacto: tipoContacto }
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
		if (response.siguienteAcuerdoPago == "true") {
			verificarInformacion();
			$("#formComentarioVisita").show();
		} else {
			boton();
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
		$("#comentario").val(response.comentario);
		$('#'+response.efectoVisita).prop("checked", true);		
		$('#'+response.motivo).prop("checked", true);
		if (response.motivo == "otro") {
			$("#otroMotivo").show();
			$("#otroMotivo").val(response.otroMotivo);
		}	
		$('#'+response.direccionInexistente).prop("checked", true);		
		$('#'+response.subrogacion).prop("checked", true);		
		$('#'+response.tipoContacto).prop("checked", true);		
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

$("#formComentarioVisita").on("click", 'input[type="radio"]', function()
{
	var motivo = $('input:radio[name=motivo]:checked').val();

	if (motivo == "otro") {
		$("#otroMotivo").show();
	} else if (motivo != "otro") {
		$("#otroMotivo").hide();
	}
});

function boton()
{
	$.ajax({
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		method: "POST",
		url: "/admin/boton",
		dataType: 'json',
		data: {  }
	})

	.done(function(response){
		$("#siguiente").show();
		$("#siguiente").html("No se ha ingresado la información del paso anterior"+ "<br>"+ response.html);
	});
}