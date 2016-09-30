<head>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>

<style type="text/css">

	.editar {color:blue;}
	.eliminar {color:red;}
</style>

<div>
	<div>
	<h1>Administracion de Promociones</h1>

	</div>

	<div>
		<label>Habitacion</label>
		<select type="text" id="select_habitacion"></select>
		<br/>
		<label>Fecha Inicio</label>
		<input type="date" id="txt_fechaInicio"></input>
		<br />
		<label>Fecha Fin</label>
<<<<<<< HEAD
		<input type="date" id="txt_fechaFin"></input>
=======
		<input type="text" id="txt_fechaFin"></input>
>>>>>>> origin/feature/mte_habitaciones
		<br />
		<label>Precio normal</label>
		<input type="number" id="nmb_precioNormal"></input>
		<br />
		<label>Precio nocturno</label>
		<input type="number" id="nmb_precioNocturno"></input>
		<br/>
		<br/>
		<button id="btn_guardar">Guardar</button>
	</div>


	<br/>
	<br/>
	<div id ="dv_tabla">


	</div>

<div id="dv_edicion" style=" padding: 20px; position:fixed; width:350px; height: 190px; top:0; left:0;   border:#333333 3px solid; background-color: #F8F8FF; color:#000000; display:none;" >

	<div style="position:fixed">
		<label>Habitacion</label>
		<select type="text" id="select_EditarHabitacion"></select>
		<input type="hidden" id="txt_EditarId"/>
		<br/>
		<label>Fecha Inicio</label>
		<input type="text" id="txt_EditarFechaInicio"></input>
		<br />
		<label>Fecha Fin</label>
		<input type="text" id="txt_EditarFechaFin"></input>
<<<<<<< HEAD
		<br/>
=======
		<br />
>>>>>>> origin/feature/mte_habitaciones
		<label>Precio normal</label>
		<input type="number" id="nmb_EditarPrecioNormal"></input>
		<br />
		<label>Precio nocturno</label>
		<input type="number" id="nmb_EditarPrecioNocturno"></input>
		<br />
		<br />
		<button id="btn_actualizar">Actualizar</button>
	</div>
</div>


</div>
