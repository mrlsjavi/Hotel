<?php
	class rol_orm extends ORM {
		public $id, $nombre,  $estado;
		protected static $table = 'rol';

		public function __construct($data){
			parent::__construct(); //llamo el orm
			if($data && sizeof($data)){
				$this->populateFromRow($data);
			}
		}


		public function populateFromRow($data){

			$this->id = isset($data['id']) ? intval($data['id']) : null;

			$this->nombre = isset($data['nombre']) ? $data['nombre'] : null;
			
			
			$this->estado = isset($data['estado']) ? intval($data['estado']) : null;
		


			
		}
	}


?>