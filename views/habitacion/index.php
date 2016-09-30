<style type="text/css">

	.editar {color:blue;}
	.eliminar {color:red;}
</style>

<div>
	<div>
	<h1>Administracion de Moteles</h1>

	</div>

	<div>
		<label>Motel</label>
		<input type="text" id="select_motel"></input>
		<br/>
		<label>Nombre</label>
		<input type="text" id="txt_nombre"></input>
		<br />
		<label>Precio</label>
		<input type="number" id="nmb_precio"></input>
		<br />
		<label>Duracion</label>
		<input type="number" id="nmb_duracion"></input>
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
		<label>Motel</label>
		<select type="text" id="select_EditarMotel"></select>
		<input type="hidden" id="txt_EditarId"/>
		<br />
		<label>Nombre</label>
		<input type="text" id="txt_EditarNombre"></input>
		<br  />
		<label>Precio</label>
		<input type="number" id="nmb_EditarPrecio"></input>
		<br />
		<label>Duracion</label>
		<input type="number" id="nmb_EditarDuracion"></input>
		<br />
		<br />
		<button id="btn_actualizar">Actualizar</button>
	</div>
</div>


</div>
