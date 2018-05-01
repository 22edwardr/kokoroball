<?php
include 'sesion.php';
require_once 'i18n.init.php';
?>
<html lang="es">
	<head>
		
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<link rel="stylesheet" href="css/bootstrap-theme.min.css"/>
		<link rel="stylesheet" href="css/styles.css"/>
		<link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="images/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
		<title>:v</title>

		<header id="header">
			
		</header>
	</head>
	<body>

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2 hidden-xs hidden-sm fondo-lado">
			 	<div class="fondo-lado sidebar-nav-fixed pull-right affix">
					<img src="images/delDESTINO.png" alt="delDESTINO" class="img-responsive">
				</div>
			</div>
			<div class="col-md-10 espacio-contenido">
				
			</div>
		</div>
	</div>


	<script src="js/jquery-3.2.1.min.js"> </script>
	<script src="js/bootstrap.min.js"> </script>
	<script type="text/javascript">
		$(function(){
			$('#header').load('header.php',function(){
				document.getElementById("nombreUsuario").innerHTML = '<?php echo $_SESSION['name'] ?> <span class="caret"></span>';

				document.getElementById("galeria").className += "active";

				$('.cambioIdioma').each(function(index){
					$(this).attr('href',$(this).attr('href') + '<?php echo basename($_SERVER['PHP_SELF']); ?>' +location.search)
				});
				//class="active"
			});
		});
		
	</script>



	</body>
</html>