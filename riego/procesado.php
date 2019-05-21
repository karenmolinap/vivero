<?php
    require '../conexion_bd.php';

    $id = $_GET['id'];
    $duracion = $_GET['hora'];

    $porciones = explode(".", $id);
    $hora = $porciones[0]; // porción1
    $dia  =  $porciones[1]; // porción2


    $query = "INSERT INTO riego  VALUES (0, $hora, $dia, $duracion);";
    echo $query;
    //$agregar = iquery($query,$conexion);


    $respuesta=array();
    $agregar = true;
    if($agregar){
      $respuesta[]=array(
          'clave'=>$id,
          'hora'=>$hora,
          'dia'=>$dia,
          'pasar'=>2
      );
    }else{
      $respuesta[]=array(
          'clave'=>$id,
          'hora'=>$hora,
          'dia'=>$dia,
          'pasar'=>2
      );
    }
    header('Location: ' . 'riego.php');
    echo json_encode($respuesta);

?>
