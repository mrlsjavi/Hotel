<?php
	class usuario_orm extends ORM {
		public $id, $nombre,  $apellido, $password, $rol, $obj_rol, $estado;
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
			$this->rol = isset($data['rol']) ? $data['rol'] : null;

			if($this->rol){
				$this->obj_rol = rol_orm::find($this->rol);	
				
			}
			
			$this->estado = isset($data['estado']) ? intval($data['estado']) : null;
		


			
		}
	}


?>