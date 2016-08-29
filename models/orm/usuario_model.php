<?php


class Usuario_Model {

	public function __construct(){

			//parent::__construct();
			
	}

	public function guardar(){
		$info = json_decode($_POST['info']);
		

		$data = array(
			'id'=>'',
			'nombre'=>$info->nombre,
			'apellido'=>$info->apellido,
			'password'=>md5($info->password),
			'rol'=>$info->rol,
			'estado'=>1);


		$usuario = new usuario_orm($data);

		$result = $usuario->save();

	 	echo json_encode($result);
	}

}

?>