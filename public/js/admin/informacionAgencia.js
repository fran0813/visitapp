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

function initMap() {
	var map = new google.maps.Map(document.getElementById('map'), {
		center: {lat: -34.397, lng: 150.644},
		zoom: 10
	});
	var infoWindow = new google.maps.InfoWindow({map: map});

	// Try HTML5 geolocation.
	if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(function(position) {
			var pos = {
				lat: position.coords.latitude,
				lng: position.coords.longitude
			};

			coordenadas(pos.lat,pos.lng);

			infoWindow.setPosition(pos);
			infoWindow.setContent('Location found.');
			map.setCenter(pos);
		}, function() {
			handleLocationError(true, infoWindow, map.getCenter());
		});
	} else {
	// Browser doesn't support Geolocation
	handleLocationError(false, infoWindow, map.getCenter());
	}
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
	infoWindow.setPosition(pos);
	infoWindow.setContent(browserHasGeolocation ?
	'Error: The Geolocation service failed.' :
	'Error: Your browser doesn\'t support geolocation.');
} 

function coordenadas(lat,lng)
{
	$.ajax({
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		method: "POST",
		url: "/admin/coordenadas",
		dataType: 'json',
		data: { lat :lat,
				lng: lng }
	})

	.done(function(response){
	
	});
}