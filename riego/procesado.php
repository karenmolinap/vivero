<?php
    require '../basedatos/conexion.php';

    $id = $_GET['id'];
    //$clave = $_GET['clave'];
    $mat = $_GET['mat'];
        
    $respuesta=array();
    
    if($_SESSION['materias'][$mat] && $_SESSION['materias'][$mat] == $id){
      unset($_SESSION['materias'][$mat]);
      $respuesta[]=array(
          'clave'=>$mat,
          'pasar'=>0
      );
    }else{
      $_SESSION['materias'][$mat] = $id;
      $respuesta[]=array(
          'clave'=>$mat,
          'pasar'=>1
      );     
    }
    
    $max = sizeof($_SESSION['materias']);
    if($max > 7){
      unset($_SESSION['materias'][$mat]);
      $respuesta=array();
      $respuesta[]=array(
          'clave'=>$mat,
          'pasar'=>2
      );
      echo json_encode($respuesta);
    }else{
      echo json_encode($respuesta);
    }
    
    //echo json_encode($_SESSION['materias']);

?>
