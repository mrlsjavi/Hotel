<?php


class Pagina_Model {

	public function __construct(){

			//parent::__construct();
			
	}

	public function guardar(){
		$info = json_decode($_POST['info']);
		$orden = $info->orden;
		//componer los ordenes antes de ingresar
		$general = new general_orm;
		$existe =  $general::query("select id from pagina where estado = 1 and orden =".$info->orden);
		if($existe){
			$r = $general::query("select id 
									from pagina
									where estado = 1 and orden > ".($info->orden - 1)." 
									order by orden");
			if($r){
				//
				$orden++;
				foreach($r as $u){
					$general::query("Update pagina set orden = ".$orden." where id =".$u['id']);
					$orden++;
				}
			}
		}
			

		$data = array(
			'id'=>'',
			'nombre'=>$info->nombre,
			'alias'=>$info->alias,
			'orden'=>$info->orden,
			'estado'=>1);


		$pagina = new pagina_orm($data);

		$result = $pagina->save();

	 	echo json_encode($result);
	}

	public function llenar_tabla(){
		$paginas = pagina_orm::where('estado', 1);

		$tabla = '<table id="javier" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Mostrar</th>
                <th>Orden</th>
                <th>Editar</th>
                <th>Eliminar</th>
                
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Nombre</th>
                <th>Mostrar</th>
                <th>Orden</th>
                <th>Editar</th>
                <th>Eliminar</th>
                
            </tr>
        </tfoot>
        <tbody id="">
         	  ';

        //validar si hay respuest
		foreach ($paginas as $p) {
			$tabla  = $tabla."<tr>
									<td>".$p->nombre."</td>
									<td>".$p->alias."</td>
									<td>".$p->orden."</td>
									<td class = 'editar'   id='".$p->id."'>Editar</td>
									<td class = 'eliminar' id='".$p->id."'>Eliminar</td>";
		}

		$tabla = $tabla.'</tbody>
   		</table>';
		echo $tabla;
	}

	public function eliminar(){
		$info = json_decode($_POST['info']);

		$result = pagina_orm::eliminar_logico($info->id);

	 	echo json_encode($result);
	}


	public function traer_dato(){
		$info = json_decode($_POST['info']);

		$pagina = pagina_orm::where("id", $info->id);
		


		$result = array('cod' => 1, 'datos' => $pagina);

	 	echo json_encode($result);
	}

	public function actualizar(){
		$info = json_decode($_POST['info']);
		$orden = $info->orden;
		$general = new general_orm;
		$existe =  $general::query("select id from pagina where estado = 1 and orden =".$info->orden);
		if($existe){
			$r = $general::query("select id 
									from pagina
									where estado = 1 and orden > ".($info->orden - 1)." 
									order by orden");
			if($r){
				//
				$orden++;
				foreach($r as $u){
					if($u['id'] != $info->id){
						$general::query("Update pagina set orden = ".$orden." where id =".$u['id']);
						$orden++;
					}
					
				}
			}
		}

		$data = array(
			'id'=>$info->id,
			'nombre'=>$info->nombre,
			'alias'=>$info->alias,
			'orden'=>$info->orden,
			'estado'=>1);


		$pagina = new pagina_orm($data);

		$result = $pagina->save();

	 	echo json_encode($result);
	}

}

?>