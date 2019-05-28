<?php

	//Conexión a la Base de Datos
	require 'abre_sesion.php';
	require 'conexion_bd.php';

	$resultado = $_POST['anio'];
	$valores = array();

	if ($resultado['opcion'] == 1) {
		$anio = "'".$resultado['anio']."'";

		$sql = "SELECT month(v.tiempo) as mes, v.temperatura, v.humedad from Valores v WHERE year(v.tiempo) = ".$anio." ORDER BY v.tiempo ASC";

		//Realizar la consulta en la base de datos
		$array = getDatos($sql, $conexion);

		//Crear el arreglo de valores
		while ($row = mysqli_fetch_array($array)) {
		 	$aux = array();
		 	$aux['mes'] = $row['mes'];
		    $aux['temperatura'] = $row['temperatura'];
		    $aux['humedad'] = $row['humedad'];
		    $valores[] = $aux;
		}

	} else {
		$anio = "'".$resultado['anio']."'";

		$sql = "SELECT date(v.tiempo) as fecha, v.temperatura, v.humedad from Valores v WHERE year(v.tiempo) = ".$anio;

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
	}

	echo json_encode($valores);

?>
