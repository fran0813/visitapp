$(document).ready(function()
{
	verificar();
});

$("#otro").on("submit", function()
{
  	document.location ="/admin/informacionAgencia";

	return false;
});

function verificar()
{
	$.ajax({
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		method: "POST",
		url: "/admin/validarTodo",
		dataType: 'json',
		data: {  }
	})

	.done(function(response){
		if (response.siguienteFirma == "true") {
			subir();
		} else {
			boton();
		}
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

function subir()
{

  $('#modalCargar').modal({backdrop: 'static', keyboard: false}).fadeIn(400);
  $('#loader').html("<label class='control-label' style='color: #FFFFFF'>Cargando</label><div class='center-block loader'></div>");
  $('#loader').fadeIn(1000);
  document.body.style.cursor = "wait";

  $.ajax({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    method: "POST",
    url: "/admin/guardar",
    dataType: 'json',
    data: {  }
  })

  .done(function(response){
  	console.info(response);
    $('#modalCargar').modal('hide').fadeOut(1000);
    $('#loader').fadeOut(1000);
    $("#otro").show();
    document.body.style.cursor = "auto";
  });
}