<?php
include 'conexion.php';
include 'sesion.php';

$id=$_POST['id'];
$nombre=$_POST['nombre'];
$descripcion=$_POST['descripcion'];
$link=$_POST['link'];
$accion=$_POST['accion'];
$playlist = $_POST['playlist'];

if($accion !="Eliminar"){
	if($nombre == ""  || $link==""){
		header('Location: playlist.php?playlist='.$playlist.'&mensaje=4');
	}

	$link = youtube_parse_youtube_id($link);

	if($link == false || strlen($link) != 11){
		header('Location: playlist.php?playlist='.$playlist.'&mensaje=5');
	}
}
$sql = "SET time_zone ='-5:00'";
if($conexion->query($sql) === FALSE){
        echo "Contactese con el administrador del sistema error al realizar operacion en base de datos:  ". $sql . "<br>" . $conexion->error;
}else{	
	$mensaje=0;

	        if($accion=="Guarda"){
	                $sql = "UPDATE playlist SET nombre='".$nombre."', descripcion='".$descripcion."',link='".$link."',fecha=now(),id_usuario='".$_SESSION['id']."' WHERE id=".$id;
	                $mensaje=1;
	                }
	        else if($accion=="Inserta"){
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
mysqli_close($conexion);


function youtube_parse_youtube_id( $data )
{
	if( strlen($data) == 11 )
	{
		return $data;
	}
	
	preg_match( "/^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/", $data, $matches);
	return isset($matches[2]) ? $matches[2] : false;
}
?> 