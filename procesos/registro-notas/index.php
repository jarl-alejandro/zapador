<?php
  $title = "Registro de Notas";
  require "../../conexion.php";
  require "../../head.php";
  require "../../menu.php";

?>
<main class="container">
  <div class="row" id="tabla_principal">
    <div class="col-sm-4 col-md-8  col-lg-11 botonera-actions">
      <button class="btn btn-embossed btn-info"><i class="fui-document"></i></button>
     </div>
    <div class=" col-sm-10 col-sm-offset-2 col-xs-12 col-md-10 col-md-offset-1" id="containerTable"></div>
 	</div>
	<div class="row">
		<!--<div class="containerForm col-sm-8 col-sm-offset-3 col-md-8 col-md-offset-3 col-lg-6 col-lg-offset-3">-->
		<div class="containerForm col-xs-12 col-md-10 col-md-offset-1">
	 		<?php require "templates/form.php" ?>
   	</div>
	</div>
</main>

<?php
  require "templates/video.php";
  require "../../script.php" ;
?>  
<script type="text/javascript" src="app/details.js"></script>
<script type="text/javascript" src="app/index.js"></script>
</body>
</html>
