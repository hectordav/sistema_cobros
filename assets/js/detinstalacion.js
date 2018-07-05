$(document).on("ready".inicio);
function inicio(){
//	mostrardatos("");
	$('#btn_enviar').click(mostrardatos);
	$(form).submit(function(event){
		event.preventDefault();
		$.ajax({
			url:$("form").attr("action"),
			type:$("form").attr("method"),
			type:$("form").serialize(),
			success:function(respuesta){
				alert(respuesta);
			}
		});
	});

}
function mostrardatos(valor){
	$.ajax({
		url: "http://localhost/sis_cobro/index.php/instalacion/mostrar_det_instalacion",
		type: 'POST',
		data: $("#form-guardar").serialize(),
		success:function(respuesta){
		//	alert(respuesta);
			html= "<table class='table table-condensed table-bordered table-hover'>";
    			html+="<thead><tr>";
      			html+="<th class col-md-5>Equipo</th>";//la columna de descripcion de detalle instalacion.
      				html+="<th class col-md-5>Cantidad</th>";//la columna de cantidad de detalle instalacion.
      				html+="<th class col-md-1>Acciones</th></tr>";//la columna de cantidad de detalle instalacion.
    			html+="</thead><tbody>";
			var registro= eval(respuesta);
			for (var i = 0;  i<registro.length; i++) {
				html+="<tr><td>"+registro[i]["DESCRIPCION"]+"</td>";
				html+="<td>"+registro[i]["CANTIDAD"]+"</td>";

				html+="<th class'col-md-1'>'<button class='btn btn-default glyphicon glyphicon-trash' onclick='eliminar_det_instalacion()' name='btn_enviar'id='btn_enviar' type='submit'></button></span></th></tr>";//la columna de cantidad de detalle instalacion.

				$("#det_instalacion").html(html);
				document.getElementById('txt_equipo').value = '';
				document.getElementById('txt_cantidad').value = '';
			};
		}
	});
}
function guardar_det_instalacion(){
	event.preventDefault();
	$.ajax({

		url: "http://localhost/sis_cobro/index.php/instalacion/guardar_det_instalacion",
		type:"POST",
		data: $("#form-guardar").serialize(),
		success:function(respuesta){
			mostrardatos();
	}

});
}
function actualizar_instalacion(){
	event.preventDefault();
	$.ajax({
		url: "http://localhost/sis_cobro/index.php/instalacion/actualizar_instalacion",
		type:"POST",
		data: $("#form-actualizar").serialize(),
		success:function(respuesta){
			mostrardatos();
	}

});
}
function eliminar_det_instalacion(){
	event.preventDefault();
	$.ajax({

		url: "http://localhost/sis_cobro/index.php/instalacion/guardar_det_instalacion",
		type:"POST",
		data: $("#form-guardar").serialize(),
		success:function(respuesta){
			mostrardatos();
	}

});
}

