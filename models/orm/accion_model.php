<?php


class Accion_Model {

	public function __construct(){

			//parent::__construct();
			
	}

	public function guardar(){
		$info = json_decode($_POST['info']);

		$data = array(
			'id'=>'',
			'nombre'=>$info->nombre,
			'estado'=>1);


		$accion = new accion_orm($data);

		$result = $accion->save();

	 	echo json_encode($result);
	}

}

?>