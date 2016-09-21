$(document).ready(function(){

  window.onload = function(){
    llenar_tabla();
  };

  $("#btn_guardar").click(function(){
    var datos = {
      habitacion: $("#select_habitacion").val(),
      fecha_inicio: $("#txt_fechaInicio").val(),
      fecha_fin: $("#txt_fechaFin").val(),
      precio_normal: $("#txt_precioNormal").val(),
      precio_nocturno: $("#txt_precioNocturno").val(),
    };
    var datos_json = JSON.stringify(datos);

    enviar = {info: datos_json};
    //alert("d");
    $.ajax({
      type: "POST",
      data: enviar,
      url:"promociones/guardar",
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
    $("#select_EditarHabitacion").val(null);
    $("#txt_EditarFechaInicio").val(null);
    $("#txt_EditarFechaFin").val(null);
    $("#txt_EditarPrecioNormal").val(null);
    $("#txt_EditarPrecioNocturno").val(null);
    $("#txt_EditarId").val(null);
  }

});

});


function data_table(){
  $('#promociones').DataTable( {
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

    url:"promociones/llenar_tabla",
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
        data: enviar,
        url:"promociones/traer_dato",
        dataType:"json",
        success: function(res){


          $("#select_EditarHabitacion").val(res.datos[0].habitacion);
          $("#txt_EditarFechaInicio").val(res.datos[0].fecha_inicio);
          $("#txt_EditarFechaFin").val(res.datos[0].fecha_fin);
          $("#txt_EditarPrecioNormal").val(res.datos[0].precio_normal);
          $("#txt_EditarPrecioNocturno").val(res.datos[0].precio_nocturno);
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
      habitacion: $("#select_EditarHabitacion").val(),
      fecha_inicio: $("#txt_EditarFechaInicio").val(),
      fecha_fin: $("#txt_EditarFechaFin").val(),
      precio_normal: $("#txt_EditarPrecioNormal").val(),
      precio_nocturno: $("#txt_EditarPrecioNocturno").val(),
      id: $("#txt_EditarId").val(),
    };
    var datos_json = JSON.stringify(datos);

    enviar = {info: datos_json};
    //alert("d");
    $.ajax({
      type: "POST",
      data: enviar,
      url:"promociones/actualizar",
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
    if(r === true){
      var datos = {id: $(this).attr("id")};
      var datos_json = JSON.stringify(datos);

      enviar = {info: datos_json};
      //alert("d");
      $.ajax({
        type: "POST",
        data: enviar,
        url:"promocion//actualizar",
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
