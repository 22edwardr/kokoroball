<?php
    include 'sesion.php';
    if(isset($_GET['lang']))
        $_SESSION['lang'] = $_GET['lang'];

    if(isset($_GET['pag']))
        header('Location: '.$_GET['pag']);
    else
        header('Location: index.php');
?>