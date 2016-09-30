<?php
	class motel_orm extends ORM {
		public $id, $nombre, $direccion, $inicio_hora_libre, $fin_hora_libre, $tiempo_gracia, $columna_matriz, $fila_matriz, $estado;
		protected static $table = 'motel';

		public function __construct($data){
			parent::__construct(); //llamo el orm
			if($data && sizeof($data)){
				$this->populateFromRow($data);
			}
		}


		public function populateFromRow($data){

			$this->id = isset($data['id']) ? intval($data['id']) : null;

			$this->nombre = isset($data['nombre']) ? $data['nombre'] : null;		
			$this->direccion = isset($data['direccion']) ? $data['direccion'] : null;	
			$this->inicio_hora_libre = isset($data['inicio_hora_libre']) ? $data['inicio_hora_libre'] : null;
			$this->fin_hora_libre = isset($data['fin_hora_libre']) ? $data['fin_hora_libre'] : null;
			$this->tiempo_gracia = isset($data['tiempo_gracia']) ? $data['tiempo_gracia'] : null;
			$this->columna_matriz = isset($data['columna_matriz']) ? $data['columna_matriz'] : null;
			$this->fila_matriz = isset($data['fila_matriz']) ? $data['fila_matriz'] : null;
			$this->estado = isset($data['estado']) ? intval($data['estado']) : null;
		


			
		}
	}


?>