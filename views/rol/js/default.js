$(document).ready(function(){

	window.onload = function(){
		llenar_tabla();
	};
    
    $("#btn_guardar").click(function(){
    	var datos = {nombre: $("#txt_nombre").val()};
		var datos_json = JSON.stringify(datos)
		
		enviar = {info: datos_json};
		//alert("d");
		$.ajax({
			type: "POST",
			data: enviar,
			url:"rol/guardar",
			dataType:"json",
			success: function(res){
				alert(res.msj);
				/*if(res.cod ==1){
					alert(res.msj);
				}
				else{
					alert("ha ocurrido un problema");
				}*/
				llenar_tabla();
				$("#txt_nombre").val('');
			}

		});

    });


    function data_table(){
    	 $('#javier').DataTable( {
    	 "ordering": false,	
        "pagingType": "full_numbers",

        "language": {
		    "search": "Buscar",
		    "info": "Mostrando _START_ de _END_ registros",
		    "lengthMenu":     "Mostrar _MENU_ ",
		    "emptyTable":     "Sin registros",
		    "infoEmpty":      "Sin paginas que mostrar",
		    "loadingRecords": "Cargando...",
    		"processing":     "Procesando...",
    		"zeroRecords":    "busqueda sin resultados",
    		"infoFiltered":   "(filtrado de _MAX_ registros)",
		    "paginate": {
		        "first":      "Primera",
		        "last":       "Ultima",
		        "next":       "Siguiente",
		        "previous":   "Anterior"
		    }
		  },

		  
    } );
    }


    //para que cargue la funcion de editar y eliminar en todas las paginas 
	function eliminar_editar (){
		$(".paginate_button").click(function(){
   			//alert("paginando");
   			eliminar_editar();
   			click_editar();
			click_eliminar();
   		});	
	}   


    function llenar_tabla(){
    	$.ajax({
			type: "POST",
			
			url:"rol/llenar_tabla",
			//dataType:"json",
			success: function(res){
				$("#dv_tabla").empty();
				$("#dv_tabla").append(res);

				data_table();
				click_editar();
				click_eliminar();
				eliminar_editar();
				
				/*if(res.cod ==1){
					alert(res.msj);
				}
				else{
					alert("ha ocurrido un problema");
				}*/
				
			}

		});
    }

   function click_editar(){
   		$(".editar").click(function(){
   			var r = confirm("Desea editar el registro? ");
   			if(r == true){//tengo que ir a por los datos
   				var datos = {id: $(this).attr("id")};
				var datos_json = JSON.stringify(datos)
				
				enviar = {info: datos_json};
				//alert("d");
				$.ajax({
					type: "POST",
					data: enviar,
					url:"rol/traer_dato",
					dataType:"json",
					success: function(res){
						
						
						$("#txt_EditarNombre").val(res.datos[0]['nombre']);
						$("#txt_EditarId").val(res.datos[0]['id']);
						mostrarVentana();
						editar();

						
					}

				});
   			}
   		});	
   }

   function editar (){

	   $("#btn_actualizar").click(function(){
	   		var datos = {id: $("#txt_EditarId").val(), nombre:$("#txt_EditarNombre").val()};
				var datos_json = JSON.stringify(datos)
				
				enviar = {info: datos_json};
				//alert("d");
				$.ajax({
					type: "POST",
					data: enviar,
					url:"rol/actualizar",
					dataType:"json",
					success: function(res){
						alert(res.msj);
						ocultarVentana();
						llenar_tabla();
						//exit;
						
				}

			});
	  
	   });
   }



   function mostrarVentana(){
	    var ventana = document.getElementById('dv_edicion');
	    ventana.style.marginTop = "100px";
	    ventana.style.left = ((document.body.clientWidth-350) / 2) +"px";

	    ventana.style.display = 'block';
	}

	function ocultarVentana(){
	    var ventana = document.getElementById('dv_edicion');
	    ventana.style.marginTop = "100px";
	    ventana.style.left = ((document.body.clientWidth-350) / 2) +"px";
	    ventana.style.display = 'none';
	}

   function click_eliminar(){
   	$(".eliminar").click(function(){
   		var r = confirm("Seguro que desea eliminar este registro?"); //inidcar cual 
   		if(r == true){
   			var datos = {id: $(this).attr("id")};
			var datos_json = JSON.stringify(datos)
			
			enviar = {info: datos_json};
			//alert("d");
			$.ajax({
				type: "POST",
				data: enviar,
				url:"rol/eliminar",
				dataType:"json",
				success: function(res){
					//console.log(res);
					//alert(res.datos[0]['nombre']);
					alert(res.msj);
					llenar_tabla();
					//actualizar tabla
				}

			});

   		}

   	});
   }




});

