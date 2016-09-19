<?php

class Permiso extends Controller{

	function __construct(){
		parent::__construct(); //llamar el construct del padre que es controller(libs/controller)


		Auth::handleLogin();
		Auth::acceso('permiso');

		
		//ya tenogo incluido el jquery y aqui mando a llamar su javascript independiente de cada vista 
		$this->view->js = array('permiso/js/default.js');

		
	}

	function index(){
		$this->view->title = 'Permiso';
		$this->view->render('header');
		//echo Hash::create('md5', 'test', HASH_PASSWORD_KEY);
		//echo Hash::create('sha256', 'test', HASH_PASSWORD_KEY);
		//vista carpeta/archivo
		$this->view->render('permiso/index');
		$this->view->render('footer');
	}

	

	function guardar(){
		$this->model->guardar();
	}

	function traer_roles()
	{
		$this->model->traer_roles();
	}

	function traer_paginas(){
		$this->model->traer_paginas();
	}

	
}