<?php
	class permiso_orm extends ORM {
		public $id, $pagina, $obj_pagina, $rol, $obj_rol, $estado;
		protected static $table = 'permiso_rol';

		public function __construct($data){
			parent::__construct(); //llamo el orm
			if($data && sizeof($data)){
				$this->populateFromRow($data);
			}
		}


		public function populateFromRow($data){

			$this->id = isset($data['id']) ? intval($data['id']) : null;

			$this->pagina = isset($data['pagina']) ? $data['pagina'] : null;

			if($this->pagina){
				$this->obj_pagina = pagina_orm::find($this->pagina);	
				
			}


			$this->rol = isset($data['rol']) ? $data['rol'] : null;

			if($this->rol){
				$this->obj_rol = rol_orm::find($this->rol);	
				
			}
			
			$this->estado = isset($data['estado']) ? intval($data['estado']) : null;
		


			
		}
	}


?>