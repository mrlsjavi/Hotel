<?php

class Bootstrap {
	//set the protected url
	private $_url = null;
	private $_controller = null;
	//siempre incluir el /
	private $_controllerPath = "controllers/";
	private $_modelPath = "models/orm/";
	private $_errorFile = "error.php";
	private $_defaultFile = "index.php";

	//to start the bootstrap

	public function init(){
		$this->_getUrl();
	
		//si no esta el controllador que cargue el controlador por default sino esta seteada la url

		if(empty($this->_url[0])){
			$this->_loadDefaultController();
			return false;
		}

		$this->_loadExistingController();
		$this->_callControllerMethod();
	}


	/*
		set a costum path to controller 
	*/
	public function setControllerPath($path){
		$this->_controllerPath = trim($path, '/').'/';
	}

	public function setModelPath($path){
		$this->_modelPath = trim($path, '/').'/';
	}
	//costum error file example error.php
	public function setErrorFile($path){
		$this->_errorFile = trim($path, '/');
	}

	public function setDefaultFile($path){
		$this->_defaultFile = $trim($path, '/');
	}

	//get from url
	private function _getUrl(){
		//si esta seteado que la ponga de lo contrario null
		$url = isset($_GET['url']) ? $_GET['url'] : null;
		$url = rtrim($url, '/');
		$url = filter_var($url, FILTER_SANITIZE_URL);
		$this->_url = explode('/', $url);
	}
	//loads if there are no get parameters
	private function _loadDefaultController(){
		require $this->_controllerPath.$this->_defaultFile;
		$this->_controller = new Index();
		$this->_controller->index();

	}
	//this is call refactoring
	//loads if get parameter
	//controller/metodo/parametro
	private function _loadExistingController(){
		$file = $this->_controllerPath.$this->_url[0].'.php';

		if(file_exists($file)){
			require $file;
			//echo 1; aqui se llama la funcion index en lugar del construct
			$this->_controller = new $this->_url[0];
			$this->_controller->loadModel($this->_url[0], $this->_modelPath);
		}
		else{
			$this->_error();	
			return false;		
		}		
	}


/* url[0] controller
			url[1]	method
			url[2]	param
			url[3]	param
			url[4] 	param
		*/
	private function _callControllerMethod(){
		

		$length = count($this->_url);

		if($length > 1){
				//make sure the method we are callign exists
			if(!method_exists($this->_controller, $this->_url[1])){
			
				$this->_error();
			}	
		}
		
		//determine what to load
		switch ($length) {
			case '5':
				$this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3], $this->_url[4]);
				
				break;

			case '4':
				$this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3]);
				break;

			case '3':
				$this->_controller->{$this->_url[1]}($this->_url[2]);
				break;

			case '2':
				$this->_controller->{$this->_url[1]}();
				break;

			default:
				$this->_controller->index();
				break;
		
		}


			//calling methods
		
			
			
			
		
	}
	//show an error if a page doesnot exist
	private function _error(){
			require $this->_controllerPath.$this->_errorFile;
			$this->_controller = new Error();
			$this->_controller->index();
			exit;
	}
}