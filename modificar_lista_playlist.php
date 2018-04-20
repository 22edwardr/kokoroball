<?php
include 'conexion.php';
include 'sesion.php';

$id=$_POST['id'];
$nombre=$_POST['nombre'];
$descripcion=$_POST['descripcion'];
$accion=$_POST['accion'];

if($accion !="Eliminar" && ($nombre == "")){
	header('Location: lista_playlist.php?mensaje=4');
}
else{
$sql = "SET time_zone ='-5:00'";
	
if($conexion->query($sql) === FALSE){
        echo "Contactese con el administrador del sistema error al realizar operacion en base de datos:  ". $sql . "<br>" . $conexion->error;
}else{
			$mensaje=0;

	        if($accion=="Guarda"){
	                $sql = "UPDATE lista_playlist SET nombre='".$nombre."', descripcion='".$descripcion."',fecha=now(),id_usuario='".$_SESSION['id']."' WHERE id=".$id;
	                $mensaje=1;
	                }
	        else if($accion=="Inserta"){
	                $sql ="INSERT INTO lista_playlist(nombre,descripcion,fecha,id_usuario) VALUES ('".$nombre."','".$descripcion."',now(),'".$_SESSION['id']."')";
	                $mensaje=2;
	                }
	        else{
	                $sql= "DELETE FROM playlist WHERE lista_playlist=".$id;
	                if($conexion->query($sql) === TRUE){
						$sql= "DELETE FROM lista_playlist WHERE id=".$id;
	                	$mensaje=3;
	                 }
	        }
	        
	        
	        if($conexion->query($sql) === TRUE){
	                        header('Location: lista_playlist.php?mensaje='.$mensaje);
	                } else {
	                        echo "Contactese con el administrador del sistema error al realizar operacion en base de datos". $sql . "<br>" . $conexion->error;
	                }
	}
}
mysqli_close($conexion);
?> 