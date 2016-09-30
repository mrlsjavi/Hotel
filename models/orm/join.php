<?php 

	public function select_join(){
		$query = 'SELECT '
	}


/*
	Que necesito 

	la tabla de origen es la que manda a llamar la funcion -- ahi la llevo al otro lado 
	las tablas relacionadas
	los campos que quiero tomar 
	los where si es que los hay de cada join 
	where general 


*/

	buscar como funciona el dao en mvc y orm

funcion  (tabla1, array_campos, array1, condicion) 

*cada array es un join diferente 
*array_campos los campos de la tabla1 la del from 

tabla1 la de referencia la que va en el from 

tabla2 la que agrego en el join tabla 

array1 = campos, tabla1, tabla2, campo_tabla1, campo_tabla2, condicion_campo, condicion_valor

* en campos un string con todos los campos que quiero tomar de la tabla 2 
o puede ser un array. //con .length puedo ver cuantos campos tiene cada uno 

condicion_campo = campo_tabla2 //siempre es de la tabla 2
condicion_valor = condicionante

--volver condicion un array para que quepan varios 


**otra opcion es dejar los where para que los escriba ej tengo where = $condicion
en $condicion se escribe el where y se manda;


**array1 que tenga todos los joins lo recorro hasta que se acaben los campos 


--le podria agregar el intval al estatus?

/* ejemplo de join 

$query = 'SELECT tiendas.id, nombre_comercial, tipos.nombre AS tipo, direccion, cp, poblaciones.nombre AS poblacion, lat, lng 
FROM tiendas 
INNER JOIN tipos ON tiendas.tipo = tipos.id 
INNER JOIN poblaciones ON tiendas.poblacion = poblaciones.id 
WHERE poblacion = ?';



*/

http://www.funcion13.com/creando-un-pequeno-orm-en-php/

http://laraveles.com/docs/4.1/queries#joins

responsive
http://anexsoft.com/p/2/responsive-design-desde-cero-y-facil

http://desarrolladorsenior.blogspot.com/2012/05/crear-una-pagina-web-html5-utilizando.html
?>

falta el alerta_producto en producto 
y agregar los include donde hay relaciones 
