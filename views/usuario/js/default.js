$(document).ready(function(){
    window.onload = function(){
			llenar_roles();
			llenar_tabla();
	};

	function llenar_roles(){
		$.ajax({
			type: "POST",
			//data: enviar,
			url:"usuario/traer_roles",
			//dataType:"json",
			success: function(res){
				
				
			
				$("#slt_rol").empty();
				$("#slt_EditarRol").empty();
				$("#slt_rol").append(res);
				$("#slt_EditarRol").append(res);


				
			}

		});
	}


    $("#btn_guardar").click(function(){
    	if($("#slt_rol").val() == 0){
    		alert("Debe de seleccionar un rol valido");
    	}
    	else{
    		var datos = {nombre: $("#txt_nombre").val(), login:$("#txt_login").val(), password:$("#txt_pass").val(), rol: $("#slt_rol").val()};
			var datos_json = JSON.stringify(datos);
			
			enviar = {info: datos_json};
			//alert("d");
			$.ajax({
				type: "POST",
				data: enviar,
				url:"usuario/guardar",
				dataType:"json",
				success: function(res){
					alert(res.msj);
					llenar_tabla();
					$("#txt_nombre").val('');
					$("#txt_pass").val('');
					$("#txt_login").val('');
					$("#slt_rol").val('0').attr('selected', 'selected');
					

					
					
				}

			});
    	}
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
			
			url:"usuario/llenar_tabla",
			//dataType:"json",
			success: function(res){
				$("#dv_tabla").empty();
				$("#dv_tabla").append(res);

				data_table();
				click_editar();
				click_eliminar();
				eliminar_editar();
				click_clave();
				
				/*if(res.cod ==1){
					alert(res.msj);
				}
				else{
					alert("ha ocurrido un problema");
				}*/
				
			}

		});
    }

    function click_clave(){
    	$(".clave").click(function(){
   			var r = confirm("Desea resetear la clave? ");
   			if(r == true){//tengo que ir a por los datos
   				var datos = $(this).attr("id");
				$("#txt_EditarIdClave").val(datos);
				
				mostrarVentanaClave();
				cambiar_clave();
				
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
					url:"usuario/traer_dato",
					dataType:"json",
					success: function(res){
						console.log(res);
						
						$("#txt_EditarNombre").val(res.datos[0]['nombre']);
						$("#txt_EditarId").val(res.datos[0]['id']);
						$("#txt_EditarLogin").val(res.datos[0]['login']);
						//$("#slt_EditarRol").append(res.select);
						$("#slt_EditarRol").val(res.datos[0]['rol']).attr('selected', 'selected');
						//$("#slt_rol").val('0').attr('selected', 'selected');
						mostrarVentana();
						editar();

						
					}

				});
   			}
   		});	
   }

   function editar (){

	   $("#btn_actualizar").click(function(){
	   		var datos = {id: $("#txt_EditarId").val(), nombre:$("#txt_EditarNombre").val(), login:$("#txt_EditarLogin").val(), rol: $("#slt_EditarRol").val()};
				var datos_json = JSON.stringify(datos)
				
				enviar = {info: datos_json};
				//alert("d");
				$.ajax({
					type: "POST",
					data: enviar,
					url:"usuario/actualizar",
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

   function cambiar_clave(){
   		$("#btn_ActualizarClave").click(function(){
	   		var datos = {id: $("#txt_EditarIdClave").val(), pass:$("#txt_EditarPass").val()};
				var datos_json = JSON.stringify(datos)
				
				enviar = {info: datos_json};
				//alert("d");
				$.ajax({
					type: "POST",
					data: enviar,
					url:"usuario/clave",
					dataType:"json",
					success: function(res){
						alert(res.msj);
						ocultarVentanaClave();
						llenar_tabla();
						$("#txt_EditarPass").val('');

						//exit;
						
				}

			});
	  
	   });
   }

     function mostrarVentanaClave(){
	    var ventana = document.getElementById('dv_clave');
	    ventana.style.marginTop = "100px";
	    ventana.style.left = ((document.body.clientWidth-350) / 2) +"px";

	    ventana.style.display = 'block';
	}

	function ocultarVentanaClave(){
		    var ventana = document.getElementById('dv_clave');
		    ventana.style.marginTop = "100px";
		    ventana.style.left = ((document.body.clientWidth-350) / 2) +"px";
		    ventana.style.display = 'none';
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
				url:"usuario/eliminar",
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

