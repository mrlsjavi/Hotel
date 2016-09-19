<style type="text/css">

	.editar {color:blue;}
	.eliminar {color:red;}
</style>

<div>
	<div>
	<h1>Administracion de Menu</h1>

	</div>
	<div>
		<label>Nombre</label>
		<input type="text" id="txt_nombre"/>
		<br/>
		<br/>
		<label>Mostrar</label>
		<input type="text" id="txt_alias"/>
		<br/>
		<br/>
		<label>Orden</label>
		<input type="number" id="txt_orden"/>
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
		<label>Nombre</label>
		<input type="text" id="txt_EditarNombre"/>
		<br/>
		<br/>
		<label>Mostrar</label>
		<input type="text" id="txt_EditarAlias"/>
		<br/>
		<br/>
		<label>Orden</label>
		<input type="number" id="txt_EditarOrden"/>
		<input type="hidden" id="txt_EditarId"/>
		<br/>
		<br/>
		<button id="btn_actualizar">Guardar</button>
	</div>
</div>

</div>

