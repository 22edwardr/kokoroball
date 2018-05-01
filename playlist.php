<?php
include 'sesion.php';
include 'conexion.php';
require_once 'i18n.init.php';
   
   $sql = 'SELECT p.id,p.nombre,p.descripcion,p.link,p.id_usuario,p.fecha FROM playlist p WHERE lista_playlist='.$_GET['playlist'].' order by RAND()';
?>
<html lang="es">
	<head>
		
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<link rel="stylesheet" href="css/bootstrap-theme.min.css"/>
		<link rel="stylesheet" href="css/styles.css"/>
		<style>
		a:hover {
		    color: white;
		}

		/* selected link */
		a:active {
		    color: white;
		}
		a{
			color: white;	
		}

		</style>
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
			 		<strong><?php echo L::Mensaje; ?></strong><div style="display:inline;" id="mensajeTexto"></div>
				</div>
<?php
	$link = "https://www.youtube.com/embed/";
	$playlist = "?playlist=";
	$result= "";
	if($result = mysqli_query($conexion, $sql)){
    	if(mysqli_num_rows($result) > 0){
  			while($row = mysqli_fetch_array($result)){

  				
  				if($link == "https://www.youtube.com/embed/"){
					$link .= $row['link'].$playlist;
					}
				else if(substr_compare($link, $playlist, strlen($link)-strlen($playlist), strlen($link)) === 0){
						$link .=  $row['link'];
					}
				
				else{
					$link .= ",".$row['link'];	
  				}
			}
		}
	}
 ?>				
 				<div align="center">
					<iframe width="50%" height="35%" src="<?php echo $link; ?>" frameborder="0" allowfullscreen></iframe>
				<br/>
				<br/>
				<button type="submit" id="irAInsertar" data-toggle="modal" data-target="#myModal" class="btn btn-success" ><?php echo L::Inserta_un_nuevo_video; ?></button>
				<br/>
				<br/>
				</div>
				
<?php 
		mysqli_data_seek($result, 0 );
    	if(mysqli_num_rows($result) > 0){ 
    		$count = 1;?>
    		<table class="table table-responsive">
					<thead style="background-color: #303030;
    color: white;">
						<tr align="center">
							<td><?php echo L::Numero; ?></td>
							<td><?php echo L::Nombre; ?></td>
							<td><?php echo L::Descripcion; ?></td>
							<td><?php echo L::Zelda; ?></td>
							<td><?php echo L::Fecha; ?></td>
							<td><?php echo L::Cambiale_si_quieres; ?></td>
						</tr>
					</thead>
			<?php
  			while($row2 = mysqli_fetch_array($result)){?>
				<form action="modificarPlaylist.php" method="POST">	
  				<?php if($row2['id_usuario'] == 1){?>
  				<tr align="center" style="background-color: #843D65;
    color: white;">
						
				<?php
  				}
  				else{
  				?>

				<tr align="center" style="background-color: #7D4C75;
    color: white;">
    						
				<?php
  				}?>
						<td><?php echo $count;?></td>	
  						<td id="nombreCelda<?php echo $row2['id']; ?>"><?php echo $row2['nombre']; ?></td>
						<td id="descripcionCelda<?php echo $row2['id']; ?>"><?php echo $row2['descripcion']; ?></td>
						<td><a id="zeldaCelda<?php echo $row2['id']; ?>" href="<?php echo "https://www.youtube.com/watch?v=".$row2['link']; ?>" target="_blank"><?php echo $row2['link']; ?></a></td>
                                                <td><?php echo $row2['fecha']; ?> </td>
						<td><button type="button" class="btn btn-warning" id="editar<?php echo $row2['id'];?>" data-toggle="modal" data-target="#myModal"><?php echo L::Cambiale_we; ?></button>
							
							<input type="hidden" name="id" value="<?php echo $row2['id']; ?>"/>
							<input type="hidden" name="playlist" value="<?php echo $_GET['playlist']; ?>"/>
							<button type="submit" name="accion" onclick="return confirmar();" value="Eliminar" class="btn btn-danger"><?php echo L::Quitalo_YA; ?></button></td>

						
				</tr>
				</form>
			<?php
			$count++;
  			}
  			}
				?>

<!--<tr class="table-success">.-->
<!--<tr class="table-primary">-->

				</table>
			<!-- Trigger the modal with a button -->


				<div id="myModal" class="modal fade" role="dialog">
				  <div class="modal-dialog">

				    <!-- Modal content-->
				    <div class="modal-content">
				    	<form action="modificarPlaylist.php" method="POST">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal">&times;</button>
				        <h2 class="letra-negra modal-title "><?php echo L::Datos_del_Videito; ?></h2>
				      </div>
				      <div class="modal-body">
			      			<input type="hidden" name="id" id="idVideo" value=""/>
			      			<input type="hidden" name="playlist" value="<?php echo $_GET['playlist']; ?>"/>
							<label class="letra-negra" for="nombre"><?php echo L::Nombre; ?></label>
							<input id="nombre" type="text" name="nombre" class="form-control" maxlength="50"/>
							<br/>
							<label class="letra-negra" for="descripcion"><?php echo L::Descripcion; ?></label>
							<input id="descripcion" type="text" name="descripcion" class="form-control" maxlength="100"/>
							<br/>
							<label class="letra-negra" for="link"><?php echo L::Zelda_11_caracteres_de_youtube; ?></label>
							<input id="link" type="text" name="link" value="" class="form-control" maxlength="11"/>
							<br/>
				      </div>
				      <div class="modal-footer">
				      	<button type="button" id="checarLink" class="btn btn-warning"><?php echo L::Checa_que_tu_kokoro_lo_vea; ?></button>
				      	<button type="submit" id="guardar" class="btn btn-success" name="accion" value=""><?php echo L::Guardar; ?></button>
				        <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo L::Cancelar; ?></button>
				      </div>
				      </form>
				    </div>

				  </div>
				</div>
			</div>
		</div>
	</div>


	<script src="js/jquery-3.2.1.min.js"> </script>
	<script src="js/bootstrap.min.js"> </script>
	<script type="text/javascript">
		$(function(){
			$('#header').load('header.php',function(){
				document.getElementById("nombreUsuario").innerHTML = '<?php echo $_SESSION['name'] ?> <span class="caret"></span>';

				document.getElementById("playlist").className += "active";

				$('.cambioIdioma').each(function(index){
					$(this).attr('href',$(this).attr('href') + '<?php echo basename($_SERVER['PHP_SELF']); ?>' +location.search)
				});
				//class="active"
			});

			var codigoMensaje = '';
        	tmp = [];
    		location.search.substr(1).split("&").forEach(function (item) {
          		tmp = item.split("=");
          		if (tmp[0] === "mensaje") 
          			codigoMensaje = decodeURIComponent(tmp[1]);
        	});

			if(codigoMensaje != ''){
				document.getElementById('mensaje').style.display ='block' ;
				if(codigoMensaje == '1'){
					document.getElementById("mensaje").className += " alert-success";
					document.getElementById('mensajeTexto').innerHTML = '<?php echo L::Sugoi; ?>';
				}
				if(codigoMensaje == '2'){
					document.getElementById("mensaje").className += " alert-success";
					document.getElementById('mensajeTexto').innerHTML = '<?php echo L::Se_la_metiste_con_toda; ?>';
				}
				if(codigoMensaje=='3'){
					document.getElementById("mensaje").className += " alert-success";
					document.getElementById('mensajeTexto').innerHTML = '<?php echo L::No_dejaste_nada; ?>';
				}
				if(codigoMensaje=='4'){
					document.getElementById("mensaje").className += " alert-danger";
					document.getElementById('mensajeTexto').innerHTML = '<?php echo L::Que_GRAN_Fallo; ?>';
				}
			}

			$('#checarLink').click(function(){
				var win = window.open("https://unblockvideos.com/youtube-video-restriction-checker/#url="+document.getElementById('link').value, '_blank');
 				win.focus();
			});

				$('button').each(function(){
				if($( this ).attr('id')){
					if($( this ).attr('id').match(/editar/) ) {
						$( this ).click(function(){
							var video = $(this).attr('id').replace("editar","");
							document.getElementById('idVideo').value= video;
							document.getElementById('nombre').value = document.getElementById('nombreCelda'+video).innerText
							document.getElementById('descripcion').value = document.getElementById('descripcionCelda'+video).innerText
							document.getElementById('link').value = document.getElementById('zeldaCelda'+video).innerText
							document.getElementById('guardar').value="<?php echo L::Guarda; ?>";

						});
					}
					if($( this ).attr('id')== "irAInsertar"){
						document.getElementById('guardar').value="<?php echo L::Inserta; ?>";
					}
				}
			});
		});

		function confirmar() {
           	return confirm('<?php echo L::Esta_seguro_que_quiere_eliminar_este_videito; ?>');
       }
		
	</script>



	</body>
</html>