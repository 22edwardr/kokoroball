<html lang="es">
	<head>
		<link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="images/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="s/favicon-16x16.png">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<link rel="stylesheet" href="css/bootstrap-theme.min.css"/>
		<title>Bienvenido a nuestra pagina? :v</title>
		<style>
		body{
			background-image: url("images/fondoLogin.png");
			background-size:cover;
		}

		.tituloPrincipal{
			padding-top: 20px;
			padding-bottom: 100px;
		}
		.texto-blanco{
			color:#FFF;
		}
		</style>
	</head>
	<body>

	<div class="container-fluid">
		<div id="mensaje" style="display:none;" class="alert alert-danger alert-dismissible" role="alert">
 			<strong>Error! </strong><div style="display:inline;" id="mensajeTexto"></div>
		</div>
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
			<div class="jumbotron" style="background:transparent !important">
				<div class="tituloPrincipal texto-blanco">
					<h1 class="text-center">KokoroBall</h1>
				</div>
					<form class="form-horizontal" action="login.php" method="POST">
						<div class="form-group">
							<div class="row">
								<label for="usuarioInput" class="col-md-4 control-label texto-blanco ">Usuario</label>
								<div class="col-md-8">
									<input class="form-control" id="usuarioInput" type="text" name="usuario" placeholder="Ingresa tu Usuario">
								</div>	
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<label for="passInput" class="col-md-4 control-label texto-blanco">Contraseña</label>
								<div class="col-md-8">
									<input id="passInput" class="form-control" type="password" name="contrasena" placeholder="Ingresa tu contraseña">
							</div>
						</div>
						<br>
						<div class="form-group">
							<div class="col-md-2 col-md-offset-5">
								<button type="submit" class="btn btn-default">Entrar</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
		<script src="js/bootstrap.min.js"> </script>
		<script src="js/jquery-3.2.1.min.js"></script>
		<script type="text/javascript">	 
		var codigoMensaje = location.search.substr(1).split("?");
		codigoMensaje = codigoMensaje[0].replace("mensaje=","");

		if(codigoMensaje != ''){
			document.getElementById('mensaje').style.display ='block' ;
			if(codigoMensaje == '1'){
				document.getElementById('mensajeTexto').innerHTML = 'No ha colocado campos obligatorios';
			}
			if(codigoMensaje=='2'){
				document.getElementById('mensajeTexto').innerHTML = 'Usuario o contraseña incorrectos, intente nuevamente';
			}
		}
		 </script>		
	</body>

</html>