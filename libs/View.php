<?php

class View{

	function __construct(){
		//echo "this is the view";
	}

	public function render($name, $noInclude = false){
		///que siempre incluya el header y footer a  menos que lo indiquemos 
		  
			require 'views/'.$name.'.php';
		
		
	}
}