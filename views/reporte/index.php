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
	<h1>Reporte de Usos</h1>

	</div>

	<div>
		<label>Motel</label>
		<select type="text" id="select_motel">
			<option value="0">Seleccione motel</option>
		</select>
		<br/>
		<label>Habitacion</label>
		<select type="text" id="select_habitacion">
			<option value="0">Seleccione habitaci&#243;n</option>
		</select>
		<br/>
		<label>Fecha Inicio</label>
		<input type="date" id="txt_fechaInicio"></input>
		<br />
		<label>Fecha Fin</label>
		<input type="date" id="txt_fechaFin"></input>
		<br/>
		<br/>
		<button id="btn_guardar">Buscar</button>
	</div>


	<br/>
	<br/>
	<div id ="dv_tabla">


	</div>
</div>


</div>
