<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
   
   require_once('base.php');
    
    mysqli_query($con,'SET CHARACTER SET utf8');
    $statement = mysqli_prepare($con, "SELECT id, palabra FROM palabra");
    mysqli_stmt_execute($statement);
    
    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement, $id, $nombre);
    
    $response = array();
    
    while(mysqli_stmt_fetch($statement)){
        $response[] = array("id"=>$id,"nombre"=>$nombre);
    }
    
    echo json_encode(array('response'=>$response));
}
?>