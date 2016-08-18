<?php 
	require_once("conexion.php");

			$link = Conectarse();




			// Consultar la base de datos
		//$consulta_mysql='select Nombre_Catedratico from catedratico';
		


		  
		$alumno = $_POST['alumno'];
		$catedratico = $_POST['catedratico'];
		$curso = $_POST['curso'];
		$uno = $_POST['uno'];
		$dos = $_POST['dos'];
		$final = $_POST['final'];


			$consulta_mysql = "INSERT INTO registro(alumno, catedratico, cursoasignado, bimestreuno, bimestredos, total) 
			VALUES ( '$alumno', '$catedratico', '$curso', '$uno', '$dos', '$final')";

		//	$resultado_consulta_mysql=mysql_query($consulta_mysql,$link);

			$result = mysql_query($consulta_mysql);

			/*if($resultado_consulta_mysql){
				$resultado = "ingresado con exito";
			}
			else{
				$resultado = "a ocurrido un error al ingresar intente de nuevo";
			}*/

		//$select .=  "<select name='select1'>";
		//while($fila=mysql_fetch_array($resultado_consulta_mysql)){
		  //  $select  .= "<option value='".$fila['Nombre_Catedratico']."'>".$fila['Nombre_Catedratico']."</option>";
		//}
		//$select .= "</select>";
			
		echo "ingresado";
?>