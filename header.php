<?php
  include 'sesion.php';
  include 'i18n.init.php';
?>
<nav class="navbar navbar-inverse margin-0 navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
	  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar1" aria-expanded="false">
        <span class="sr-only"><?php echo L::Navegacion; ?> </span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <div class="collapse navbar-collapse" id="navbar1">
      <ul class="nav navbar-nav">
        <li id="index"><a id="muro" href="index.php"><?php echo L::Muro; ?> </a></li>
        <li id="playlist"><a href="lista_playlist.php"><?php echo L::Playlist; ?> </a></li>
        <li id="galeria"><a href="galeria.php"><?php echo L::Galeria; ?> </a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a class="cambioIdioma" href="<?php echo 'cambiarIdioma.php?lang=es&pag='; ?>"><img src="images/mexicoflag.png" alt="Español"></a></li>
        <li><a class="cambioIdioma" href="<?php echo 'cambiarIdioma.php?lang=en&pag='; ?>"><img src="images/britishflag.png" alt="Español"></a></li>
        <li><a class="cambioIdioma" href="<?php echo 'cambiarIdioma.php?lang=ja&pag='; ?>"><img src="images/japanflag.png" alt="Español"></a></li>
        <li class="dropdown">
          <a  id="nombreUsuario" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
          <ul class="dropdown-menu">
            <li><a href="#" id="texto"><?php echo L::Modificar_Perfil; ?> </a></li>
            <li><a href="cerrarSesion.php" id="cerrarSesion"><?php echo L::Cerrar_Sesion; ?> </a></li>
          </ul>
        </li>
     </ul>
    </div>
  </div>
</nav>

