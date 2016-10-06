<style type="text/css">

	.editar {color:blue;}
	.eliminar {color:red;}
	.clave {color:blue;}
</style>

<div>
	<div>
		<h1>Adiministracion de Usuarios</h1>
	</div>
	<div>
		<label>Nombre</label>
		<input type="text" id="txt_nombre"/>
		<br/>
		<br/>
		<label>login</label>
		<input type="text" id="txt_login"/>
		<br/>
		<br/>
		<label>Password</label>
		<input type="password" id="txt_pass"/>
		<br/>
		<br/>
		<label>Rol</label>
		<select id="slt_rol">
			<option value="1">Admin</option>
		</select>
		<br/>
		<br/>
		<label>Motel</label>
		<select id="slt_motel">

		</select>
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
		<label>Login</label>
		<input type="text" id="txt_EditarLogin"/>
		<br/>
		<br/>
		<label>Rol</label>
		<select id="slt_EditarRol">
			
		</select>
		<input type="hidden" id="txt_EditarId"/>
		<br/>
		<br/>
		<label>Motel</label>
		<select id="slt_EditarMotel">

		</select>
		<br/>
		<br/>
		<button id="btn_actualizar">Guardar</button>
	</div>
</div>

<div id="dv_clave" style=" padding: 20px; position:fixed; width:350px; height: 190px; top:0; left:0;   border:#333333 3px solid; background-color: #F8F8FF; color:#000000; display:none;" >
	<div style="position:fixed">
		<label>Nueva Clave:</label>
		<input type="password" id="txt_EditarPass"/>
		<input type="hidden" id="txt_EditarIdClave">

	</div>
	<br/>
	<br/>
	<button id="btn_ActualizarClave">Guardar</button>

</div>


</div>