<!DOCTYPE HTML>
<html>
  	<head>
    	<title><?php echo $this->title; ?></title>
    	<meta name="viewport" content="width=device-width">
   		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
   		
   		<link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.9.1/themes/sunny/jquery-ui.css"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
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
		<div id="contenedor-form-login" class="sintio_usuario form-horizontal" >
			<div id="form-login" class="form-group col-sm-8" obj="Session" acc="validate_credentials" fok="f_ok_login">
				<h2>Indentificarse</h2>
				<br>
				<div class="form-group">
					<label class="col-sm-2 control-label">Usuario: </label>
					<div class="col-sm-10 dato">
						<input type="text" class=" data form-control" id="usuario">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Password: </label>
					<div class="col-sm-10 dato">
						<input type="password" class="data form-control" id="password">
					</div>
				</div>
				
				<div class="boton_ejecutar btn btn-primary btn-block" id="boton-enviar-form-login">Login</div>
				
			</div>
		</div>
		<header>
			
			<div id="sintio_menu_titulo">
				
				<?php if(Session::get('loggedIn')){ ?><div id="boton-activador-form-login"> <label><?php echo Session::get('nombre');?></label> </div>	<?php }?>
				<div id="contenedor_titulo_pagina"><H1>Hotel</H1></div>
				
			</div>
		</header>
		<nav>
			
		
		<?php if(Session::get('loggedIn')){Auth::menu();}?>
			<!--aqui v lo de los roles-->
			
			
		</nav>

		<main>
			<br>
			<br>
			<div class="sintio_titulo_pagina" ><?php echo $this->title ?></div>
			<div class="contenido_pagina" id="content">
