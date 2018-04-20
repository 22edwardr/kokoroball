<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
   
   require_once('base.php');
    
    mysqli_query($con,'SET CHARACTER SET utf8');
    $statement = mysqli_prepare($con, "SELECT id,valor,mensaje,valor_maximo,palabra,intentos FROM loteria WHERE intentos>0 AND ganador='N' ORDER BY fecha DESC LIMIT 1");
    mysqli_stmt_execute($statement);
    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement,$id,$valor,$mensaje,$valor_maximo,$palabra,$intentos);

    $response = array();
    
    while(mysqli_stmt_fetch($statement)){
        $response[] = array("id"=>$id,"ganador"=>$valor,"mensaje"=>$mensaje,"maximo"=>$valor_maximo,"palabra"=>$palabra,"intentos"=>$intentos);
    }
    
    echo json_encode(array('response'=>$response));
}
?>