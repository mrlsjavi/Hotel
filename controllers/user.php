<?php

class User extends Controller{

	public function __construct(){
		parent::__construct(); //llamar el construct del padre que es controller(libs/controller)
		
		Auth::handleLogin();

		
		//ya tenogo incluido el jquery y aqui mando a llamar su javascript independiente de cada vista 
		

	}

	public function index(){
		$this->view->title = 'User';
		//vista carpeta/archivo
		$this->view->userList = $this->model->userList();


		$this->view->render('user/index');
	}


	public function create(){
		
		$data = array();
		$data['login'] = $_POST['login'];
		$data['password'] = $_POST['password'];
		$data['role'] = $_POST['role'];

		//@TODO: your errror checking!
		$this->model->create($data);

		header('location: '.URL.'user');
	}

	public function edit($id){
		$this->view->title = 'Edit User';
		//fetch individual user 
		$this->view->user = $this->model->userSingleList($id);
		$this->view->render('user/edit');
		
	}

	public function editSave($id){

		$data = array();
		$data['id'] = $id;
		$data['login'] = $_POST['login'];
		$data['password'] = $_POST['password'];
		$data['role'] = $_POST['role'];

		//@TODO: your errror checking!
		$this->model->editSave($data);

		header('location: '.URL.'user');
	}

	public function delete($id){

		$this->model->delete($id);
		header('location: '.URL.'user');

		
	}
	

}