$(document).ready(function()
{
	$("#formInformacionGeneral").hide();
	verificar();
});

$("#formInformacionGeneral").on("submit", function()
{
	var codAlivio = $("#codAlivio").val();
	var obligacionN = $("#obligacionN").val();
	var fechaDeDesembolso = $("#fechaDeDesembolso").val();
	var saldoCapital = $("#saldoCapital").val();
	var saldoTotal = $("#saldoTotal").val();
	var etapaSapro = $("#etapaSapro").val();
	var invBienesINIC = $("#invBienesINIC").val();
	var embargo = $("#embargo").val();

	$.ajax({
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		method: "POST",
		url: "/admin/informacionGeneralAlmacenar",
		dataType: 'json',
		data: { codAlivio: codAlivio,
				obligacionN: obligacionN,
				fechaDeDesembolso: fechaDeDesembolso,
				saldoCapital: saldoCapital,
				saldoTotal: saldoTotal,
				etapaSapro: etapaSapro,
				invBienesINIC: invBienesINIC,
				embargo: embargo }
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
		url: "/admin/validarInformacionGeneral",
		dataType: 'json',
		data: {  }
	})

	.done(function(response){
		if (response.siguienteInformacionAgencia == "true") {
			verificarInformacion();
			$("#formInformacionGeneral").show();
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
		url: "/admin/verificarInformacionGeneral",
		dataType: 'json',
		data: {  }
	})

	.done(function(response){
		$("#codAlivio").val(response.codAlivio);
		$("#obligacionN").val(response.obligacionN);
		if (response.fechaDeDesembolso == null) {
			fecha();
		} else {
			$("#fechaDeDesembolso").val(response.fechaDeDesembolso);
		}
		$("#saldoCapital").val(response.saldoCapital);	
		$("#saldoTotal").val(response.saldoTotal);
		$("#etapaSapro").val(response.etapaSapro);
		$("#invBienesINIC").val(response.invBienesINIC);
		$("#embargo").val(response.embargo);
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

	anio = $("#fechaDeDesembolso")[0];
	anio.value = yyyy+'-'+mm+'-'+dd;
}

function continuar()
{
	var siguienteInformacionGeneral = true;

	$.ajax({
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		method: "POST",
		url: "/admin/informacionGeneralContinuar",
		dataType: 'json',
		data: { siguienteInformacionGeneral: siguienteInformacionGeneral }
	})

	.done(function(response){
		document.location ="/admin/informacionCliente";
	});
}