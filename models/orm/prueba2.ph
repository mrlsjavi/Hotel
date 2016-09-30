<?php

       // buscar restaurante

     // $restaurante =  restaurante::where('id', 1);
      // $restaurante =  restaurante::where('titulo', 'estancia');
       $puesto =  puesto_model::where('titulo', 'jornalero');
    //$usuario = usuario::all();

    print_r($puesto);

/*
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

     /* $jornada =  model_jornada::all($order="order by titulo");
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

        print_r($result);

        */


?>