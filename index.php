<?php
include 'sesion.php';
include 'conexion.php';
   
   $sql = 'SELECT publicacion.id,descripcion,fecha,titulo,nombre FROM publicacion JOIN usuario ON usuario.id=publicacion.id_usuario order by fecha desc,id desc';
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
				<div id="mensaje" style="display:none;" class="alert alert-dismissible" role="alert">
		 			<strong>Mensaje: </strong><div style="display:inline;" id="mensajeTexto"></div>
				</div>
				<form action="insertarPublicacion.php" method="POST">
					<div class="form-group">
						<label for="titulo">Aqui un titulo genial!!!</label>
						<input id="titulo" type="text" name="titulo" class="form-control" maxlength="50"/>
					</div>
					<div class="form-group">
						<label for="descripcion">Escribe lo que quieras amor</label>
						<textarea id="descripcion" name="descripcion" class="form-control" rows="5" maxlength="1000"></textarea>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Mandalo!!!!!!!</button>
						<button type="button" id="noti" class="btn btn-danger">Notificale a tu kokoro</button>
					</div>
				</form>

<?php
if($result = mysqli_query($conexion, $sql)){
    if(mysqli_num_rows($result) > 0){
  while($row = mysqli_fetch_array($result)){?>

			      <form action="modificarPublicacion.php" method="POST">
			      <br/>
				      	<div class="form-group" style="padding-bottom: 3%;">
							<div class="col-md-4">
								<input id="titulo<?php echo $row['id'];?>" type="text" name="titulo" class="form-control" value="<?php echo $row['titulo'];?>" maxlength="50" disabled/>
							</div>
							<div class="col-md-4">
								<input id="fecha<?php echo $row['id'];?>" type="text" name="fecha" class="form-control" value="<?php echo $row['fecha'];?>" maxlength="50" disabled/>
							</div>
							<div class="col-md-4">
								<input id="usuario<?php echo $row['id'];?>" type="text" name="usuario" class="form-control" value="<?php echo $row['nombre'];?>" maxlength="50" disabled/>
							</div>
						</div>
		
				      	<div class="form-group">
							<input type="hidden" name="id" value="<?php echo $row['id'];?>"/>
							<textarea style="display:none;" id="descripcion<?php echo $row['id'];?>" name="descripcion" class="form-control" rows="5" maxlength="1000" ><?php echo $row['descripcion'];?></textarea>
						</div>
						<div class="form-group">
							<button style="display:none;" type="submit" id="guardar<?php echo $row['id'];?>" class="btn btn-success" name="accion" value="Guarda">Guardar</button>
							<button style="display:none;" type="submit" id="eliminar<?php echo $row['id'];?>" class="btn btn-danger" name="accion" value="Elimina">Eliminar</button>
						</div>
					</form>
					<br/>
					<div id="html<?php echo $row['id'];?>" contenteditable="false"><?php echo $row['descripcion'];?></div>
					<br/>
					<a id="editar<?php echo $row['id'];?>" href="#titulo<?php echo $row['id'];?>" class="btn btn-warning">Cual editado papu :V</a>

   <?php
   			}
		}
	}

   mysqli_close($conexion);
   ?>
			</div>
		</div>
	</div>



	<script src="js/jquery-3.2.1.min.js"> </script>
	<script src="js/bootstrap.min.js"> </script>
	<script type="text/javascript">
		$(function(){
			$('#header').load('header.php',function(){
				document.getElementById("nombreUsuario").innerHTML = '<?php echo $_SESSION['name'] ?> <span class="caret"></span>';

				document.getElementById("index").className += "active";
			});

			var codigoMensaje = location.search.substr(1).split("?");
			codigoMensaje = codigoMensaje[0].replace("mensaje=","");

			if(codigoMensaje != ''){
				document.getElementById('mensaje').style.display ='block' ;
				if(codigoMensaje == '1'){
					document.getElementById("mensaje").className += " alert-danger";
					document.getElementById('mensajeTexto').innerHTML = 'No seas we :V te falta el titulo';
				}
				if(codigoMensaje == '2'){
					document.getElementById("mensaje").className += " alert-danger";
					document.getElementById('mensajeTexto').innerHTML = 'Estas bien pendejo ni publicacion le hiciste';
				}
				if(codigoMensaje=='3'){
					document.getElementById("mensaje").className += " alert-success";
					document.getElementById('mensajeTexto').innerHTML = 'Todo bonito';
				}
				if(codigoMensaje=='4'){
					document.getElementById("mensaje").className += " alert-success";
					document.getElementById('mensajeTexto').innerHTML = 'Oki';
				}
			}

			$('#noti').click(function(){
				var win = window.open("https://console.firebase.google.com/", '_blank');
 				win.focus();
			});

			$('a').each(function(){
				if($( this ).attr('id')){
					if($( this ).attr('id').match(/editar/) ) {
						$( this ).click(function(){
							var publicacion = $(this).attr('id').replace("editar","");
							if(document.getElementById('descripcion'+publicacion).style.display == 'block'){
								document.getElementById('descripcion'+publicacion).style.display ='none' ;
								document.getElementById('guardar'+publicacion).style.display ='none' ;
								document.getElementById('eliminar'+publicacion).style.display ='none' ;
								document.getElementById('html'+publicacion).style.display ='block' ;
								 $('#titulo'+publicacion).prop("disabled", true);
							}
							else{
								document.getElementById('descripcion'+publicacion).style.display ='block' ;
								document.getElementById('guardar'+publicacion).style.display ='inline' ;
								document.getElementById('eliminar'+publicacion).style.display ='inline' ;
								document.getElementById('html'+publicacion).style.display ='none' ;
								$('#titulo'+publicacion).prop("disabled", false);
							}


						});
					}
				}
			});

		});
		
	</script>



	</body>
</html>