$(document).ready(function()
{
	verificar();
});

$("#formAcuerdoPago").on("submit", function()
{
	var acuerdo = $('input:radio[name=acuerdo]:checked').val();
	var nDeProducto = $("#nDeProducto").val();
	var fechaCompromiso = $("#fechaCompromiso").val();
	var vrPromesa = $("#vrPromesa").val();
	var alternativa = $("#alternativa").val();

	$.ajax({
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		method: "POST",
		url: "/admin/acuerdoPagoAlmacenar",
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
		url: "/admin/validarAcuerdoPago",
		dataType: 'json',
		data: {  }
	})

	.done(function(response){
		if (response.siguienteResultadoVisita == "true") {
			verificarInformacion();
			$("#formAcuerdoPago").show();
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
		url: "/admin/verificarAcuerdoPago",
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

function fecha()
{
	var hoy = new Date();
	var dd = hoy.getDate();
	var mm = hoy.getMonth()+1; //hoy es 0!
	var yyyy = hoy.getFullYear();

	if(dd < 10){
	    dd='0'+dd;
	} 

	if(mm < 10){
	    mm='0'+mm;
	} 

	anio = $("#fechaCompromiso")[0];
	anio.value = yyyy+'-'+mm+'-'+dd;
}

function continuar()
{
	var siguienteAcuerdoPago = true;

	$.ajax({
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		method: "POST",
		url: "/admin/acuerdoPagoContinuar",
		dataType: 'json',
		data: { siguienteAcuerdoPago: siguienteAcuerdoPago }
	})

	.done(function(response){
		document.location ="/admin/comentarioVisita";
	});
}