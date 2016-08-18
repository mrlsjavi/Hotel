<?php

	class Login_Model {


		public function __construct(){

			
			
		}

		public function run(){

			
			

			//$usuario = usuario::where_login()
			
			
			  $user = usuario::where_login(trim($_POST['login']), trim(md5($_POST['password'])));
    
          //   echo "<br/><br/>";
            //print_r($user);

           // rol, id, nombre, apellido, 

            if($user){
              foreach ($user as $index => $u) {
              	Session::init();
                Session::set('id', $u->id);
                Session::set('nombre', $u->nombre);
                Session::set('apellido', $u->apellido);
                Session::set('id_rol', $u->obj_rol->id);
                Session::set('rol', $u->obj_rol->nombre);
                Session::set('loggedIn', true);
               // header('location: ../index');
                header('location: '.URL.'index');

              }

            }
            else{
            //	header('location: ../login');
              header('location: '.URL.'login');
            }

			


			
		}

	}