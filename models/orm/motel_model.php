<?php

class Motel_Model {

	public function __construct(){

			//parent::__construct();
			
	}

	public function guardar(){
		$info = json_decode($_POST['info']);

		$data = array(
			'id'=>'',
			'nombre'=>$info->nombre,
			'direccion'=>$info->direccion,
			'inicio_hora_libre'=>$info->inicio_hora_libre,
			'fin_hora_libre'=>$info->fin_hora_libre,
			'tiempo_gracia'=>$info->tiempo_gracia,
			'columna_matriz'=>$info->columna_matriz,
			'fila_matriz'=>$info->fila_matriz,
			'estado'=>1);


		$rol = new motel_orm($data);

		$result = $rol->save();

	 	echo json_encode($result);
	}


	public function llenar_tabla(){
		$roles = motel_orm::where('estado', 1);

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


	public function eliminar(){
		$info = json_decode($_POST['info']);

		$result = motel_orm::eliminar_logico($info->id);

	 	echo json_encode($result);
	}

	public function traer_dato(){
		$info = json_decode($_POST['info']);

		$rol = motel_orm::where("id", $info->id);
		


		$result = array('cod' => 1, 'datos' => $rol);

	 	echo json_encode($result);
	}

	public function actualizar(){
		$info = json_decode($_POST['info']);

		$data = array(
			'id'=>$info->id,
			'nombre'=>$info->nombre,
			'direccion'=>$info->direccion,
			'inicio_hora_libre'=>$info->inicio_hora_libre,
			'fin_hora_libre'=>$info->fin_hora_libre,
			'tiempo_gracia'=>$info->tiempo_gracia,
			'columna_matriz'=>$info->columna_matriz,
			'fila_matriz'=>$info->fila_matriz,
			'estado'=>1);


		$rol = new motel_orm($data);

		$result = $rol->save();

	 	echo json_encode($result);
	}

}

?>