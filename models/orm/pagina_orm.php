<?php
	class pagina_orm extends ORM {
		public $id, $nombre, $alias, $orden, $estado;
		protected static $table = 'pagina';

		public function __construct($data){
			parent::__construct(); //llamo el orm
			if($data && sizeof($data)){
				$this->populateFromRow($data);
			}
		}


		public function populateFromRow($data){

			$this->id = isset($data['id']) ? intval($data['id']) : null;

			$this->nombre = isset($data['nombre']) ? $data['nombre'] : null;			
			$this->alias = isset($data['alias']) ? $data['alias'] : null;
			$this->orden = isset($data['orden']) ? $data['orden'] : null;
			
			$this->estado = isset($data['estado']) ? intval($data['estado']) : null;
		


			
		}
	}


?>