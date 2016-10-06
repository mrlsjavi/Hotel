<?php
	error_reporting(E_ERROR | E_PARSE);
	class Reporte_Model{

		public function __construct(){

				//parent::__construct();

		}

		public function traer_habitaciones(){
			$general = new general_orm();
			$sql = "SELECT * FROM habitacion WHERE estado = 1";
			if(isset($_POST['info'])){
				$info = json_decode($_POST['info']);
				$sql .= " AND motel = ".$info->motel;
			}
			$habitaciones = $general::query($sql);
			$result = array('cod' => 1, 'datos' => $habitaciones);
			echo json_encode($result);
		}

		public function traer_moteles(){
			$moteles = motel_orm::where('estado', 1);
			$result = array('cod' => 1, 'datos' => $moteles);
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
			$date = date('Y-m-d', strtotime($info->fecha_inicio));
			$date2 = date('Y-m-d', strtotime($info->fecha_fin));
			$sql = "SELECT * FROM transaccion WHERE hora_inicio >='".$date." 00:00:00' AND hora_salida <='".$date2." 23:59:59'";
			if($info->habitacion != 0){
					$sql .=' AND habitacion = '.$info->habitacion;
			}
			if($info->motel != 0){
					$sql .=' AND motel = '.$info->motel;
			}
			$sql .=" order by habitacion, CAST(hora_inicio AS DATE)";

			$sql_resumen = "SELECT usuario, habitacion, motel, arduino, CAST(hora_inicio AS DATE) 'hora_inicio', CAST(hora_salida AS DATE) 'hora_salida', precio, sum(horas) 'horas' from transaccion WHERE hora_inicio >='".$date." 00:00:00' AND hora_salida <='".$date2." 23:59:59'";
			if($info->habitacion != 0){
					$sql_resumen .=' AND habitacion = '.$info->habitacion;
			}
			if($info->motel != 0){
					$sql_resumen .=' AND motel = '.$info->motel;
			}
			$sql_resumen .= "group by usuario, arduino, habitacion, motel, precio, CAST(hora_inicio AS DATE) order by habitacion, CAST(hora_inicio AS DATE)";
			$reportes = $general::query(($info->resumen == true )? $sql_resumen: $sql);
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

	}
 ?>
