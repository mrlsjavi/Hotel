<?php

class Rol_Model {

	public function __construct(){

			//parent::__construct();
			
	}

	public function guardar(){
		$info = json_decode($_POST['info']);

		$data = array(
			'id'=>'',
			'nombre'=>$info->nombre,
			'estado'=>1);


		$rol = new rol_orm($data);

		$result = $rol->save();

	 	echo json_encode($result);
	}

}

?>