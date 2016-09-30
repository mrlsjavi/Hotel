<?php 
require_once('DatabaseProvider.php');

class MysqlProvider extends DatabaseProvider{

	public function connect($host, $user, $pass, $dbname){
		//puedo usar this resource porque estoy entrando al resource que defini en databaseprovider desde aqui que es donde lo estoy implementando 
		$this->resource = new mysqli($host, $user, $pass, $dbname);//tenog la base 
		if($this->resource->connect_errno){
			//falla la coneccion 
			error_log($this->resource->connect_error);
		}

		return $this->resource;
	}

	public function disconnect(){
		return $this->resource->close();
	}

	public function getErrorNo(){
		return $this->resource->errno;
	}

	public function getError(){
		return $this->resource->error;
	}

	public function query($q){
		return $this->resource->query($q);
	}

	public function numRows($resource){
		$num_rows = 0;
		/*if($resource){
			$num_rows = $resource->num_rows;
		}*/

		if ($resource !== false && $resource !== true){
            $num_rows = $resource->num_rows;
        }

		return $num_rows;
	}

	public function fetchArray($result){
		return $result->fetch_assoc();
	}

	public function isConnected(){
		return !is_null($this->resource);
	}

	public function escape($var){
		return $this->resource->real_escape_string($var);
	}

	public function getInsertedID(){
		return $this->resource->insert_id;
	}

	public function changeDB($database){
		return $this->resource->select_db($database);
	}

	public function setCharset($charset){
		return $this->resource->set_charset($charset);
	}

}


?>