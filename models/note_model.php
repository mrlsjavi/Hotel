<?php

	class Note_Model extends Model{


		public function __construct(){

			parent::__construct();
			
		}

		public function noteList(){

			return $this->db->select('SELECT * FROM note WHERE userid = :userid', array('userid' => $_SESSION['userid'] ));
			

		}

		public function noteSingleList($id){

			return $this->db->select('SELECT * FROM note WHERE userid = :userid AND  id =:id', 
				array('userid'=>$_SESSION['userid'], ':id'=>$id));
			
		}

		public function create($data){



			$this->db->insert('note', array(
				'userid' => $_SESSION['userid'],
				'title' => $data['title'],
				'content' => $data['content'],
				'data_added'=> date('Y-m-d H:i:s')  //mejor si se usa GMT aka UTC 0:00
				));

			
		}

		public function editSave($data){

			$postData = array(
				'title' => $data['title'],
				'content' => $data['content'],
				  );

			$this->db->update('note', $postData, 
				"`id` = {$data['id']} AND userid = '{$_SESSION['userid']}'");
			/*$sth = $this->db->prepare('UPDATE users 
				SET login= :login, password = :password, rol = :role
				WHERE id = :id');
			$sth->execute(array(
				':id'=>$data['id'],
				':login'=>$data['login'],
				':password'=>Hash::create('md5', $data['password'], HASH_PASSWORD_KEY),
				':role'=>$data['role']
			));*/
		}

		public function delete($id){

			$this->db->delete('note', "`id` = {$data['id']} AND userid = '{$_SESSION['userid']}'");
		}

	}