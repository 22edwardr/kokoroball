<?php
	session_start();
	if(!(isset($_SESSION['name']) && isset($_SESSION['id']))){
		header('Location: loginVista.php');
	}

	$playlist = "[{title:'Paramore-Decode',url:'https://www.youtube.com/watch?v=RvnkAtWcKYg'},{title:'Silverchair-Ana song',url:'https://www.youtube.com/watch?v=zNK_r2QAXAo'}]";
?>