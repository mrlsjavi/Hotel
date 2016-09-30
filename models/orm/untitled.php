<?php

	public function eliminar_logico(){
		$query = "UPDATE ".static::$table." SET estado = 0 WHERE id =".$this->id;
		$result = self::$database->execute($query, null, null);
		if($result){
				//$result = array('ok' => false, 'message' =>self::$database->getInsertedID());	
				//$result = array('cod' => 1, 'msj' =>self::$database->getInsertedID());
				$result = array('cod' => 1, 'msj' => 'Operacion realizada con exito');
			}
			else{
				$result = array('cod'=> 0, 'msj' =>self::$database->getError());
				//$result = array('cod'=> 0, 'msj' => 'Ha ocurrido un error, porfavor intentar en un momento');
			}

			return $result;

	}

?>