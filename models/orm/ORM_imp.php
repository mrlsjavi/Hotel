<?php 
require_once('IORM.php');

	class ORM_imp implements IORM{
		private static $database;
		protected static $table;

		function __construct(){
			self::getConnection();
		}

		public static function getConnection(){
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
			$query = "SELECT * FROM ".static:: $table." WHERE ". $field." = ?";
			$results = self::$database->execute($query, null, array($value));

			if($results){
				$class = get_called_class();
				for($i = 0; $i<sizeof($results); $i++){
					$obj[] = new $class($results[$i]);
				}
			}

			return $obj;
		}

		public static function like($field, $value){
			$obj = null;
			self::getConnection();
			$query = "SELECT * FROM ".static:: $table." WHERE ". $field." = ?";
			$results = self::$database->execute($query, null, array($value));

			if($results){
				$class = get_called_class();
				for($i = 0; $i<sizeof($results); $i++){
					$obj[] = new $class($results[$i]);
				}
			}

			return $obj;
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


		public static function horas($trabajador){
			self::getConnection();
			$query = "SELECT SUM( UNIX_TIMESTAMP( fin ) - UNIX_TIMESTAMP( inicio ) ) /3600 AS horas
							FROM marcaje
							WHERE usuario =$trabajador
							ORDER BY inicio";

			$results = self::$database->execute($query, null, null);

			return $results;
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
				//$result = array('cod'=> 0, 'msj' =>self::$database->getError());
				$result = array('cod'=> 0, 'msj' => 'Ha ocurrido un error, porfavor intentar en un momento');
			}

			return $result;

		}
	}
?>