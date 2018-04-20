<?php
include 'conexion.php';
$id=$_POST['id'];
$descripcion=$_POST['descripcion'];
$titulo=$_POST['titulo'];
$accion=$_POST['accion'];

if($accion=="Guarda"){

        $sql = "SET time_zone ='-5:00'";
	
	if($conexion->query($sql) === FALSE){
		echo "Contactese con el administrador del sistema error al realizar operacion en base de datos:  ". $sql . "<br>" . $conexion->error;
	}
	$sql = "UPDATE publicacion SET descripcion='".$descripcion."', titulo='".$titulo."', fecha= now() WHERE id=".$id;
        }
else{
	$sql= "DELETE FROM publicacion WHERE id=".$id;
        }


if($conexion->query($sql) === TRUE){
		header('Location: index.php?mensaje=4');
	} else {
		echo "Contactese con el administrador del sistema error al realizar operacion en base de datos". $sql . "<br>" . $conexion->error;
	}
mysqli_close($conexion);
?> 