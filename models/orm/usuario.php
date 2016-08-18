<?php 

	class usuario extends ORM {
		public $id, $nombre, $apellido, $password, $usuario, $rol, $obj_rol;
		protected static $table = 'usuario';

		public function __construct($data){
			parent::__construct(); //llamo el orm
			if($data && sizeof($data)){
				$this->populateFromRow($data);
			}
		}

		public function populateFromRow($data){

			$this->id = isset($data['id']) ? intval($data['id']) : null;
			$this->nombre = isset($data['nombre']) ? $data['nombre'] : null;
			$this->apellido = isset($data['apellido']) ? $data['apellido'] : null;
			$this->password = isset($data['password']) ? $data['password'] : null;
			$this->usuario = isset($data['usuario']) ? $data['usuario'] : null;
			$this->rol = isset($data['rol']) ? $data['rol'] : null;
			
			if($this->rol){
				//ya no puedo usar find, seria el where modificado, tengo que hacerlo 
				$this->obj_rol = rol::find($this->rol);				
			}

		}
	}

?>

