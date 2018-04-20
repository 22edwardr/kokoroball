<?php
$con = mysqli_connect("fdb15.biz.nf","2238231_kokoball","pikazard2108");
	if (!$con) {
		die("No se ha podido conectar con base de datos ".mysqli_error());
	}
mysqli_select_db($con,"2238231_kokoball");
?>