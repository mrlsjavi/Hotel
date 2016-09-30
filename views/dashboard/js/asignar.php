<!doctype html>
<html lang="es">
    <head>
        <title>Aseginacion de Cursos</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="estilo1.css">
		 <link rel="stylesheet" type="text/css" href="prueba.css">

		 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){

					$("#boton").click(function(){
						alert("presiono");

			$.ajax({
			type: 'POST',
			data: {'alumno':$("#select_alumno").val(), 'catedratico':$("#select_catedratico").val(), 'curso':$("#select_curso").val(), 'uno':$("#txt_uno").val(), 'dos':$("#txt_dos").val(), 'final':$("#txt_final").val()},
			//url: 'http://'+root+'/'+obj+'/process',
			url:'guardar_asignacion.php',
			//dataType: 'json',
			success: function(res){
				alert(res);
			}
		});

			alert("despues");



				});

				});

		</script>



    </head>
    <body>
	<body>
	<div id="page-wrap">
		        <div id="menu-wrapper">
            <ul id="hmenu">
                <li><a href="">Inicio</a></li>
                <li>
                    <a href="">Administrar</a>
                    <ul class="sub-menu">	
                        <li><a href="nuevoa.html">Nuevo Alumno</a></li>
						
						
                        <li><a href="nuevoc.html">Nuevo Catedrático</a></li>
						
                    </ul>
                </li>
				<li>
                    <a href="">Reportes</a>
                    <ul class="sub-menu">
                        
						<li><a href="">Consultar Alumno</a></li>
						<li><a href="">Consulta Catedrático</a></li>
                        <li><a href="">Consulta General Catedrático</a></li>
                          <li><a href="">Consulta General Alumno</a></li>
                    </ul>
                </li>
                <li>
                   
                    
                </li>
                <li><a href="index.html">Cerrar Sesion</a></li>
	

        </div>
		 </br>
		 </br>
		 </br>
		  <center>
		  <marquee scrolldelay="160" direction="down" crollamount="7" height="190px"> <center>
<img src="9.jpg""down"/>
</center>
 </marquee>
 <form class="formulario"  method="post" action="asignar.php">
		
		
		<h2>Registro de notas finales</h2>
<table>

		</tr>
		<tr>
		<td><label >Alumno:</label></td>
		
		<td>
		<div class="styled-select"><select name="nombre" id="select_alumno" required>
		<?php 
					require_once("conexion.php");

					$link = Conectarse();




					// Consultar la base de datos
				$consulta_mysql='select nombre from alumno';
				$resultado_consulta_mysql=mysql_query($consulta_mysql,$link);

				$select= null;
				  
				//$select .=  "<select name='select1'>";
				while($fila=mysql_fetch_array($resultado_consulta_mysql)){
				    $select  .= "<option value='".$fila['nombre']."'>".$fila['nombre']."</option>";
				}
				//$select .= "</select>";
					
				echo $select;
				?>
		</select></div></td>
		
		</tr>
		<tr>
		<td><label >Catedrático:</label></td>
		<td><div class="styled-select">
		<select name="catedratico" id="select_catedratico" required>
		<?php 
					require_once("conexion.php");

					$link = Conectarse();




					// Consultar la base de datos
				$consulta_mysql='select Nombre_Catedratico from catedratico';
				$resultado_consulta_mysql=mysql_query($consulta_mysql,$link);

				$select= null;
				  
				//$select .=  "<select name='select1'>";
				while($fila=mysql_fetch_array($resultado_consulta_mysql)){
				    $select  .= "<option value='".$fila['Nombre_Catedratico']."'>".$fila['Nombre_Catedratico']."</option>";
				}
				//$select .= "</select>";
					
				echo $select;
				?>
		</select></div></td>
		</tr>
		<tr>
		<td><label >Curso:</label></td><td>
		<div class="styled-select"><select name="curso" id="select_curso" required>
		<?php 
					require_once("conexion.php");

					$link = Conectarse();




					// Consultar la base de datos
				$consulta_mysql='select Nombre_Curso from curso';
				$resultado_consulta_mysql=mysql_query($consulta_mysql,$link);

				$select= null;
				  
				//$select .=  "<select name='select1'>";
				while($fila=mysql_fetch_array($resultado_consulta_mysql)){
				    $select  .= "<option value='".$fila['Nombre_Curso']."'>".$fila['Nombre_Curso']."</option>";
				}
				//$select .= "</select>";
					
				echo $select;
				?> 
		</select></div></td></td>
		</tr>
		<tr>
		<td><label >Nota I Bimestre:</label></td>
		<td><input id="txt_uno"  name="txt_uno" type="text"  placeholder="100" required/></td>
		</tr>
        <tr>
		<td><label >Nota II Bimestre:</label></td>
		<td><input id="txt_dos"  name="txt_dos" type="text"  placeholder="100" required/></td>
		</tr>
        
		<tr>
		<td><label >Nota Final:</label></td>
		<td><input id="txt_final"  name="txt_final" type="text"  placeholder="100" required/></td>
		</tr>
		</br>
		<tr>
		<td colspan="2" align= "center"><button id="boton">Aceptar</button>
		<button class="submit" type="reset">Cancelar</button></td>
		</tr>
		
		<table>
	
		 </form>
		

		</br>
		</br>
		</br>
	<div id="pie"><p>Sistema Escolar</p>
	<p>Los Tesoros de Mamá</p></div>	 
    </body>
</html> 