<?php

class Habitacion extends Controller{

	function __construct(){
		parent::__construct(); //llamar el construct del padre que es conthabitacionler(libs/conthabitacionler)


		//Auth::handleLogin();
		//Auth::acceso('rol');
		//ya tenogo incluido el jquery y aqui mando a llamar su javascript independiente de cada vista
		$this->view->js = array('habitacion/js/default.js');


	}

	function index(){
		$this->view->title = 'Habitaciones';
		$this->view->render('header');
		//echo Hash::create('md5', 'test', HASH_PASSWORD_KEY);
		//echo Hash::create('sha256', 'test', HASH_PASSWORD_KEY);
		//vista carpeta/archivo
		$this->view->render('habitacion/index');
		$this->view->render('footer');
	}



	function guardar(){
		$this->model->guardar();
	}

	function llenar_tabla(){
		$this->model->llenar_tabla();
	}

	function traer_moteles(){
		$this->model->traer_moteles();
	}

	function eliminar(){
		$this->model->eliminar();
	}

	function traer_dato(){
		$this->model->traer_dato();
	}

	function actualizar(){
		$this->model->actualizar();
	}




}
