 <?php
	class Transaccion_Model{

		public function __construct(){

				//parent::__construct();

		}

		public function guardar(){
			$info = json_decode($_POST['info']);
			$data = array(
				'estado'=>$info->estado,
				'fecha' => $info->fecha,
        'motel' => $info->motel,
				'arduino' => $info->arduino,
				'habitacion' => $info->habitacion);

			$general = new general_orm();
			$registeredTransaction = $this->getTransaccionExistente($data['arduino'], $data['habitacion']);
			$promocion = $this->getPromocionActual($data['habitacion']);
      $precioCobrar = 0.0;

      if($registeredTransaction!=null){
				if($data['estado'] == 0){
					$transaccion = $registeredTransaction;
					$horaInicio = new DateTime($transaccion['hora_inicio']);
					$horaSalida = new DateTime($data['fecha']);
					$diffHoras = $horaInicio->diff($horaSalida);

          $habitacion = habitacion_orm::find($data['habitacion']);
          $motel = motel_orm::find($habitacion->motel);
          if($horaSalida > $motel->inicio_hora_libre && $horaSalida < $motel->fin_hora_libre){
            $diffHoras = $habitacion->duracion;
            $general::query('UPDATE transaccion SET hora_salida = \''.$data['fecha'].'\', horas='.$diffHoras.' WHERE arduino = '.$data['arduino'].' AND habitacion = '.$data['habitacion'].' AND id='.$transaccion['id'].' AND motel ='.$data['motel']);
            echo json_encode(array("cod" => 1, "msj" => "Actualizado Correctamente Hora Libre"));
          }else{
            $general::query('UPDATE transaccion SET hora_salida = \''.$data['fecha'].'\', horas='.$diffHoras->h.' WHERE arduino = '.$data['arduino'].' AND habitacion = '.$data['habitacion'].' AND id='.$transaccion['id'].' AND motel ='.$data['motel']);
            echo json_encode(array("cod" => 1, "msj" => "Actualizado Correctamente Hora Normal"));
          }
				}
			}else{
        if($promocion!= null){
          $habitacion = habitacion_orm::find($data['habitacion']);
          $motel = motel_orm::find($habitacion->motel);
          $diffHoras = strtotime($data['fecha']);
          $precio = 0.0;
          if(date('H:m:s', $diffHoras) > date('H:m:s', strtotime($motel->inicio_hora_libre)) && date('H:m:s', $diffHoras) < date('H:m:s', strtotime($motel->fin_hora_libre))){
            $precio = $promocion['precio_nocturno'];
          }else{
            $precio = $promocion['precio_normal'];
          }
          $registro = array(
            'estado'=>'',
            'usuario' => $this->getUsuarioResponsable(),
            'motel' => $data['motel'],
            'habitacion' => $data['habitacion'],
            'arduino' =>$data['arduino'],
            'hora_inicio' => $data['fecha'],
            'hora_salida' => null,
            'precio' => $precio,
            'horas' => 0
          );
          $transaccion = new transaccion_orm($registro);
          $resultado = $transaccion->save();
          echo json_encode($resultado);
        }else{
          $habitacion = habitacion_orm::find($data['habitacion']);
          $precio = $habitacion->precio;
          $registro = array(
            'estado'=>'',
            'usuario' => $this->getUsuarioResponsable(),
            'habitacion' => $data['habitacion'],
            'motel' => $data['motel'],
            'arduino' =>$data['arduino'],
            'hora_inicio' => $data['fecha'],
            'hora_salida' => null,
            'precio' => $precio,
            'horas' => 0
          );

          $transaccion = new transaccion_orm($registro);
          $resultado = $transaccion->save();
          echo json_encode($resultado);
        }
			}
		}

    public function getPromocionActual($habitacion){
      $date = date('Y-m-d H:m:s');
      $general = new general_orm();
      $promocion = $general::query("SELECT * FROM promocion_habitacion WHERE habitacion=".$habitacion." AND '".$date."' BETWEEN fecha_inicio AND fecha_fin");
      if($promocion!=null && count($promocion) > 0){
        return $promocion[0];
      }
      return null;
    }

    public function getUsuarioResponsable(){
      $general = new general_orm();
      $resultado = $general::query('SELECT usuario FROM responsable');
      if($resultado!= null && count($resultado) > 0){
        return $resultado[0]['usuario'];
      }
      return 0;
    }

    public function getTransaccionExistente($arduino, $habitacion){
      $general = new general_orm();
      $transaccion = $general::query('SELECT * FROM transaccion WHERE arduino = '.$arduino.' AND habitacion = '.$habitacion.' AND hora_salida is NULL');
      if($transaccion!=null && count($transaccion) > 0){
        return $transaccion[0];
      }
      return null;
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
