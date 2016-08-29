<?php 
	class ORM {
		private static $database;
		protected static $table;

		function __construct(){
			self::getConnection();
		}

		private static function getConnection(){
			require_once('Database.php');
			self::$database = Database::getConnection(DB_PROVIDER, DB_HOST, DB_USER, DB_PASSWORD, DB_DB);

		}

		public static function find($id){
			$results = self::where('id', $id);
			return $results[0];
		}

		public static function where($field, $value){
			$obj = null;
			self::getConnection();
		
			$query = "SELECT * FROM ".static:: $table." WHERE ". $field." = ? ";
		//	$query = "SELECT * FROM ".static:: $table." WHERE ". $field." = ? and estado = 1";
			$results = self::$database->execute($query, null, array($value));

			if($results){
				$class = get_called_class();
				for($i = 0; $i<sizeof($results); $i++){
					$obj[] = new $class($results[$i]);
				}
			}

			return $obj;
		}


		public static function where_grupos($quiniela, $fase){
			$obj = null;
			self::getConnection();
		
			$query = "SELECT * FROM ".static:: $table." WHERE quiniela = ".$quiniela." and fase = ".$fase;
		//	$query = "SELECT * FROM ".static:: $table." WHERE ". $field." = ? and estado = 1";
			$results = self::$database->execute($query, null, null);

			if($results){
				$class = get_called_class();
				for($i = 0; $i<sizeof($results); $i++){
					$obj[] = new $class($results[$i]);
				}
			}

			return $obj;
		}

		public static function where_login($user, $clave){
			$obj = null;
			self::getConnection();
		
			$query = "SELECT * FROM ".static:: $table." WHERE password = '".$clave."' and usuario = '".$user."'";
		//	$query = "SELECT * FROM ".static:: $table." WHERE ". $field." = ? and estado = 1";
			$results = self::$database->execute($query, null, null);

			if($results){
				$class = get_called_class();
				for($i = 0; $i<sizeof($results); $i++){
					$obj[] = new $class($results[$i]);
				}
			}

			return $obj;
			//return $query;
		}

		public static function where_pronostico($partido, $seleccion, $usuario){
			$obj = null;
			self::getConnection();
		
			$query = "SELECT * FROM ".static:: $table." WHERE  partido = ".$partido." and seleccion = ".$seleccion." and usuario = ".$usuario;
		//	$query = "SELECT * FROM ".static:: $table." WHERE ". $field." = ? and estado = 1";
			$results = self::$database->execute($query, null, null);

			if($results){
				$class = get_called_class();
				for($i = 0; $i<sizeof($results); $i++){
					$obj[] = new $class($results[$i]);
				}
			}

			return $obj;
		}
		
		public static function where_resultado($partido, $seleccion){
			$obj = null;
			self::getConnection();
		
			$query = "SELECT * FROM ".static:: $table." WHERE  partido = ".$partido." and seleccion = ".$seleccion;
		//	$query = "SELECT * FROM ".static:: $table." WHERE ". $field." = ? and estado = 1";
			$results = self::$database->execute($query, null, null);

			if($results){
				$class = get_called_class();
				for($i = 0; $i<sizeof($results); $i++){
					$obj[] = new $class($results[$i]);
				}
			}

			return $obj;
		}
		
		public static function like_tipo($field, $value){
			$obj = null;
			self::getConnection();
			$query = "SELECT * FROM ".static:: $table." where ". $field." like '%".$value."%' and tipo = 11";
			$results = self::$database->execute($query, null, null);
			if($results){
				$class = get_called_class();
				for($i = 0; $i<sizeof($results); $i++){
					$obj[] = new $class($results[$i]);
				}
			}
			return $obj;
			//return $query;
		}

		public static function like($field, $value){
			$obj = null;
			self::getConnection();
			$query = "SELECT * FROM ".static:: $table." where ". $field." like '%".$value."%'";
			$results = self::$database->execute($query, null, array($value));

			if($results){
				$class = get_called_class();
				for($i = 0; $i<sizeof($results); $i++){
					$obj[] = new $class($results[$i]);
				}
			}

			return $obj;
			//return $query;
		}
		//SELECT * FROM `Usuario` WHERE tipo <> 8
		public static function notwhere($field, $value){
			$obj = null;
			self::getConnection();
			$query = "SELECT * FROM ".static:: $table." WHERE ". $field." <> ?";
			$results = self::$database->execute($query, null, array($value));

			if($results){
				$class = get_called_class();
				for($i = 0; $i<sizeof($results); $i++){
					$obj[] = new $class($results[$i]);
				}
			}

			return $obj;
		}

		public static function between($field, $value1, $value2){
			$obj = null;
			self::getConnection();
			//SELECT * FROM usuario where ingreso BETWEEN '2016-03-12' and '2016-03-26'
			$query = "SELECT * FROM ".static:: $table." WHERE ". $field." between '".$value1."' and '".$value2."';";
			$results = self::$database->execute($query, null, null);

			if($results){
				$class = get_called_class();
				for($i = 0; $i<sizeof($results); $i++){
					$obj[] = new $class($results[$i]);
				}
			}

			return $obj;

		}

		public static function disponible($fumador, $capacidad, $restaurante, $hora, $dia){
			self::getConnection();
			$query = "SELECT mesa FROM mesa_restaurante 
						WHERE mesa IN (SELECT id FROM mesa WHERE fumador = $fumador AND capacidad >= $capacidad)
						AND restaurante = (SELECT id FROM restaurante WHERE titulo = '$restaurante')
						and mesa NOT IN (SELECT  mesa FROM reservacion WHERE hora = '$hora' and dia = '$dia')
						LIMIT 1;";
			$results = self::$database->execute($query, null, null);

			return $results;
		}

		public static function posiciones(){
			self::getConnection();
			$query = "select sum(ca.puntos) as puntos, us.nombre from punteo pu
							join calificacion ca on (pu.calificacion = ca.id)
							join usuario us on (pu.usuario = us.id)
							group by pu.usuario
							order by puntos desc";
			$results = self::$database->execute($query, null, null);

			return $results;
		}

		public static function horas($trabajador, $mes1, $mes2, $anio){
			self::getConnection();
			/*$query = "SELECT SUM( UNIX_TIMESTAMP( fin ) - UNIX_TIMESTAMP( inicio ) ) /3600 AS horas
							FROM marcaje
							WHERE usuario =$trabajador 
							ORDER BY inicio";*/

			$query = "SELECT SUM( UNIX_TIMESTAMP( fin ) - UNIX_TIMESTAMP( inicio ) ) /3600 AS horas
							FROM marcaje
							WHERE usuario = $trabajador and MONTH( inicio) >= $mes2 and  MONTH( inicio) <=$mes1 and YEAR(inicio) = $anio
							ORDER BY inicio";

			$results = self::$database->execute($query, null, null);

			return $results;
			//return $query;
		}


		

		public static function all($order = null){ //order = order by name 
			$objs = null;
			self::getConnection();
			$query = "SELECT * FROM ".static::$table;
			if($order){
				$query.=$order;
			}

			$results = self::$database->execute($query, null, null);

			if($results){
				$class = get_called_class();
				foreach($results as $index => $obj){
					$objs[] = new $class($obj);
				}
			}

			return $objs;
		}


		public function save(){
			$values = get_object_vars($this);
			$filtered = null;

			foreach($values as $key => $value){
				if($value !== null && $value !== '' && strpos($key, 'obj_') === false && $key !== 'id'){
					if($values === false){
						$value = 0;
					} 		

					$filtered[$key] = $value;
				}
			}


			$columns = array_keys($filtered);
			if($this->id){
				$columns = join(" = ?, ", $columns);
				$columns.= ' = ?';
				$query = "UPDATE ".static::$table." SET $columns WHERE id =".$this->id;
			}
			else {
				$params = join(", ", array_fill(0, count($columns), "?" ));
				$columns = join(", ", $columns);
				$query ="INSERT INTO ".static::$table." ($columns) VALUES ($params)";
			}

			$result = self::$database->execute($query, null, $filtered);

			if($result){
				//$result = array('ok' => false, 'message' =>self::$database->getInsertedID());	
				//$result = array('cod' => 1, 'msj' =>self::$database->getInsertedID());
				$result = array('cod' => 1, 'msj' => 'Operacion realizada con exito', 'ingreso'=>self::$database->getInsertedID());
			}
			else{
				$result = array('cod'=> 0, 'msj' =>self::$database->getError());
				//$result = array('cod'=> 0, 'msj' => 'Ha ocurrido un error, porfavor intentar en un momento');
			}

			return $result;

		}
	}
?>