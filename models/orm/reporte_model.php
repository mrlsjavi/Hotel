<?php
	error_reporting(E_ERROR | E_PARSE);
	class Reporte_Model{

		public function __construct(){

				//parent::__construct();

		}

		public function guardar(){
			$info = json_decode($_POST['info']);
			$data = array(
				'id'=>'',
				'habitacion' => $info->habitacion,
				'fecha_inicio' => $info->fecha_inicio,
				'fecha_fin' => $info->fecha_fin,
				'precio_normal' => $info->precio_normal,
				'precio_nocturno' => $info->precio_nocturno,
				'estado'=>1);


			$promocion = new promocion_orm($data);
			try {
				$result = $promocion->save();
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
			$info = json_decode($_POST['info']);
			$general = new general_orm();
			$reportes = $general::query("SELECT * FROM transaccion WHERE hora_inicio >='".$info->fecha_inicio."' AND hora_salida <='".$info->fecha_fin." AND habitacion");

			$tabla = '<table id="reporte" class="display" cellspacing="0" width="100%">
					<thead>
							<tr>
									<th>Habitacion</th>
									<th>Fecha Inicio</th>
									<th>Fecha Fin</th>
									<th>Precio</th>
									<th>Horas</th>
									<th>Total</th>
							</tr>
					</thead>
					<tfoot>
							<tr>
									<th>Habitacion</th>
									<th>Fecha Inicio</th>
									<th>Fecha Fin</th>
									<th>Precio</th>
									<th>Horas</th>
									<th>Total</th>
							</tr>
					</tfoot>
					<tbody id="reporte_body">
					';

				//validar si hay respuest
				if(is_array($reportes) && count($reportes)> 0){
					foreach ($reportes as $d) {
						$tabla  = $tabla."<tr style=\"text-align: center;\">
												<td>".$d['habitacion']."</td>
												<td>".$d['hora_inicio']."</td>
												<td>".$d['hora_salida']."</td>
												<td>".$d['precio']."</td>
												<td>".$d['horas']."</td>
												<td>".($d['horas']*$d['precio'])."</td>";
					}
				}
			$tabla = $tabla.'</tbody>
				</table>';
			echo $tabla;
		}

		public function traer_dato(){
			$info = json_decode($_POST['info']);

			$promocion = promocion_orm::where("id", $info->id);



			$result = array('cod' => 1, 'datos' => $promocion);

			echo json_encode($result);
		}

	}
 ?>
