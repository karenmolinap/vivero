<?php
    require './conexion_bd';

    $query = ("SELECT * FROM riego");
    $resultados = iquery($query,$conexion);
    $respuesta=array();
    foreach ($resultados as $fila ) {
        $respuesta[]=array(
            'id'=>$fila['id'],
            'hora'=>$fila['hora'],
            'dia'=>$fila['dia'],
            'duracion'=>$fila['duracion']
        );
    }
    //echo $respuesta;
    echo json_encode($respuesta);

?>
