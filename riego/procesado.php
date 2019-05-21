<?php
    require '../conexion_bd.php';

    $id = $_GET['id'];
    $duracion = $_GET['hora'];

    $porciones = explode(".", $id);
    $hora = $porciones[0]; // porción1
    $dia  =  $porciones[1]; // porción2
    $pasar = 1;
    $query = "SELECT * FROM riego WHERE dia = $dia and hora = $hora;";
    $resultados = getDatos($query,$conexion);
    $idCon = -1;
    foreach ($resultados as $fila ) {
      $idCon = $fila["id"];
    }
    if($duracion == 0){
      $idCon = -1;
    }
    if($idCon == -1){
      if($duracion == 0){
        $query = "DELETE FROM riego WHERE dia = $dia and hora = $hora;";
        $borrar = iquery($query,$conexion);
        $pasar = 0;
      }else{
        $query = "INSERT INTO riego  VALUES (0, $hora, $dia, $duracion);";
        $agregar = iquery($query,$conexion);
      }
    }else{
      $query = "UPDATE riego SET duracion = $duracion WHERE id = $idCon";
      $borrar = iquery($query,$conexion);

    }


    $respuesta=array();
    $respuesta[]=array(
        'clave'=>$id,
        'hora'=>$hora,
        'dia'=>$dia,
        'pasar'=>$pasar
    );


    echo json_encode($respuesta);

?>
