<!doctype html>
<html>
<head>
	<title><?=(isset($this->title)) ? $this->title : 'Quiniela'  ?> </title>
	<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/default.css"/>
	<link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.9.1/themes/sunny/jquery-ui.css"/>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php echo URL; ?>public/js/custom.js"></script>


	<?php
		if (isset($this->js)){
			foreach ($this->js as $js) {
				//le mando que busque su javascript de la vista (para el dashboard en js = dashboard/js/default.js)
				echo '<script type="text/javascript" src="'.URL.'views/'.$js.'"></script>';
			}
			
		}

	?>

</head>
<body>

	<?php Session::init(); ?>
	<div id="header">
		
		
		
		


		<?php if(Session::get('loggedIn') == false):?>
			
		<?php endif;?>
		<!--aqi deberia cargar el menu dinamico y comprobar accesos?-->
		<?php if(Session::get('loggedIn') == true):?>
		<label>Bienvenido: <?php echo Session::get('nombre'); echo Session::get('apellido') ?></label>
		<a href="<?php echo URL;?>index" style="color:white; font-size: 1.5em; border-bottom: 3px solid white; ">Inicio</a>
		<a href="<?php echo URL;?>pronostico" style="color:white; font-size: 1.5em; border-bottom: 3px solid white; ">Pronostico</a>
		<a href="<?php echo URL;?>posicion" style="color:white; font-size: 1.5em; border-bottom: 3px solid white; ">Posiciones</a>
		
			<!--aqui v lo de los roles-->
			<?php if(Session::get('rol') == 'admin'):?>
				
				<a href="<?php echo URL;?>usuario" style="color:white; font-size: 1.5em; border-bottom: 3px solid white; ">Usuario</a>
				<a href="<?php echo URL;?>equipo" style="color:white; font-size: 1.5em; border-bottom: 3px solid white; ">Equipos</a>
				<a href="<?php echo URL;?>resultado" style="color:white; font-size: 1.5em; border-bottom: 3px solid white; ">Resultados</a>
			<?php endif;?>
		
		
		<a href="<?php echo URL;?>dashboard/logout" style="color:white; font-size: 1.5em; border-bottom: 3px solid white; ">Logout</a>
		<?php else:?>
		<a href="<?php echo URL; ?>login" style="color:white; font-size: 1.5em; border-bottom: 3px solid white; ">login</a>
		<?php endif; ?>
	</div>

	<div id="content">
