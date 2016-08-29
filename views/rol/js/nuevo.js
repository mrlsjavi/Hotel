$(document).ready(function(){
    
    $("#btn_guardar").click(function(){
    	var datos = {nombre: $("#txt_nombre").val()};
		var datos_json = JSON.stringify(datos)
		
		enviar = {info: datos_json};
		//alert("d");
		$.ajax({
			type: "POST",
			data: enviar,
			url:"guardar",
			dataType:"json",
			success: function(res){
				alert(res.msj);
				/*if(res.cod ==1){
					alert(res.msj);
				}
				else{
					alert("ha ocurrido un problema");
				}*/
				
			}

		});

    });
});

