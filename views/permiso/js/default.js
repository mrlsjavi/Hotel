$(document).ready(function(){

	window.onload = function(){
			llenar_roles();
	};

	function llenar_roles(){
		$.ajax({
			type: "POST",
			//data: enviar,
			url:"permiso/traer_roles",
			//dataType:"json",
			success: function(res){
				
				
			
				$("#slt_roles").empty();
				$("#slt_roles").append(res);

				
			}

		});
	}

	function mostrarVentana(){
	    var ventana = document.getElementById('dv_pagina');

	    ventana.style.display = 'block';
	}

	function ocultarVentana(){
	    var ventana = document.getElementById('dv_pagina');
	  
	    ventana.style.display = 'none';
	}


	$("#slt_roles").change(function(){
		if($("#slt_roles").val() == 0){
			//alert("oculto");
			//ocultar div 
			ocultarVentana();
		}
		else{
			//alert("cargo");
			cargar_paginas();
			mostrarVentana();
		}
	});

	function cargar_paginas(){
		var datos = {id: $("#slt_roles").val()};
		var datos_json = JSON.stringify(datos)
		
		enviar = {info: datos_json};
		//alert("d");
		$.ajax({
			type: "POST",
			data: enviar,
			url:"permiso/traer_paginas",
			//dataType:"json",
			success: function(res){
				
				
				$("#dv_pagina").empty();
				$("#dv_pagina").append(res);
				todos();
				
			}

		});
	}


function todos(){



	$('.pasar').click(function() { return !$('#origen option:selected').remove().appendTo('#destino'); });  
		$('.quitar').click(function() { return !$('#destino option:selected').remove().appendTo('#origen'); });
		$('.pasartodos').click(function() { $('#origen option').each(function() { $(this).remove().appendTo('#destino'); }); });
		$('.quitartodos').click(function() { $('#destino option').each(function() { $(this).remove().appendTo('#origen'); }); });
		$('.submit').click(function() { 
			$('#destino option').prop('selected', 'selected'); 
			datos();

		});

}
		function datos(){

			console.log($("#destino").val());
			//alert($("#destino").val()[1]);
			//alert($("#destino").val().length);
			guardar();
		}


		function guardar(){
			//recorrer
			//antes de guardar en el model tengo que ver que no exista si ya existe lo dejo asi 
			//si no existe lo creo
			//tambien traer los que no puse y buscar si existen para eliminar el acceso
			var datos = {nuevos: $("#destino").val(), rol:$("#slt_roles").val()};
			var datos_json = JSON.stringify(datos)
			
			enviar = {info: datos_json};
			//alert("d");
			$.ajax({
				type: "POST",
				data: enviar,
				url:"permiso/guardar",
				//dataType:"json",
				success: function(res){
					
					alert(res);
					
				}

			});

			}

});

