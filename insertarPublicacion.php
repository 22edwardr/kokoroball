<?php
include 'conexion.php';
session_start();
$titulo=$_POST['titulo'];
$descripcion=$_POST['descripcion'];

if($titulo==NULL || $descripcion == NULL ){
	if($titulo==NULL){
		header('Location: index.php?mensaje=1');
	}
	if($descripcion == NULL){
		header('Location: index.php?mensaje=2');
	}
}
else{

	$sql = "SET time_zone ='-5:00'";
	
	if($conexion->query($sql) === FALSE){
		echo "Contactese con el administrador del sistema error al realizar operacion en base de datos:  ". $sql . "<br>" . $conexion->error;
	}

	$sql = "INSERT INTO publicacion(titulo,descripcion,fecha,id_usuario) VALUES ('".$titulo."','".$descripcion."',now(),'".$_SESSION['id']."')";
	if($conexion->query($sql) === TRUE){
		header('Location: index.php?mensaje=3');
	} else {
		echo "Contactese con el administrador del sistema error al realizar operacion en base de datos:  ". $sql . "<br>" . $conexion->error;
	}
}

mysqli_close($conexion);

?>