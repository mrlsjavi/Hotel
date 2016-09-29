<?php
	class Promocion_Model{

		public function __construct(){

				//parent::__construct();

		}

		public function guardar(){
			$info = json_decode($_POST['info']);
			$data = array(
				'estado'=>$info->estado,
				'fecha' => $info->habitacion,
				'arduino' => $info->fecha_inicio,
				'habitacion' => $info->fecha_fin);

			$general = new general_orm();
			$registeredTransaction = $general::query('SELECT * FROM transaccion WHERE arduino = '.$data->arduino.' AND habitacion = '.$data->habitacion);
			if($registeredTransaction!=null && count($registeredTransaction) > 0){
				if($data->estado == 0){
					
				}
			}

			$transaccion = new transaccion_orm($data);
			try {
				$result = $transaccion->save();
				if($result == null){
					header("HTTP/1.1 505 Internal Error");
					echo json_encode("no se pudo insertar el registro");
					return;
				}
				echo json_encode($result);
			} catch (Exception $e) {
				echo json_encode($e->getMessage());
			}
		}

		public function traer_habitaciones(){
			$habitaciones = habitacion_orm::where('estado', 1);

			$result = array('cod' => 1, 'datos' => $habitaciones);

			echo json_encode($result);
		}

		public function traer_usuarios(){
			$usuarios = usuario_orm::where('estado', 1);

			$result = array('cod' => 1, 'datos' => $usuarios);

			echo json_encode($result);
		}

		public function llenar_tabla(){

		}


		public function eliminar(){

		}

		public function traer_dato(){
			$info = json_decode($_POST['info']);

			$transaccion = transaccion_orm::where("id", $info->id);



			$result = array('cod' => 1, 'datos' => $transaccion);

			echo json_encode($result);
		}

		public function actualizar(){

		}

	}
 ?>
