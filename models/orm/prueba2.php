<?php
require_once('ORM.php');
    require_once('config.php');
    require_once('usuario.php');
    require_once('rol.php');
    require_once('partido.php');
    require_once('quiniela.php');
    require_once('pronostico_orm.php');
    

    Database::getConnection(DB_PROVIDER, DB_HOST, DB_USER, DB_PASSWORD, DB_DB);

//disponible($fumador, $capacidad, $restaurante)
   /* $fumador = 0;
    $capacidad = 5;
    $restaurante = "campero";
    $mesa = reserva::disponible($fumador, $capacidad, $restaurante);
    print_r($mesa);
    echo '<br/>';
    echo 'mesa';
    echo '<br/>';
    $existe = count($mesa);
    echo '<br/>';
    if($existe > 0){
        echo $mesa[0]['mesa'];
    }
    else{
        echo "no hay mesa disponible";
    }*/
    
/*$jornada =  jornada_model::all();
         if ($jornada) {
            $poblaciones = null;
            foreach ($jornada as $index => $jornada) {
                $poblaciones[] = array(
                    'id' => $jornada->id,
                    'titulo' => $jornada->titulo,
                    'incremento_valor_hora' =>$jornada->incremento_valor_hora
                );
            }
            $result = $poblaciones;
        }
        else {
            $result = array('error' => true, 'mensaje' => 'No hay poblaciones para esa provincia');
        }

        print_r($result);*/
            $partido = partido::where('quiniela', 1);
           // $puesto = usuario_model::notwhere('tipo', 1);
           echo "<br/><br/>";
          
           print_r($partido);
           $dom = '';
           $titulo = '';
           if($partido){
               foreach($partido as $index =>$p){
                   $titulo = $p->obj_quiniela->nombre;
                   $dom=$dom.'<div id="'.$p->id.'">
							<label id="seleccion1">'.$p->obj_seleccion1->nombre.'</label><input type="number" id="'.$p->obj_seleccion1->id.'" value="0" />
							<input type="number" id="'.$p->obj_seleccion2->id.'" value="0"/><label>'.$p->obj_seleccion2->nombre.'</label>
							<br/>
							<br/>
							<button id="btn_guardar" class="boton">Guardar</button>
						</div>';
               }
               
           }
           
            echo "<br/><br/>";
          
            echo $titulo;
           echo $dom;
            echo "<br/><br/>";
            echo md5('javier');
echo "<br/><br/>";

            $user = usuario::where_login(trim('javierm'), trim(md5('javier')));
    
             echo "<br/><br/>";
            print_r($user);

           // rol, id, nombre, apellido, 

            if($user){
              foreach ($user as $index => $u) {
                  echo $u->id;
                  echo $u->nombre;
                  echo $u->apellido;
                  echo $u->obj_rol->id;
                  echo $u->obj_rol->nombre;

              }

            }

             $existe2 = pronostico_orm::where_pronostico(1, 4, 4); 
                   ///verificacion $partido, $seleccion, $usuario
             print_r($existe2);
             echo "<br/><br/>";
             
             $pos = pronostico_orm::posiciones();
             print_r($pos);
           
             
             if($pos){
                 foreach($pos as $p){
                     echo $p['nombre'];
                     echo $p['puntos'];
                 }
                 
             }


     /*       
   
 echo "<br><br>"; echo "<br><br>"; echo "<br><br>"; echo "<br><br>"; echo "<br><br>"; echo "<br><br>";

     
 
        $titulo='';
        $cuerpo='';
            if($partido){
              foreach($partido as $index => $p){
                 $titulo = $p->obj_planilla->titulo;
                $cuerpo = $cuerpo."<tr>";
               
                $cuerpo = $cuerpo. "<td>".$p->obj_usuario->nombre."</td>";
                $cuerpo = $cuerpo."<td>".$p->obj_usuario->apellido."</td>";
               $cuerpo = $cuerpo."<td>".number_format($p->monto, 2, '.', ',')."</td>";
               $cuerpo = $cuerpo."</tr>";
              
               
              
               // echo ;
              }
           }

           //$english_format_number = number_format($número, 2, '.', '');
            $cabesa = "<table align='right' border='6' style='width: 50%px;' align='center'>
   <caption>Planilla ".$titulo."</caption>
          <thead bgcolor='#58ACFA'>
        <tr>
            
              <th>Nombre</th>
              <th>Apellido</th>
              <th>Pago</th>

            </tr>
        </thead>
        <tbody>";
           echo $cabesa;
           echo $cuerpo;
           echo "</tbody>
            </table>";


$planilla =             planilla_model::all();
echo "<br/>";
print_r($planilla);

echo "<br/>";
echo "<br/>";

echo "<br/>";

echo "<br/>";

echo "<br/>";
echo "<br/>";

echo "<br/>";

echo "<br/>";

$nombre = "javier";
  $usuarios =  usuario_model::like('nombre', $nombre);
  print_r($usuarios);

  foreach ($usuarios as $index => $user) {
    echo $user->obj_tipo->titulo;
    echo $user->obj_tipo->salario;
    echo $user->obj_jornada->titulo;

    # code...
  }*/

         //if ($puesto) {
          //  $puestos = null;
            //foreach ($puesto as $index => $p) {
                /*$puestos[] = array(
                    'id' => $puesto->id,
                    'titulo' => $puesto->titulo,
                    'valor_hora' =>$puesto->valor_hora,
                    'salario'=>$puesto->salario,
                    'estado'=>$puesto->estado
                );*/
                    /*       echo "<br><br>";
                         echo $p->nombre;
                         //echo $puesto->salario;
                         echo "<br><br>";
                         print_r($p->obj_tipo);
                         echo "<br><br>";
                         echo $p->obj_tipo->salario;
                          echo "<br><br>";
                         echo $p->obj_tipo->valor_hora;

               // $option = $option."<option value='".$puesto->id."'>".$puesto->titulo."</option>";
            }
echo "<br><br>";

           $horas =  usuario_model::horas(19940800);
           echo $horas[0]['horas'];
           print_r($horas);

           //foreach ($horas as $index => $h) {
               echo $horas[0]['horas'];*/
          // }

               /* $marcaje = marcaje::where('usuario', 19940800);

                foreach ($marcaje as $index => $m) {
                    echo $m->momento;
                    //store procedure que me duvuelva las horas 

                }*/



            //}

  //  print_r($puesto);
       // buscar restaurante

      // $restaurante =  restaurante::where('id', 1);
   /* $restaurante =  restaurante::where('titulo', 'estancia');
    //$usuario = usuario::all();

    print_r($restaurante);


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

        print_r($result);*/


?>