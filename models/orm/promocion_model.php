<?php
	class Promocion_Model{

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
			$promociones = promocion_orm::where('estado', 1);

			$tabla = '<table id="promociones" class="display" cellspacing="0" width="100%">
					<thead>
							<tr>
									<th>Habitacion</th>
									<th>Fecha Inicio</th>
									<th>Fecha Fin</th>
									<th>Precio Normal</th>
									<th>Precio Nocturno</th>
									<th>Editar</th>
									<th>Eliminar</th>
							</tr>
					</thead>
					<tfoot>
							<tr>
									<th>Habitacion</th>
									<th>Fecha Inicio</th>
									<th>Fecha Fin</th>
									<th>Precio Normal</th>
									<th>Precio Nocturno</th>
									<th>Editar</th>
									<th>Eliminar</th>
							</tr>
					</tfoot>
					<tbody id="promociones_body">
					';

				//validar si hay respuest
				if(is_array($promociones) && count($promociones)> 0){
					foreach ($promociones as $p) {
						$tabla  = $tabla."<tr style=\"text-align: center;\">
												<td>".$p->habitacion."</td>
												<td>".$p->fecha_inicio."</td>
												<td>".$p->fecha_fin."</td>
												<td>".$p->precio_normal."</td>
												<td>".$p->precio_nocturno."</td>
												<td class = 'editar'   id='".$p->id."'>Editar</td>
												<td class = 'eliminar' id='".$p->id."'>Eliminar</td>";
					}
				}
			$tabla = $tabla.'</tbody>
				</table>';
			echo $tabla;
		}


		public function eliminar(){
			$info = json_decode($_POST['info']);

			$result = promocion_orm::eliminar_logico($info->id);

			echo json_encode($result);
		}

		public function traer_dato(){
			$info = json_decode($_POST['info']);

			$promocion = promocion_orm::where("id", $info->id);



			$result = array('cod' => 1, 'datos' => $promocion);

			echo json_encode($result);
		}

		public function actualizar(){
			$info = json_decode($_POST['info']);

			$data = array(
				'id' => $info->id,
				'habitacion' => $info->habitacion,
				'fecha_inicio' => $info->fecha_inicio,
				'fecha_fin' => $info->fecha_fin,
				'precio_normal' => $info->precio_normal,
				'precio_nocturno' => $info->precio_nocturno,
				'estado'=>1);


			$promocion = new promocion_orm($data);

			$result = $promocion->save();

			echo json_encode($result);
		}

	}
 ?>
