<!doctype html>
<html>
<head>
	<title><?=(isset($this->title)) ? $this->title : 'Hotel'  ?> </title>
	<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/default.css"/>
	<link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.9.1/themes/sunny/jquery-ui.css"/>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php echo URL; ?>public/js/custom.js"></script>
	
	<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">

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
		<label>Bienvenido: <?php echo Session::get('nombre'); ?></label>
		<a href="<?php echo URL;?>index" style="color:white; font-size: 1.5em; border-bottom: 3px solid white; ">Inicio</a>
		
		<?php Auth::menu();?>
			<!--aqui v lo de los roles-->
			
		
		
		<a href="<?php echo URL;?>dashboard/logout" style="color:white; font-size: 1.5em; border-bottom: 3px solid white; ">Logout</a>
		<?php else:?>
		<a href="<?php echo URL; ?>login" style="color:white; font-size: 1.5em; border-bottom: 3px solid white; ">login</a>
		<?php endif; ?>
	</div>

	<div id="content">
