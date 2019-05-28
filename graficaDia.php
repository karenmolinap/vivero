<?php 

	//Conexión a la Base de Datos
	require 'abre_sesion.php';
	require 'conexion_bd.php';

	$resultado = $_POST['fecha']; 
	$valores = array();

	//Condicion para saber si fue un solo dia o fue varios dias
	if (count($resultado) > 3) {
		//Si son mas de un dia
		$fecha1 = "'".$resultado['anio1'].'-'.$resultado['mes1'].'-'.$resultado['dia1']."'";
		$fecha2 = "'".$resultado['anio2'].'-'.$resultado['mes2'].'-'.$resultado['dia2']."'";

		$sql = "SELECT date(v.tiempo) as fecha, v.temperatura, v.humedad from Valores v WHERE date(v.tiempo) >= " . $fecha1 ." AND date(v.tiempo) <= ". $fecha2;

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
		
	} else {
		//Si nada mas seleccionó un día

		//Concatenar las fechas
		$fecha = "'".$resultado['anio1'].'-'.$resultado['mes1'].'-'.$resultado['dia1']."'";

		//Construir la consulta sql
		$sql = "SELECT hour(v.tiempo) as hora, v.temperatura, v.humedad from Valores v WHERE date(v.tiempo) = " . $fecha;

		//Realizar la consulta en la base de datos 
		$array = getDatos($sql, $conexion);

		//Crear el arreglo de valores
		while ($row = mysqli_fetch_array($array)) {
		 	$aux = array();
		 	$aux['hora'] = $row['hora'];
		    $aux['temperatura'] = $row['temperatura'];
		    $aux['humedad'] = $row['humedad'];
		    $valores[] = $aux;
		}
	}

	echo json_encode($valores);

?>


