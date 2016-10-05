$(document).ready(function(){

  window.onload = function(){
    llenar_tabla();
    //$("#txt_fechaInicio").datepicker();
    //$("#txt_fechaFin").datepicker();
  };

  $("#btn_guardar").click(function(){
    var datos = {
      motel: $("#select_motel").val(),
      nombre: $("#txt_nombre").val(),
      precio: $("#nmb_precio").val(),
      duracion: $("#nmb_duracion").val(),
      columnaMatriz: $("#nmb_columna").val(),
      filaMatriz: $("#nmb_fila").val()
    };
    var datos_json = JSON.stringify(datos);

    enviar = {info: datos_json};
    //alert("d");

    $.ajax({
      type: "POST",
      data: enviar,
      url:"habitacion/guardar",
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
    $("#select_motel").val(null);
    $("#txt_nombre").val(null);
    $("#nmb_precio").val(null);
    $("#nmb_duracion").val(null);
    $("#nmb_columna").val(null);
    $("#nmb_fila").val(null);
  }
});

});


function data_table(){
  $('#habitaciones').DataTable( {
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
		url:"habitacion/traer_moteles",
		success: function(res){
			var moteles = $("#select_motel");
			var datos = JSON.parse(res.trim());
			$.each(datos.datos, function(data) {
				moteles.append($("<option />").val(this.id).text(this.nombre));
			});

		}
	});

  $.ajax({
    type: "POST",

    url:"habitacion/llenar_tabla",
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
    if(r === true){//tengo que ir a por los datos
      var datos = {id: $(this).attr("id")};
      var datos_json = JSON.stringify(datos);

      enviar = {info: datos_json};
      //alert("d");
      $.ajax({
    		type: "POST",
    		url:"habitacion/traer_moteles",
    		success: function(res){
    			var moteles = $("#select_EditarMotel");
    			var datos = JSON.parse(res.trim());
    			$.each(datos.datos, function(data) {
    				moteles.append($("<option />").val(this.id).text(this.nombre));
    			});

    		}
    	});

      $.ajax({
        type: "POST",
        data: enviar,
        url:"habitacion/traer_dato",
        dataType:"json",
        success: function(res){


          $("#select_EditarMotel").val(res.datos[0].motel);
          $("#txt_EditarNombre").val(res.datos[0].nombre);
          $("#nmb_EditarPrecio").val(res.datos[0].precio);
          $("#nmb_EditarDuracion").val(res.datos[0].duracion);
          $("#nmb_EditarColumna").val(res.datos[0].columna_matriz);
          $("#nmb_EditarFila").val(res.datos[0].columna_fila);
          $("#txt_EditarId").val(res.datos[0].id);
          mostrarVentana();
          editar();


        }

      });
    }
  });
}

function editar (){

  $("#btn_actualizar").click(function(){
    var datos = {
      motel: $("#select_EditarMotel").val(),
      nombre: $("#txt_EditarNombre").val(),
      precio: $("#nmb_EditarPrecio").val(),
      duracion: $("#nmb_EditarDuracion").val(),
      columna_matriz: $("#nmb_EditarColumna").val(),
      fila_matriz: $("#nmb_EditarFila").val(),
      id: $("#txt_EditarId").val(),
    };
    var datos_json = JSON.stringify(datos);

    enviar = {info: datos_json};
    //alert("d");
    $.ajax({
      type: "POST",
      data: enviar,
      url:"habitacion/actualizar",
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

  //$("#txt_EditarFechaInicio").datepicker();
  //$("#txt_EditarFechaFin").datepicker();
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
    if(r === true){
      var datos = {id: $(this).attr("id")};
      var datos_json = JSON.stringify(datos);

      enviar = {info: datos_json};
      //alert("d");
      $.ajax({
        type: "POST",
        data: enviar,
        url:"habitacion/actualizar",
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
