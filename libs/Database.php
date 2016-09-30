<?php

	class Database extends PDO{

		public function __construct($DB_TYPE, $DB_HOST, $DB_NAME, $DB_USER, $DB_PASS){
			//base de datos, usuario, clave
			parent::__construct($DB_TYPE.':host='.$DB_HOST.';dbname='.$DB_NAME, $DB_USER, $DB_PASS);

			//parent::setAtribute(PDO::ATTR_ERRCODE, PDO::ERRCODE_EXCEPTION);
		}

		/*
			string sql is an sql string
			array $array parameter bind
			fetchmode  is a PDO FETCH mode 
			mixed -- result
		*/
		public function select($sql, $array = array(), $fetchMode = PDO::FETCH_ASSOC){
			
			$sth = $this->prepare($sql);

			foreach ($array as $key => $value){
				$sth->bindValue("$key", $value);
			}

			$sth->execute();

			return $sth->fetchAll($fetchMode);

		}

		/*
			insert 
			stringtable - a name of a table to insert into 
			string data - an associative array
		*/

		public function insert($table, $data){

			ksort($data);

			//crear lista con los field names y field values 
			$fieldNames = implode(',', array_keys($data));
			$fieldValues = ':'.implode(', :', array_keys($data));

		
			
			$sth = $this->prepare("INSERT INTO $table 
						($fieldNames)
				values($fieldValues)");

			foreach ($data as $key => $value){
				$sth->bindValue(":$key", $value);
			}

			

			$sth->execute();

		}

		/*
			insert 
			stringtable - a name of a table to insert into 
			string data - an associative array
			string where- the where QUERY part
		*/
		public function update($table, $data, $where){



			ksort($data);

			$fieldDetails = NULL;

			foreach($data as $key=> $value){
				$fieldDetails .= "`$key`=:$key,";
			}

			$fieldDetails = rtrim($fieldDetails, ',');
			
			$sth = $this->prepare("UPDATE $table SET $fieldDetails WHERE $where");

			foreach ($data as $key => $value){
				$sth->bindValue(":$key", $value);
			}

			

			$sth->execute();

		}

 		/*
			string table
			string where
			integer limit
			return integer only afected
 		*/
		public function delete($table, $where, $limit = 1){

			return $this->exec("DELETE FROM $table WHERE $where LIMIT $limit");
			//devuelve las filas afectadas
			

		}
	}