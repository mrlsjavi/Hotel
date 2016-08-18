<?php

class Error extends Controller{

	function __construct(){
		parent::__construct();
		

		
	}


	function index(){
		$this->view->render('header');
		$this->view->title = '404 Error';
		$this->view->msg = 'this page doesnt exist';
		$this->view->render('error/index');
		$this->view->render('footer');
	}
}