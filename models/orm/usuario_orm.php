<?php 
require_once('ORM_imp.php');
	class usuario_orm extends ORM_imp{
		public $id, $nombre, $apellido, $estado, $ingreso, $tipo, $obj_tipo, $jornada, $obj_jornada; 
		protected static $table = 'Usuario';

		public function __construct(){
			parent::__construct();
		}

		//public function 

		/*public function __construct($data){
			parent::__construct(); //llamo el orm
			if($data && sizeof($data)){
				$this->populateFromRow($data);
			}
		}*/

		public function populateFromRow($data){

			$this->id = isset($data['id']) ? intval($data['id']) : null;
			$this->nombre = isset($data['nombre']) ? $data['nombre'] : null;
			$this->apellido = isset($data['apellido']) ? $data['apellido'] : null;
			$this->estado = isset($data['estado']) ? $data['estado'] : null;
			$this->ingreso = isset($data['ingreso']) ? $data['ingreso'] : null;
			$this->tipo = isset($data['tipo']) ? $data['tipo'] : null;

			if($this->tipo){
				//ya no puedo usar find, seria el where modificado, tengo que hacerlo 
				$this->obj_tipo = puesto_model::find($this->tipo);	
				
			}
			$this->jornada= isset($data['jornada']) ? $data['jornada'] : null;
			if($this->jornada){
				//ya no puedo usar find, seria el where modificado, tengo que hacerlo 
				$this->obj_jornada = jornada_model::find($this->jornada);	
				
			}

		}
	}

?>
