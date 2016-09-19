<?php 
	class Promociones_Model extends Model{

		$table_name = "promocion_habitacion"; 
		public function __construct(){
			parent::__construct();	
		}

		public function promocionesList(){
			return $this->db->select('SELECT * FROM '.$table_name);
		}

		public function promocionesGet($id){
			return $this->db->select('SELECT * FROM '.$table_name.' WHERE id = :id', array('id' =>$id));
		}

		public function createPromocion($data){
			$this->db->insert($table_name, 
				array(
					'habitacion' => $data['habitacion'],
					'fecha_inicio' => $data['fecha_inicio'],
					'fecha_fin' => $data['fecha_fin'],
					'precio_normal'=> $data['precio_normal'],
					'precio_nocturno'=> $data['precio_nocturno'],
					'estado'=> 1,
			));
		}

		public function createPromocion($data){
			$this->db->delete($table_name, 
				array(
					'habitacion' => $data['habitacion'],
					'fecha_inicio' => $data['fecha_inicio'],
					'fecha_fin' => $data['fecha_fin'],
					'precio_normal'=> $data['precio_normal'],
					'precio_nocturno'=> $data['precio_nocturno'],
					'estado'=> 1,
			));
		}

	}
 ?>