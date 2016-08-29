<?php


class Pagina_Model {

	public function __construct(){

			//parent::__construct();
			
	}

	public function guardar(){
		$info = json_decode($_POST['info']);

		$data = array(
			'id'=>'',
			'nombre'=>$info->nombre,
			'padre'=>$info->padre,
			'alias'=>$info->alias,
			'orden'=>$info->orden,
			'estado'=>1);


		$pagina = new pagina_orm($data);

		$result = $pagina->save();

	 	echo json_encode($result);
	}

}

?>