<?php

class Permiso_Model {

	public function __construct(){

			//parent::__construct();
			
	}

	public function guardar(){
		$info = json_decode($_POST['info']);
		$id = $info->nuevos;
		$rol = $info->rol;

		$general = new general_orm;

		//tengo que recibir el id del rol tambien
		$longitud =  count($id);
		$nuevos='';
		for($i=0; $i<$longitud; $i++){
			if($i == ($longitud-1)){
				$nuevos = $nuevos.$id[$i];
			}
			else{
				$nuevos = $nuevos.$id[$i].',';
			}
			
		}

		//caso 1 agregar logico
		$result = $general::query("select id 
									from permiso_rol
									where pagina in (".$nuevos.")
									and estado = 0
									and rol = ".$rol);

		if($result){
			foreach($result as $r){
				$general::query("update permiso_rol set estado = 1 where id =".$r['id']);
			}
		}
		$result = '';
		//caso2 eliminado logico
		$result = $general::query("select id 
									from permiso_rol
									where pagina not in (".$nuevos.")
									and estado = 1
									and rol = ".$rol);

		if($result){
			foreach ($result as $r) {
				permiso_orm::eliminar_logico($r['id']);
			}
		}
		$result = '';
		//caso 3 agregar los nuevos
		$result = $general::query("select p.id 
									from pagina as p
									where p.id not in (select pagina 
															from permiso_rol 
															where pagina in (".$nuevos.")
															and rol = ".$rol."
															and estado = 1)
									and p.id in (".$nuevos.")");

		if($result){
			foreach($result as $r){
				$data = array(
					'id'=>'',
					'pagina'=>$r['id'],
					'rol'=>$rol,
					'estado'=>1);
				$permiso = new permiso_orm($data);
				$result = $permiso->save();
			}
		}

		echo "Cambios realizados";

//		echo $nuevos;
		//echo $id[0];
		

		/*$data = array(
			'id'=>'',
			'nombre'=>$info->nombre,
			'estado'=>1);


		$rol = new rol_orm($data);

		$result = $rol->save();

	 	echo json_encode($result);*/
	}


	public function llenar_tabla(){
		$roles = rol_orm::where('estado', 1);

		$tabla = '<table id="javier" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Editar</th>
                <th>Eliminar</th>
                
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Nombre</th>
                <th>Editar</th>
                <th>Eliminar</th>
                
            </tr>
        </tfoot>
        <tbody id="">
         	
         	
        ';

        //validar si hay respuest
		foreach ($roles as $r) {
			$tabla  = $tabla."<tr>
									<td>".$r->nombre."</td>
									<td class = 'editar'   id='".$r->id."'>Editar</td>
									<td class = 'eliminar' id='".$r->id."'>Eliminar</td>";
		}

		$tabla = $tabla.'</tbody>
   		</table>';
		echo $tabla;
	}

	public function traer_roles(){
		$roles = rol_orm::where('estado', 1);
		$select = "<option value='0'>Seleccione:</option>";

		if($roles){
			foreach($roles as $r){
				$select = $select."<option value='".$r->id."'>".$r->nombre."</option>";
			}
		}

		echo $select;
	}

	public function traer_paginas(){
		
		$info = json_decode($_POST['info']);
		$rol = $info->id;
		//tengo que validar si ese rol tiene o no tiene ya roles asignados

		$general = new general_orm;
		$result = $general::query("select p.id, p.nombre
									from pagina as p
									where p.id not in (select pagina 
															from permiso_rol 
															where rol = ".$rol."
															and estado = 1)
									and p.estado = 1");

		
			$tabla = '<div class="div">
						<select name="origen[]" id="origen" multiple="multiple" size="8" class="select">';
			if($result){
				foreach($result as $r){
					$tabla = $tabla.'<option value="'.$r['id'].'">'.$r['nombre'].'</option>';
								
				}
			}
			$tabla = $tabla.'</select>
		</div>
		<div class ="div">
			<input type="button" class="pasar izq" value="Pasar »"><input type="button" class="quitar der" value="« Quitar"><br />
			<input type="button" class="pasartodos izq" value="Todos »"><input type="button" class="quitartodos der" value="« Todos">
		</div>
		<div class="div">
			<select name="destino[]" id="destino" multiple="multiple" size="8" class="select">';

			$result = $general::query("select p.id, p.nombre
										from pagina as p
										join permiso_rol as pr on pr.pagina = p.id where pr.rol = ".$rol." and pr.estado = 1
										and p.estado = 1");

			if($result){
			
			foreach($result as $r){
				$tabla = $tabla.'<option value="'.$r['id'].'">'.$r['nombre'].'</option>';
							
			}

			}	
			$tabla = $tabla.'</select>
		</div>
		<p class="clear"><input type="submit" class="submit" value="Guardar Cambios"></p>';
		

		echo $tabla;
	
	

	}
}

?>