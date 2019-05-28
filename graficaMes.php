<?php 

	//Conexión a la Base de Datos
	require 'abre_sesion.php';
	require 'conexion_bd.php';

	$resultado = $_POST['mes']; 
	$valores = array();

	$anio = "'".$resultado['anio']."'";
	$mes = "'".$resultado['mes']."'";

	$sql = "SELECT date(v.tiempo) as fecha, v.temperatura, v.humedad from Valores v WHERE year(v.tiempo) = ".$anio." AND month(v.tiempo) = ".$mes;

	//Realizar la consulta en la base de datos 
	$array = getDatos($sql, $conexion);

	//Crear el arreglo de valores
	while ($row = mysqli_fetch_array($array)) {
	 	$aux = array();
	 	$aux['fecha'] = $row['fecha'];
	    $aux['temperatura'] = $row['temperatura'];
	    $aux['humedad'] = $row['humedad'];
	    $valores[] = $aux;
	}

	echo json_encode($valores);

?>