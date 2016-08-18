<?php

	class Session {

		public static function init(){
			//la inicia aqui y en el header esta doble 
			@session_start();
		}

		public static function set($key, $value){
			$_SESSION[$key] = $value;
		}

		public static function get($key){

			if(isset($_SESSION[$key]))
				return $_SESSION[$key];

		}

		public static function destroy(){
			//unset($_SESSION);
			session_destroy();
		}
	}