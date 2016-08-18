<?php 

	class fase extends ORM {
		public $id, $nombre;
		protected static $table = 'fase';

		public function __construct($data){
			parent::__construct(); //llamo el orm
			if($data && sizeof($data)){
				$this->populateFromRow($data);
			}
		}

		public function populateFromRow($data){

			$this->id = isset($data['id']) ? intval($data['id']) : null;
			$this->nombre = isset($data['nombre']) ? $data['nombre'] : null;
			
			
		}
	}

?>
