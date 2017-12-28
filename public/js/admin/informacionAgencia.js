$(document).ready(function()
{
	verificarInformacion();
});

$("#formInformacionAgencia").on("submit", function()
{
	var nombreDeLaAgencia = $("#nombreDeLaAgencia").val();
	var franja = $("#franja").val();
	var fecha = $("#fecha").val();
	var ciudad = $("#ciudad").val();

	$.ajax({
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		method: "POST",
		url: "/admin/informacionAgenciaAlmacenar",
		dataType: 'json',
		data: { nombreDeLaAgencia: nombreDeLaAgencia,
				franja: franja,
				fecha: fecha,
				ciudad: ciudad }
	})

	.done(function(response){
		continuar();
	});

	return false;
});

function verificarInformacion()
{
	$.ajax({
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		method: "POST",
		url: "/admin/verificarInformacionAgencia",
		dataType: 'json',
		data: {  }
	})

	.done(function(response){
		$("#nombreDeLaAgencia").val(response.nombreDeLaAgencia);
		$("#franja").val(response.franja);
		if (response.fecha == null) {
			fecha();
		} else {
			$("#fecha").val(response.fecha);
		}
		$("#ciudad").val(response.ciudad);		
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

	anio = $("#fecha")[0];
	anio.value = yyyy+'-'+mm+'-'+dd;
}

function continuar()
{
	var siguienteInformacionAgencia = true;

	$.ajax({
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		method: "POST",
		url: "/admin/informacionAgenciaContinuar",
		dataType: 'json',
		data: { siguienteInformacionAgencia: siguienteInformacionAgencia }
	})

	.done(function(response){
		document.location ="/admin/informacionGeneral";
	});
}