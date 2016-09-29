<style type="text/css">
.label_titulo{
	width: 40%;
}.borrar{
	width: 55%;
}
	.editar {color:blue;}
	.eliminar {color:red;}
</style>

<div>
	<div>
	<h1>Administracion de Moteles</h1>

	</div>

	<div class="insertar">
		<label class="label_titulo">Nombre</label>
		<input class="borrar" type="text" id="nombre"/><br>
		<label class="label_titulo">Direccion</label>
		<input class="borrar" type="text" id="direccion"/><br>
		<label class="label_titulo">Inicio hora libre</label>
		<input class="borrar" type="text" id="inicio_hora_libre"/><br>
		<label class="label_titulo">Fin hora libre</label>
		<input class="borrar" type="text" id="fin_hora_libre"/><br>
		<label class="label_titulo">Tiempo gracias</label>
		<input class="borrar" type="text" id="tiempo_gracia"/><br>
		<label class="label_titulo">Columnas en matriz</label>
		<input class="borrar" type="text" id="columna_matriz"/><br>
		<label class="label_titulo">Filas en matriz</label>
		<input class="borrar" type="text" id="fila_matriz"/><br>
		
		<br/>
		<br/>
		<button id="btn_guardar">Guardar</button>
	</div>
	
	
	<br/>
	<br/>
	<div id ="dv_tabla">
		
		
	</div>

<div id="dv_edicion" style=" padding: 20px; position:fixed; width:350px; height: 400px; top:0; left:0;   border:#333333 3px solid; background-color: #F8F8FF; color:#000000; display:none;" >

	<div class="actualizar" style="position:fixed"> 
		<br>
		<h2>Actualizar</h2>
		<label class="label_titulo">Nombre</label>
		<input class="borrar" type="text" id="nombre"/><br>
		<label class="label_titulo">Direccion</label>
		<input class="borrar" type="text" id="direccion"/><br>
		<label class="label_titulo">Inicio hora libre</label>
		<input class="borrar" type="text" id="inicio_hora_libre"/><br>
		<label class="label_titulo">Fin hora libre</label>
		<input class="borrar" type="text" id="fin_hora_libre"/><br>
		<label class="label_titulo">Tiempo gracias</label>
		<input class="borrar" type="text" id="tiempo_gracia"/><br>
		<label class="label_titulo">Columnas en matriz</label>
		<input class="borrar" type="text" id="columna_matriz"/><br>
		<label class="label_titulo">Filas en matriz</label>
		<input class="borrar" type="text" id="fila_matriz"/><br>
		<br/>
		<br/>
		<button id="btn_actualizar">Actualizar</button>
	</div>
</div>


</div>
