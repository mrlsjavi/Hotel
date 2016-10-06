$(document).ready(function(){

  window.onload = function(){
    //llenar_tabla();
    /*$("#txt_fechaInicio").datepicker({
      dateFormat: "yy-mm-dd"
    });
    $("#txt_fechaFin").datepicker({
      dateFormat: "yy-mm-dd"
    });*/
    $("#select_motel").on('change', function() {
      var datos = {
        motel: this.value,
      };
      var datos_json = JSON.stringify(datos);

      enviar = {info: datos_json};

      $.ajax({
        type: "POST",
        data: enviar,
        url:"reporte/traer_habitaciones",
        success: function(res){
          var habitaciones = $("#select_habitacion");
          habitaciones.find('option')
          .remove()
          .end()
          .append('<option value="0">Seleccione habitaciones</option>')
          .val('0');
          var datos = JSON.parse(res.trim());
          $.each(datos.datos, function(data) {
            habitaciones.append($("<option />").val(this.id).text(this.nombre));
          });

        }
      });
    });

    $.ajax({
    type: "POST",
    url:"reporte/traer_moteles",
    success: function(res){
      var habitaciones = $("#select_motel");
      habitaciones.find('option')
      .remove()
      .end()
      .append('<option value="0">Seleccione moteles</option>')
      .val('0');
      var datos = JSON.parse(res.trim());
      $.each(datos.datos, function(data) {
        habitaciones.append($("<option />").val(this.id).text(this.nombre));
      });

    }
  });

    $.ajax({
      type: "POST",
      url:"reporte/traer_habitaciones",
      success: function(res){
        var habitaciones = $("#select_habitacion");
        habitaciones.find('option')
        .remove()
        .end()
        .append('<option value="0">Seleccione habitaciones</option>')
        .val('0');
        var datos = JSON.parse(res.trim());
        $.each(datos.datos, function(data) {
          habitaciones.append($("<option />").val(this.id).text(this.nombre));
        });

      }
    });
  };

  $("#btn_guardar").click(function(){
    llenar_tabla();
});

});


function data_table(){
  $('#reporte').DataTable( {
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


function llenar_tabla(){

  var datos = {
    habitacion: $("#select_habitacion").val(),
    motel: $("#select_motel").val(),
    fecha_inicio: $("#txt_fechaInicio").val(),
    fecha_fin: $("#txt_fechaFin").val(),
    resumen : $("#chk_agrupar").is(":checked")
  };
  var datos_json = JSON.stringify(datos);

  enviar = {info: datos_json};

  $.ajax({
    type: "POST",
    url:"reporte/traer_habitaciones",
    success: function(res){
      var habitaciones = $("#select_habitacion");
      habitaciones.find('option')
      .remove()
      .end()
      .append('<option value="0">Seleccione habitaciones</option>')
      .val('0');
      var datos = JSON.parse(res.trim());
      $.each(datos.datos, function(data) {
        habitaciones.append($("<option />").val(this.id).text(this.nombre));
      });

    }
  });

  $.ajax({
    type: "POST",
    url:"reporte/traer_moteles",
    success: function(res){
      var habitaciones = $("#select_motel");
      habitaciones.find('option')
      .remove()
      .end()
      .append('<option value="0">Seleccione moteles</option>')
      .val('0');
      var datos = JSON.parse(res.trim());
      $.each(datos.datos, function(data) {
        habitaciones.append($("<option />").val(this.id).text(this.nombre));
      });

    }
  });

  $.ajax({
    type: "POST",
    data: enviar,
    url:"reporte/llenar_tabla",
    //dataType:"json",
    success: function(res){
      $("#dv_tabla").empty();
      $("#dv_tabla").append(res);

      data_table();

      /*if(res.cod ==1){
      alert(res.msj);
    }
    else{
    alert("ha ocurrido un problema");
  }*/

}, error: function(res){
  console.error(res);
}

});
}
