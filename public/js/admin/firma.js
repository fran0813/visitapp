$(document).ready(function()
{
	verificar();
});

$("#formComentarioVisita").on("submit", function()
{
	// var comentario = $("#comentario").val();
	// var efectoVisita = $('input:radio[name=efectoVisita]:checked').val();
	// var motivo = $('input:radio[name=motivo]:checked').val();
	// if (motivo == "otro") {
	// 	var otroMotivo = $("#otroMotivo").val();
	// } else {
	// 	var otroMotivo = null;
	// }
	// var direccionInexistente = $('input:radio[name=direccionInexistente]:checked').val();
	// var subrogacion = $('input:radio[name=subrogacion]:checked').val();
	// var tipoContacto = $('input:radio[name=tipoContacto]:checked').val();

	// $.ajax({
	// 	headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
	// 	method: "POST",
	// 	url: "/admin/comentarioVisitaAlmacenar",
	// 	dataType: 'json',
	// 	data: { comentario: comentario,
	// 			efectoVisita: efectoVisita,
	// 			motivo: motivo,
	// 			otroMotivo: otroMotivo,
	// 			direccionInexistente: direccionInexistente,
	// 			subrogacion: subrogacion,
	// 			tipoContacto: tipoContacto }
	// })

	// .done(function(response){
	// 	continuar();
	// });

	return false;
});

function verificar()
{
	$.ajax({
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		method: "POST",
		url: "/admin/validarFirma",
		dataType: 'json',
		data: {  }
	})

	.done(function(response){
		if (response.siguienteAcuerdoPago != "true") {
			$("#formFirma").show();
		} else {
			boton();
		}
	});
}

function continuar()
{
	// var siguienteComentarioVisita = true;

	// $.ajax({
	// 	headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
	// 	method: "POST",
	// 	url: "/admin/comentarioVisitaContinuar",
	// 	dataType: 'json',
	// 	data: { siguienteComentarioVisita: siguienteComentarioVisita }
	// })

	// .done(function(response){
	// 	document.location ="/admin/";
	// });
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

var estoyDibujando = false;

function comenzar(){
     lienzo = document.getElementById('canvas');
     ctx = lienzo.getContext('2d');
//Dejamos todo preparado para escuchar los eventos
     document.addEventListener('mousedown',pulsaRaton,false);
     document.addEventListener('mousemove',mueveRaton,false);
     document.addEventListener('mouseup',levantaRaton,false);
}

function pulsaRaton(capturo){
     estoyDibujando = true;
//Indico que vamos a dibujar
     ctx.beginPath();
//Averiguo las coordenadas X e Y por dónde va pasando el ratón
     ctx.moveTo(capturo.clientX,capturo.clientY);
}

function mueveRaton(capturo){
     if(estoyDibujando){
//indicamos el color de la línea
         ctx.strokeStyle='#000';
//Por dónde vamos dibujando
         ctx.lineTo(capturo.clientX,capturo.clientY);
         ctx.stroke();
     }
}

function levantaRaton(capturo){
//Indico que termino el dibujo
     ctx.closePath();
     estoyDibujando = false;
}