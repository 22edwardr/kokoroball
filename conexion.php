<?php
$conexion = mysqli_connect("fdb15.biz.nf","2238231_kokoball","pikazard2108");
	if (!$conexion) {
		die("No se ha podido conectar con base de datos ".mysqli_error());
	}
mysqli_select_db($conexion,"2238231_kokoball");
/*$conexion = mysqli_connect("localhost","root","");
	if (!$conexion) {
		die("No se ha podido conectar con base de datos ".mysqli_error());
	}
mysqli_select_db($conexion,"2238231_kokoball");*/
/*
fdb15.biz.nf
pikazard2108
*/
?>
