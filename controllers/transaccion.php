	<?php

class Transaccion extends Controller{

	function __construct(){
		parent::__construct(); //llamar el construct del padre que es contpromocionler(libs/contpromocionler)


		//Auth::handleLogin();
		//Auth::acceso('rol');
		//ya tenogo incluido el jquery y aqui mando a llamar su javascript independiente de cada vista
		//$this->view->js = array('promocion/js/default.js');


	}

	function index(){
		$this->view->title = 'Transaccion';
		//$this->view->render('header');
		//echo Hash::create('md5', 'test', HASH_PASSWORD_KEY);
		//echo Hash::create('sha256', 'test', HASH_PASSWORD_KEY);
		//vista carpeta/archivo
		//$this->view->render('promocion/index');
		//$this->view->render('footer');
	}



	function guardar(){
		$this->model->guardar();
	}

	function llenar_tabla(){
		$this->model->llenar_tabla();
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
