<?php

	class Login_Model {


		public function __construct(){

			
			
		}

		public function run(){

			
			

			//$usuario = usuario::where_login()
			
			
			  $user = usuario_orm::where_login(trim($_POST['login']), trim(md5($_POST['password'])));

        //hacer el insert en responsable
    
          //   echo "<br/><br/>";
            //print_r($user);

           // rol, id, nombre, apellido, 

            if($user){
              $general = new general_orm;

              foreach ($user as $index => $u) {
              	Session::init();
                Session::set('id', $u->id);
                Session::set('nombre', $u->nombre);
                Session::set('id_rol', $u->obj_rol->id);
                Session::set('rol', $u->obj_rol->nombre);
                Session::set('loggedIn', true);
               // header('location: ../index');
                $general::query("update responsable set usuario = ".$u->id);
                header('location: '.URL.'index');

              }
              //aqui hacer el insert en responsable

            }
            else{
            //	header('location: ../login');
              header('location: '.URL.'login');
              
            }

			


			
		}

	}