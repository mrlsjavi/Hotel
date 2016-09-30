<?php
	class habitacion_orm extends ORM {
		public $id, $motel, $obj_motel, $nombre, $precio, $duracion, $columna_matriz, $fila_matriz, $estado;
		protected static $table = 'habitacion';

		public function __construct($data){
			parent::__construct(); //llamo el orm
			if($data && sizeof($data)){
				$this->populateFromRow($data);
			}
		}


		public function populateFromRow($data){

			$this->id = isset($data['id']) ? intval($data['id']) : null;

			$this->motel = isset($data['motel']) ? intval($data['motel']) : null;
			if($this->motel){
				//ya no puedo usar find, seria el where modificado, tengo que hacerlo 
				$this->obj_motel = motel_orm::find($this->motel);	
				
			}
			$this->nombre = isset($data['nombre']) ? $data['nombre'] : null;
			$this->precio = isset($data['precio']) ? $data['precio'] : null;
			$this->duracion = isset($data['duracion']) ? $data['duracion'] : null;
			$this->columna_matriz = isset($data['columna_matriz']) ? $data['columna_matriz'] : null;
			$this->fila_matriz = isset($data['fila_matriz']) ? $data['fila_matriz'] : null;
			$this->estado = isset($data['estado']) ? intval($data['estado']) : null;
		


			
		}
	}


?>