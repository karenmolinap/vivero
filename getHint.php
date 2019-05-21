<?php

require 'abre_sesion.php';
require 'conexion_bd.php';

$temperatura = 0;
$humedad = 0;
$data = getDatos("SELECT temperatura, humedad FROM Valores WHERE temperatura != 10 ORDER BY ID DESC LIMIT 1",$conexion);

while ($row = mysqli_fetch_array($data)) {
  $temperatura = $row['temperatura'];
  $humedad = $row['humedad'];
}

$todo = $temperatura . "-"  . $humedad;
echo $todo;
?>
