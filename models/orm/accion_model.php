<?php


class Accion_Model {

	public function __construct(){

			//parent::__construct();
			
	}

	public function guardar(){
		$values = json_decode($_POST['values']);

		$data = array(
			'id'=>'',
			'nombre'=>$values->nombre);


		$seleccion = new seleccion($data);

		$result = $seleccion->save();

	 	echo json_encode($result);
	}

}

?>