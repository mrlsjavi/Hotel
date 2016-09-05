<?php
require_once('ORM.php');
    require_once('config.php');
    require_once('general_orm.php');
    

    Database::getConnection(DB_PROVIDER, DB_HOST, DB_USER, DB_PASSWORD, DB_DB);

    $javier = new general_orm;

   $r = $javier::query("insert into rol (id, nombre, estado) values('', 'encargado', 1)");
    print_r($r);


?>