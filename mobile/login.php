<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
   
   require_once('base.php');
   $email=$_POST['email'];
   $password=$_POST['password'];

    $statement = mysqli_prepare($con, "SELECT id, nombre,correo FROM usuario WHERE correo=? AND contrasena =?");
    mysqli_stmt_bind_param($statement, "ss", $email,$password);
    mysqli_stmt_execute($statement);
    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement,$id,$nombre,$correo);

    $response = array();
    
    while(mysqli_stmt_fetch($statement)){
        $response[] = array("nombre"=>$nombre,"id"=>$id,"correo"=>$correo);
    }
    
    echo json_encode(array('response'=>$response));
}
?>