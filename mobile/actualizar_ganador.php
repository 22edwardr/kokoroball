<?php


if($_SERVER["REQUEST_METHOD"]=='POST'){

require_once('base.php');

	$estado = $_POST['estado'];
	$intentos = $_POST['intentos'];
	$id = $_POST['id'];

	$query = "UPDATE loteria SET ganador='$estado',intentos='$intentos' WHERE id='$id' ";

	
	$final = mysqli_query($con, $query);
	if(!$final){
        echo 'No se pudo probar el resultado';
    }else{
    	 if($estado=='N'){
    	 	echo 'Lo siento kokoro no esta vez';
    	 }elseif($estado=='S'){
    	 	echo 'Tenemos un ganador!!!!!!!!!, reclamale a tu kokoro tu premio';
    	 }elseif($estado=='F'){
    	 	echo 'Tenemos un ganador con FUUUUUUUAAAAAAA!!!!!!!!!,reclamale a tu kokoro tu premio';
    	 }
    }

	mysqli_close($con);
	
}






?>