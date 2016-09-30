<?php

	class User_Model extends Model{


		public function __construct(){

			parent::__construct();
			
		}

		public function userList(){

			return $this->db->select('SELECT userid, login, rol FROM users');
			

		}

		public function userSingleList($userid){

			return $this->db->select('SELECT userid, login, rol FROM users WHERE userid =:userid', array(':userid'=>$userid));
			
		}

		public function create($data){

			$this->db->insert('users', array(
				'login' => $data['login'],
				'password' => Hash::create('sha256', $data['password'], HASH_PASSWORD_KEY), 
				'rol'=>$data['role']));

			

			/*$sth = $this->db->prepare('INSERT INTO users 
				(login, password, rol)
				values(:login, :password, :role)');
			$sth->execute(array(
				':login'=>$data['login'],
				':password'=>Hash::create('md5', $data['password'], HASH_PASSWORD_KEY),
				':role'=>$data['role']
			));*/
		}

		public function editSave($data){

			$postData = array(
				'login' => $data['login'],
				'password' => Hash::create('sha256', $data['password'], HASH_PASSWORD_KEY), 
				'rol'=>$data['role']);

			$this->db->update('users', $postData, "`userid` = {$data['userid']}");
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

		public function delete($userid){

			$result = $this->db->select('SELECT rol FROM users WHERE userid = :userid', array(':userid'=>$userid));
			
			if($result[0]['rol'] == 'owner'){
				return false;
			}

			$this->db->delete('users', "userid='$userid'");
		}

	}