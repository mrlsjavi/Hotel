<?php

class Reporte extends Controller{

	function __construct(){
		parent::__construct(); //llamar el construct del padre que es contreporteler(libs/contreporteler)


		//Auth::handleLogin();
		//Auth::acceso('rol');
		//ya tenogo incluido el jquery y aqui mando a llamar su javascript independiente de cada vista
		$this->view->js = array('reporte/js/default.js');


	}

	function index(){
		$this->view->title = 'Reporte';
		$this->view->render('header');
		//echo Hash::create('md5', 'test', HASH_PASSWORD_KEY);
		//echo Hash::create('sha256', 'test', HASH_PASSWORD_KEY);
		//vista carpeta/archivo
		$this->view->render('reporte/index');
		$this->view->render('footer');
	}



	function guardar(){
		$this->model->guardar();
	}

	function llenar_tabla(){
		$this->model->llenar_tabla();
	}

	function traer_habitaciones(){
		$this->model->traer_habitaciones();
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
