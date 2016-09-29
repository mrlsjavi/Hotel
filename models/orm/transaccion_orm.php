<?php
	class transaccion_orm extends ORM {
		public $id, $usuario, $obj_usuario, $habitacion, $obj_habitacion, $arduino, $hora_inicio, $hora_salida, $precio, $horas;
		protected static $table = 'transaccion';

		public function __construct($data){
			parent::__construct(); //llamo el orm
			if($data && sizeof($data)){
				$this->populateFromRow($data);
			}
		}


		public function populateFromRow($data){

			$this->id = isset($data['id']) ? intval($data['id']) : null;

			$this->usuario = isset($data['usuario']) ? $data['usuario'] : null;
			if($this->usuario){
				//ya no puedo usar find, seria el where modificado, tengo que hacerlo
				$this->obj_usuario = usuario_orm::find($this->usuario);

			}

			$this->habitacion = isset($data['habitacion']) ? $data['habitacion'] : null;
			if($this->habitacion){
				//ya no puedo usar find, seria el where modificado, tengo que hacerlo
				$this->obj_habitacion = habitacion_orm::find($this->habitacion);

			}

			$this->arduino = isset($data['arduino']) ? $data['arduino'] : null;
			$this->hora_inicio = isset($data['hora_inicio']) ? $data['hora_inicio'] : null;
			$this->hora_salida = isset($data['hora_salida']) ? $data['hora_salida'] : null;
			$this->precio = isset($data['precio']) ? $data['precio'] : null;
			$this->horas = isset($data['horas']) ? $data['horas'] : null;
		}
	}
 ?>
