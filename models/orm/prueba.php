<?php
	require_once('ORM.php');
	require_once('config.php');
	require_once('usuario.php');
	require_once('rol.php');
	require_once('restaurante.php');
	require_once('mesa.php');
	//require_once('');
	

	Database::getConnection(DB_PROVIDER, DB_HOST, DB_USER, DB_PASSWORD, DB_DB);
	//echo DB_PROVIDER;

	$usuario = usuario::where('id', 2);

	//$restaurante =  restaurante::where('titulo', 'campero');
	$restaurante =  restaurante::where('titulo', 'estancia');
	//$usuario = usuario::all();

	//print_r($restaurante);

	

//array("id"=>valor,	);


//le saco un length y armo la consulta con cada length un and y el ultimo ya no se pone 

	$data = array(
			'id'=>'',
			'mesa'=>1,			//id de mesa 
			'restaurante'=>	1,	//id de restaurante
			'cliente'=>'javier',			//
			'dia'=>'',
			'hora'=>'',
			'comensales'=>5,
			'en_sitio'=>0,
			'estatus'=>1
		);


	/*$restaurante = new restaurante($data);

	$result = $restaurante->save();
	print_r($result);*/

	if ($restaurante) {
            $poblaciones = null;
            foreach ($restaurante as $index => $restaurante) {
                $poblaciones[] = array(
                    'id' => $restaurante->id,
                    'titulo' => $restaurante->titulo,
                    'direccion' =>$restaurante->direccion
                );
            }
            $result = $poblaciones;
        }
        else {
            $result = array('error' => true, 'mensaje' => 'No hay poblaciones para esa provincia');
        }

        echo "va el id del restaurante ".$result[0]['id'];
        echo '<br/>';
        echo '<br/>';

        print_r($result);

	//echo "preuba de ".$restaurante['titulo']['direccion'];

	/*if ($restaurante) {
		            $rest = null;
		            foreach ($restaurante as $index) {
		               // $rest[] = array(
		                    'id' => $index['id'],
		                    'padre' => $index['padre'],
		                    'titulo' =>$index['titulo'],
		                    'direccion' =>$index['direccion'],
		                    'estatus'=>$index['estatus']
		                    echo "javier";
		                    echo $index['id'];
		                    echo $index->id;
		                    echo $index['padre'];
		                    echo $index['titulo'];
		                    echo $index['direccion'];
		                    echo $index['estatus'];
		                //);
		            }
		            $result = $rest;
		            //$javier = "trare dato ".$rest['titulo'];
		            echo $rest['titulo'];
		            echo '<br/>';
			        echo '<br/>';
			        print_r($result);
		        }
		        else {
		            $javier = "no trae nada";
		            //$result = array('error' => true, 'mensaje' => 'No hay poblaciones para esa provincia');
		        }*/


	/*$data = array(
		'id'=>'',
		'id_rol'=> 1,
		'login'=> 'prueba',
		'nombre'=>'aquiles',
		'apellido'=>'pinto',
		'password'=>'javier',
		'estatus'=>1
		);*/


	

	/*$user = new usuario($data);

	$result = $user->save();
	print_r($result);

	print_r($usuario);

	if ($usuario) {
            $poblaciones = null;
            foreach ($usuario as $index => $usuario) {
                $poblaciones[] = array(
                    'id' => $usuario->id,
                    'login' => $usuario->login,
                    'rol' =>$usuario->id_rol
                );
            }
            $result = $poblaciones;
        }
        else {
            $result = array('error' => true, 'mensaje' => 'No hay poblaciones para esa provincia');
        }

        echo '<br/>';
        echo '<br/>';
        print_r($result);*/
	//echo $usuario;*/




?>