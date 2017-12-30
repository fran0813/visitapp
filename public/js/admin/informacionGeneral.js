$(document).ready(function()
{
	verificar();
});

$("#formInformacionGeneral1").on("submit", function()
{
	$("#myCarousel").carousel(1);
	return false;
});

$("#formInformacionGeneral2").on("submit", function()
{
	$("#myCarousel").carousel(2);
	return false;
});

$("#formInformacionGeneral3").on("submit", function()
{
	var codAlivio = $("#codAlivio").val();
	var obligacionN = $("#obligacionN").val();
	var fechaDeDesembolso = $("#fechaDeDesembolso").val();
	var saldoCapital = $("#saldoCapital").val();
	var saldoTotal = $("#saldoTotal").val();
	var diasMora = $("#diasMora").val();
	var VrIntMora = $("#VrIntMora").val();
	var VrIntCorrientes = $("#VrIntCorrientes").val();
	var VrSeguros = $("#VrSeguros").val();
	var VrGac = $("#VrGac").val();
	var calificacion = $("#calificacion").val();
	var etapaSapro = $("#etapaSapro").val();
	var invBienesINIC = $("#invBienesINIC").val();
	var embargo = $("#embargo").val();

	if (codAlivio == "" || obligacionN == "" || saldoCapital == "" || saldoTotal == "") {
		$("#myCarousel").carousel(0);
		if (codAlivio == "") {
			$("#siguiente").show();
			$("#siguiente").html("No se ha ingresado la información del codigo alivio");
			$("#codAlivio").focus();
			location.href = "#siguiente";
		} else if (obligacionN == "") {
			$("#siguiente").show();
			$("#siguiente").html("No se ha ingresado la información de la obligacion n°");
			$("#obligacionN").focus();
			location.href = "#siguiente";
		} else if (saldoCapital == "") {
			$("#siguiente").show();
			$("#siguiente").html("No se ha ingresado la información del saldo de capital");
			$("#saldoCapital").focus();
			location.href = "#siguiente";
		} else if (saldoTotal == "") {
			$("#siguiente").show();
			$("#siguiente").html("No se ha ingresado la información del saldo total");
			$("#saldoTotal").focus();
			location.href = "#siguiente";
		}
	} else if (diasMora == "" || VrIntMora == "" || VrIntCorrientes == "" || VrSeguros == "" || VrGac == "" || calificacion == "") {
		$("#myCarousel").carousel(0);
		if (diasMora == "") {
			$("#siguiente").show();
			$("#siguiente").html("No se ha ingresado la información de los dia de mora");
			$("#diasMora").focus();
			location.href = "#siguiente";
		} else if (VrIntMora == "") {
			$("#siguiente").show();
			$("#siguiente").html("No se ha ingresado la información del valor intereses mora");
			$("#VrIntMora").focus();
			location.href = "#siguiente";
		} else if (VrIntCorrientes == "") {
			$("#siguiente").show();
			$("#siguiente").html("No se ha ingresado la información del valor intereses corrientes");
			$("#VrIntCorrientes").focus();
			location.href = "#siguiente";
		} else if (VrSeguros == "") {
			$("#siguiente").show();
			$("#siguiente").html("No se ha ingresado la información del valor de seguros");
			$("#VrSeguros").focus();
			location.href = "#siguiente";
		} else if (VrGac == "") {
			$("#siguiente").show();
			$("#siguiente").html("No se ha ingresado la información del valor GAC");
			$("#VrGac").focus();
			location.href = "#siguiente";
		} else if (calificacion == "") {
			$("#siguiente").show();
			$("#siguiente").html("No se ha ingresado la información de la calificación");
			$("#calificacion").focus();
			location.href = "#siguiente";
		}
	} else {
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
					saldoTotal: saldoTotal,
					diasMora: diasMora,
					VrIntMora: VrIntMora,
					VrIntCorrientes: VrIntCorrientes,
					VrSeguros: VrSeguros,
					VrGac: VrGac,
					calificacion: calificacion,
					etapaSapro: etapaSapro,
					invBienesINIC: invBienesINIC,
					embargo: embargo }
		})

		.done(function(response){
			continuar();
		});
	}

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
			$("#myCarousel").show();
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
		$("#diasMora").val(response.diasMora);
		$("#VrIntMora").val(response.VrIntMora);
		$("#VrIntCorrientes").val(response.VrIntCorrientes);
		$("#VrSeguros").val(response.VrSeguros);
		$("#VrGac").val(response.VrGac);
		$("#calificacion").val(response.calificacion);
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
