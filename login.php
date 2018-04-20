<?php
include 'conexion.php';
$usuario=$_POST['usuario'];
$contrasena=$_POST['contrasena'];
	if ($usuario==NULL || $contrasena==NULL) {
		header('Location: loginVista.php?mensaje=1');
	}
	else{
		$sql="SELECT correo,contrasena,nombre,id FROM usuario WHERE correo='$usuario'";
		$result= mysqli_query($conexion,$sql);
		echo mysqli_error($conexion);

		while ($row = mysqli_fetch_row($result)){
			$correo=$row[0];
			$password=$row[1];
			$nombre=$row[2];
			$id=$row[3];
		}
	if($password==$contrasena){
		session_start();
		$_SESSION['name']=$nombre;
		$_SESSION['id']=$id;

		
		header('Location: index.php');
	}
	else {
		header('Location: loginVista.php?mensaje=2');
	}
}
?>