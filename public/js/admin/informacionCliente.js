$(document).ready(function()
{
	verificar();
});

$("#formInformacionCliente").on("submit", function()
{
	var nombresApellidos = $("#nombresApellidos").val();
	var documentoIdentificacion = $("#documentoIdentificacion").val();
	var correo = $("#correo").val();
	var celular = $("#celular").val();
	var direccion = $("#direccion").val();
	var telefono = $("#telefono").val();
	var direccionOficiona = $("#direccionOficiona").val();
	var telefonoOficina = $("#telefonoOficina").val();
	var direccionDeMayorContacto = $('input:radio[name=direccionDeMayorContacto]:checked').val();
	var direccionVisita = $("#direccionVisita").val();

	$.ajax({
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		method: "POST",
		url: "/admin/informacionClienteAlmacenar",
		dataType: 'json',
		data: { nombresApellidos: nombresApellidos,
				documentoIdentificacion: documentoIdentificacion,
				correo: correo,
				celular: celular,
				direccion: direccion,
				telefono: telefono, 
				direccionOficiona: direccionOficiona,
				telefonoOficina: telefonoOficina,
				direccionDeMayorContacto: direccionDeMayorContacto,
				direccionVisita: direccionVisita }
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
		url: "/admin/validarInformacionCliente",
		dataType: 'json',
		data: {  }
	})

	.done(function(response){
		if (response.siguienteInformacionGeneral == "true") {
			verificarInformacion();
			$("#formInformacionCliente").show();
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
		url: "/admin/verificarInformacionCliente",
		dataType: 'json',
		data: {  }
	})

	.done(function(response){
		$("#nombresApellidos").val(response.nombresApellidos);
		$("#documentoIdentificacion").val(response.documentoIdentificacion);
		$("#correo").val(response.correo);
		$("#celular").val(response.celular);
		$("#direccion").val(response.direccion);
		$("#telefono").val(response.telefono);
		$("#direccionOficiona").val(response.direccionOficiona);
		$("#telefonoOficina").val(response.telefonoOficina);
		if (response.direccionDeMayorContacto == "residencia") {
			$('#residencia').prop("checked", true);
		} else if (response.direccionDeMayorContacto == "oficina") {
			$('#oficina').prop("checked", true);
		}
		$("#direccionVisita").val(response.direccionVisita);	
	});
}

function continuar()
{
	var siguienteInformacionCliente = true;

	$.ajax({
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		method: "POST",
		url: "/admin/informacionClienteContinuar",
		dataType: 'json',
		data: { siguienteInformacionCliente: siguienteInformacionCliente }
	})

	.done(function(response){
		document.location ="/admin/informacionReferencia";
	});
}