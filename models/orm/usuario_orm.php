<?php
	class usuario_orm extends ORM {
		public $id, $rol, $obj_rol, $nombre, $login, $password, $estado;
		protected static $table = 'usuario';

		public function __construct($data){
			parent::__construct(); //llamo el orm
			if($data && sizeof($data)){
				$this->populateFromRow($data);
			}
		}


		public function populateFromRow($data){

			$this->id = isset($data['id']) ? intval($data['id']) : null;

			$this->rol = isset($data['rol']) ? $data['rol'] : null;

			if($this->rol){
				$this->obj_rol = rol_orm::find($this->rol);	
				
			}

			$this->nombre = isset($data['nombre']) ? $data['nombre'] : null;
			$this->login = isset($data['login']) ? $data['login'] : null;
			$this->password = isset($data['password']) ? $data['password'] : null;
			$this->estado = isset($data['estado']) ? intval($data['estado']) : null;
		


			
		}
	}


?>