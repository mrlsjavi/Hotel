<?php

/*
	fill a form 
	we post to php
	we watn to sanitize
	validate
	return data
	or write to database


*/
	require 'Form/Val.php';

class Form {
	//array this is the inmediately posted item
	private $_currentItem = null;
	//array $_postdata stores the posted data
	private $_postData = array(); //array interno 
	// este el objeto de validacion 
	private $_val = array();
	// holds the current forms error
	private $_error = array();
	//constructor instancia el objeto validacion 
	public function __construct(){
		$this->_val = new Val();
	}

	/*
		this is to run a $_POST

		$field is the HTML fieldname to post
	*/

	public function post($field){
		$this->_postData[$field] = $_POST[$field];
		$this->_currentItem = $field;

		return $this; //returns the object of the form 
	}

	/*
		this is to return the posted data
		param is mixed 

		and return a string o array
	*/

	public function fetch($fieldName = false){

		if($fieldName){

			if(isset($this->_postData[$fieldName])){
				return $this->_postData[$fieldName];
			}
			else{
				return false;
			}
			
		}
		else{
			return $this->_postData;
		}

		
	}

	/*
		this is to validate 

		typeOfValidator a method from de Form/val class
		arg a property to validate against 

	*/

	public function val($typeOfValidator, $arg = null){

		if($arg == null){
			$error = $this->_val->{$typeOfValidator}($this->_postData[$this->_currentItem]);
		}
		else{
			$error = $this->_val->{$typeOfValidator}($this->_postData[$this->_currentItem], $arg);
		}

		if($error){
			$this->_error[$this->_currentItem] = $error;
		}

		return $this;

	}

	/*
		maneja el form, y tira una excepcion cuando ocurre un error

	*/

	public function submit(){

		if(empty($this->_error)){
			return true;
		}
		else{
			
			$str = '';
			foreach($this->_error as $key => $value){
				$str .= $key.' -> '.$value."\n";
			}
			throw new Exception($str);
		}
	}
}