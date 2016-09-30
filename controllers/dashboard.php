<?php

class Dashboard extends Controller{

	function __construct(){
		parent::__construct(); //llamar el construct del padre que es controller(libs/controller)
		
		Auth::handleLogin();

		
		//ya tenogo incluido el jquery y aqui mando a llamar su javascript independiente de cada vista 
		$this->view->js = array('dashboard/js/default.js');

	}

	function index(){
		$this->view->title = 'Dashboard';
		$this->view->render('header');
		//vista carpeta/archivo
		$this->view->render('dashboard/index');
		$this->view->render('footer');
	}

	function logout(){

		Session::destroy();
		header('location: '.URL.'login');
		exit;

	}

	function xhrInsert(){
		$this->model->xhrInsert();
	}

	function xhrGetListings(){
		$this->model->xhrGetListings();
	}

	function xhrDeleteListing(){
		$this->model->xhrDeleteListing();
	}

}