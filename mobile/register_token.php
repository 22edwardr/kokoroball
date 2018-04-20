<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
require "base.php";
global $con;
$from_token = $_POST["from_token"];
$id_usuario = $_POST["id"];
//$persona = $_POST["persona"];
$sql = "UPDATE usuario
SET cell_token='$from_token'
WHERE id='$id_usuario'";
  $response  = array();
$final = mysqli_query($con,$sql);
if(!$final){

       $response[] = array("estado"=>"Registro malo".mysql_error());
    }else{
    	 $response[] = array("estado"=>"Registro Exitoso");
    }
mysqli_close($con);
echo json_encode(array('response'=>$response));
}
?>