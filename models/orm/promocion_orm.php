<?php
	class promocion_orm extends ORM {
		public $id, $habitacion, $obj_habitacion, $fecha_inicio, $fecha_fin, $precio_normal, $precio_nocturno, $estado;
		protected static $table = 'promocion_habitacion';

		public function __construct($data){
			parent::__construct(); //llamo el orm
			if($data && sizeof($data)){
				$this->populateFromRow($data);
			}
		}


		public function populateFromRow($data){

			$this->id = isset($data['id']) ? intval($data['id']) : null;
			$this->habitacion = isset($data['habitacion']) ? $data['habitacion'] : null;
			if($this->habitacion){
				//ya no puedo usar find, seria el where modificado, tengo que hacerlo 
				$this->obj_habitacion = habitacion_orm::find($this->habitacion);	
				
			}
			
			$this->fecha_inicio = isset($data['fecha_inicio']) ? $data['fecha_inicio'] : null;
			$this->fecha_fin = isset($data['fecha_fin']) ? $data['fecha_fin'] : null;
			$this->precio_normal = isset($data['precio_normal']) ? $data['precio_normal'] : null;
			$this->precio_nocturno = isset($data['precio_nocturno']) ? $data['precio_nocturno'] : null;


			

			
			$this->estado = isset($data['estado']) ? intval($data['estado']) : null;
			
		}
	}
 ?>