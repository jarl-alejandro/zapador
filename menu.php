<nav class="navbar navbar-inverse navbar-embossed" role="navigation">
  <div class="navbar-header" style="margin-top:.4em;">

    <button class="Header-button--toolbar" id="toolbar-button">
      <span class="Header-icons--line"></span>
    </button>
    <a class="navbar-brand" href="#">S.G.A. Zapador v1.0 </a>

    <button type="button" class="fui-list-large-thumbnails btn btn-danger btn-embossed navInfo" data-toggle="collapse" data-target="#navbar-collapse-01">
      <span class="sr-only">Toggle navigation navbar-toggle</span>
    </button>
    
  </div>
  <div class="collapse navbar-collapse pull-right" id="navbar-collapse-01">
    
    <!--style="display:flex !important;align-items: center;"-->
    
    <aside class="navbar-form navbar-left" action="#" role="search" style="margin-top: 9px;">
      <div class="form-group">
        <div class="input-group">
        <input class="form-control" id="searchTerm" type="search" placeholder="Buscar...">
        <span class="input-group-btn">
          <button type="submit" class="btn btn-search" style="background-color: #f5f5f5;"><span class="fui-search"></span></button>
        </span>
      </div>
    </aside>

    <ul class="nav navbar-nav navbar-left">
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
           <img src="../../media/fotos/natzu.jpg" alt="Natzu" class="usuario--foto"> <?=$nombre?> 
           <!--<b class="caret"></b>-->
        </a>
        <span class="dropdown-arrow"></span>
        <ul class="dropdown-menu">
          <li><a href="../../configuraciones/usuarios">Cambiar Datos</a></li>
          <li><a href="../../configuraciones/grado-militar">Actualizar Contraseña</a></li>
          <li><a href="../../service/logout.php">Cerrar Sesión</a></li>
        </ul>
      </li>
    </ul>

    

  </div><!-- /.navbar-collapse -->
</nav>
<?php 
  require "../../toolbar.php";
?>