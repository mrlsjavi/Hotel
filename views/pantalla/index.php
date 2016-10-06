<?php 
	#include URL."models/orm/config.php";
	#include URL."models/orm/ORM.php";
	#include URL."models/orm/general_orm.php";

	
	$habitaciones = array();
	$coordenadas = array();
	$db = new general_orm;
	$estado_eliminado = 0;
	$usuario_motel = Session::get('motel');
	

	$resultado = $db::query("select * from habitacion where estado != '".$estado_eliminado."' and motel = '".$usuario_motel."'");

	foreach($resultado as $clave => $valor){
		$id = $valor['id'];
		$estado = $valor['estado'];
		$titulo = $valor['nombre'];
		$columna = $valor['columna_matriz'];
		$fila = $valor['fila_matriz'];
		$uso = 0;
		if($estado == 1){
			$uso_habitacion = $db::query("select * from transaccion where habitacion = '".$id."' order by id desc limit 1");
			foreach ($uso_habitacion as $key => $value) {
				$inicio = $value['hora_inicio'];
				#$salida = $value['hora_fin'];
				$datetime1 = new DateTime($inicio);
				$datetime2 = new DateTime("now");
				$interval = $datetime1->diff($datetime2);
				#print_r($datetime2);
				#print_r($datetime1);
				#print_r($interval);
				
				$uso = $interval->format("%d %H:%i");
				#$uso = "1 03:50";
			}	
		}
		array_push($habitaciones, [$id,$titulo,$estado,$uso]);
		array_push($coordenadas, ($fila.','.$columna));
	}
	
	$motel = $db::query("select columna_matriz, fila_matriz from motel where id = '".$usuario_motel."' ");
	$out = "<table>";
	foreach ($motel as $key => $value) {
		for($i = 1; $i<=$value['fila_matriz'];$i++){
			$out .= "<tr>";
			for($x = 1; $x <=$value['columna_matriz']; $x++){
				//$coordenada = existe_elemento($value->fila_matriz.','.$value->columna_matriz, $coordenadas);
				$c = $i.','.$x;
				$coordenada = existe_elemento($c, $coordenadas);
				if ($coordenada >= 0){
					
					$out .= "<td class='";
					if($habitaciones[$coordenada][2]==1){
						$out .= "uso'>";
					}
					elseif($habitaciones[$coordenada][2]==2){
						$out .= "libre'>";
					}if($habitaciones[$coordenada][2]==3){
						$out .= "fuera_servicio'>";
					}
					$out .= "<label class='titulo_habitacion'>".$habitaciones[$coordenada][1]."</label>";
					if($habitaciones[$coordenada][2] == 1){
						$out .= "<label class='uso_habitacion'>".$habitaciones[$coordenada][3]."</label>";
					}
					$out .= "</td>";
				}else{
					$out .= "<td class='nada'></td>";
				}
			}
			$out .= "</tr>";
		}	
	}
	$out .="</table>";
	echo $out;
	function existe_elemento($elemento, $array){
		for($i=0;$i<count($array);$i++){
			if($array[$i] == $elemento)
				return $i;
		}
		return -1;
	}
?>
<style type="text/css">
	.contenido_pagina{
		text-align: center !important ;
	}
	table{
		margin-left: 25px;
	}
	td{
		border: 1px solid white;
		height: 100px;
		width: 100px;
		color: white;
		font-weight: bold;
		text-align: center;
	}
	.nada{
		background: rgb(239,244,255);
	}.uso{
		background: rgb(238,17,17);
	}.libre{
		background: rgb(153,180,51);
	}.fuera_servicio{
		background: rgb(29,29,29);
	}.titulo_habitacion{
		width: 100%;
		text-align: center;
		display: inline-block;
		height: 30px;
	}.uso_habitacion{
		width: 100%;
		text-align: center;
		display: inline-block;
		height: 30px;
	}
</style>
<script type="text/javascript">
	if(window.top==window) {
	    // You're not in a frame, so you reload the site.
	    window.setTimeout('location.reload()', 5000); //Reloads after three seconds
	}
</script>