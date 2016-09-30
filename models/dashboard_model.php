<?php
//bussines logic
class Dashboard_Model extends Model{

	function __construct(){
		//para que inicialize el constructor del modal 
		parent::__construct();
	}

	function xhrInsert(){
		$text = $_POST['text'];

		$this->db->insert('data', array('text' => $text));

		$data = array('text'=>$text, 'dataid'=>$this->db->lastInsertId());

		echo json_encode($data);
	}


	function xhrGetListings(){//este trae los que ya estan ingresados

		$result = $this->db->select("SELECT * FROM data");

		//mandar en formato de json
		echo json_encode($result);
	}

	function xhrDeleteListing(){
		$id = (int) $_POST['dataid'];
		
		$this->db->delete('data', "dataid='$id'");
		 
	}
}