<?php

	require_once('MySqlProvider.php');

	class Database {
		
		private $provider;
		private $params;
		private static $_con;

		public function __construct($provider, $host, $user, $pass, $db){
			if(!class_exists($provider)){
				throw new Exception("The provider doesn't exists or it wasn't implemented");		
			}

			$this->provider = new $provider;
			$this->provider->connect($host, $user, $pass, $db);

			if(!$this->provider->isConnected()){
				throw new Exception("We couldn't connect to the database >> $db");	
			} 
			else{
				$this->provider->setCharset('uft-8');
			}

		}


		public static function getConnection($provider, $host, $user, $pass, $db){
			//uso self para acceder desde el interior de una clase (acceder a elementos estaticos y constantes)
			//tambien llamado enlace estatico en tiempo de ejecucion 
			/*Use $this to refer to the current object. 
			Use self to refer to the current class. 
			In other words, use $this->member for non-static members, u
			se self::$member for static members.*/

			/* 
				lo que hago es preguntar a la clase si ella ya tiene una conexion 
				si la tiene tomo esa 
				si no creo una 
				//asi se implementa Singleton 
			*/
			if(self::$_con){
				return self::$_con;
			}
			else{
				$class = __CLASS__;
				self::$_con = new $class($provider, $host, $user, $pass, $db);
				return self::$_con;
			}
		}

		private function replaceParams(){
			$b = current($this->params);
			next($this->params);
			return $b;
		}

		private function prepare($sql, $params){
			$escaped = '';
			if($params){
				foreach($params as $key =>$value){
					if(is_bool($value)){
						$value = $value ? 1 : 0;
					}
					else if(is_double($value)){
						//search, replace, subject
						$value = str_replace(',', '.', $value);
					}
					else if(is_numeric($value)){
						if(is_string($value)){
							$value = "'".$this->provider->escape($value)."'";
						} 
						else {
							$value = $this->provider->escape($value);
						}
					}
					else if(is_null($value)){
						$value = "NULL";
					}
					else{
						$value = "'".$this->provider->escape($value)."'";
					}

					$escaped[] = $value;
				}
			}

			$this->params = $escaped;
			//pattern, callback, subject
			$q = preg_replace_callback("/(\?)/i", array($this, "replaceParams"), $sql);
			return $q;
		}

		private function sendQuery($q, $params){
			$query = $this->prepare($q, $params);
			$result = $this->provider->query($query);
			if($this->provider->getErrorNo()){
				error_log($this->provider->getError());
			}
			return $result;
		}

		public function executeScalar($q, $params = null){
			$result = $this->sendQuery($q, $params);
			if(!is_null($result)){
				if(!is_object($result)){
					return $result;
				}
				else {
					$row = $this->provider->fetchArray($result);
					return $row[0];
				}
			}
			return null;
		}

		public function execute($q, $array_index = null, $params = null){
			$result = $this->sendQuery($q, $params);
			//=== o !== si toman en cuenta el tipo de dato los de "solo 2 " no 
			if(((is_object($result)) || $this->provider->numRows($result) || $result) && ($result !== true && $result !== false)){
				$arr = array();
				while($row = $this->provider->fetchArray($result)){
					if($array_index){
						$arr[$row[$array_index]] = $row;
					}
					else {
						$arr[] = $row;
					}
				}

				return $arr;
			}
			return $this->provider->getErrorNo() ? false : true;
		}
		
		public function changeDB($database){
			$this->provider->changeDB($database);
		}

		public function getInsertedID(){
			return $this->provider->getInsertedID();
		}

		public function getError(){
			return $this->provider->getError();
		}

		public function __destruct(){
			$this->provider->disconnect();
		}

	}


?>


