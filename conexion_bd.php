<?php
	$bd ='datos';
	$servidor='localhost';
	$usuario='Karen';
	$contrasena='password';
	//$usuario='root';
	//$contrasena='';
	$usuarioSesion = '';

	//creamos una conexión a la base de datos
	$conexion=mysqli_connect($servidor, $usuario,$contrasena,$bd);


	// checamos la conexion
	if(!$conexion){
		die('Conexion a la base de datos ' . $bd . ' falló: ' . mysqli_connect_error());
	}

	function valida_usuario_bd($usuario, $contrasena, $conexion){
		$usuarioSesion = $usuario;
		$contrasenamd5 = MD5($contrasena);
		$query = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND contrasena = '$contrasenamd5'";
		$resultado = mysqli_query($conexion,$query) or die('Error al ejecutar la consulta');
		if(mysqli_num_rows($resultado)==0){
			return false;
		}else{
			return true;
		}
	}

	function getDatos($query, $conexion){
		$resultado = mysqli_query($conexion,$query) or die('Error al ejecutar la consulta');
		if(mysqli_num_rows($resultado)==0){
			return '';
		}else{
			return $resultado;
		}
	}

	function iquery($query, $conexion){
		$resultado = mysqli_query($conexion,$query) or die('Error al ejecutar la consulta');
	}
?>
