<?php
include 'conexion.php';
include 'sesion.php';
include 'i18n.class.php';

$id=$_POST['id'];
$nombre=$_POST['nombre'];
$descripcion=$_POST['descripcion'];
$link=$_POST['link'];
$accion=$_POST['accion'];
$playlist = $_POST['playlist'];

if($accion !="Eliminar" && ($nombre == ""  || $link=="")){
	header('Location: playlist.php?playlist='.$playlist.'&mensaje=4');
}
else{
$sql = "SET time_zone ='-5:00'";
	
if($conexion->query($sql) === FALSE){
        echo "Contactese con el administrador del sistema error al realizar operacion en base de datos:  ". $sql . "<br>" . $conexion->error;
}else{
			$mensaje=0;

	        if($accion==L::Guarda){
	                $sql = "UPDATE playlist SET nombre='".$nombre."', descripcion='".$descripcion."',link='".$link."',fecha=now(),id_usuario='".$_SESSION['id']."' WHERE id=".$id;
	                $mensaje=1;
	                }
	        else if($accion==L::Inserta){
	                $sql ="INSERT INTO playlist(nombre,descripcion,link,fecha,id_usuario,lista_playlist) VALUES ('".$nombre."','".$descripcion."','".$link."',now(),'".$_SESSION['id']."','".$playlist."')";
	                $mensaje=2;
	                }
	        else{
	                $sql= "DELETE FROM playlist WHERE id=".$id;
	                $mensaje=3;
	        }
	        
	        
	        if($conexion->query($sql) === TRUE){

	                        header('Location: playlist.php?playlist='.$playlist.'&mensaje='.$mensaje);
	                } else {
	                        echo "Contactese con el administrador del sistema error al realizar operacion en base de datos". $sql . "<br>" . $conexion->error;
	                }
	}
}
mysqli_close($conexion);
?> 