<?php
  $title = "Cursos";
  require "../../conexion.php";
  require "../../head.php";
  require "../../menu.php";
  $polvorin = $pdo->query("SELECT * FROM zp_polvorin");
?>
<main class="container">
  <div class="row" id="tabla_principal">
    <div class="col-sm-4 col-md-8  col-lg-11 botonera-actions">
      <button class="btn btn-embossed btn-success" id="showForm"><i class="fui-plus"></i></button>
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

<div class="panel panel-primary panel-polvorin col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1 col-md-5 col-md-offset-3">
  <div class="panel-heading">
    <h3 class="panel-title text-center">Polvorin</h3>
  </div>
  <div class="panel-body">
    <table class="col-xs-12 table-striped table-hover table-advance ">
      <thead>
        <tr class="btn-primary">
          <th width="35%" class="text-center">Polvorin</th>
        </tr>
      </thead>
      <tbody>
      <?php
        if($polvorin->rowCount() == 0){
          echo "<tr><td colspan='2' class='text-center'>No hay polvorin registrado</td></tr>";
        }
        foreach ($polvorin as $row):
      ?>
      <tr>
        <td class="text-center">
          <label class="checkbox" for="<?=$row["zp_cod"];?>_polvorin" style="cursor:pointer">
            <input type="checkbox" data-toggle="checkbox" id="<?=$row["zp_cod"];?>_polvorin" class="polvorinList"
              data-id="<?=$row["zp_cod"];?>" data-name="<?=$row["zp_det"];?>">
            <?= $row["zp_det"] ?>
          </label>
        </td>
      </tr>
      <?php endforeach; ?>      
      </tbody>
    </table>
  </div>
  <div class="panel-footer flex-center">
    <button class="btn btn-embossed btn-danger" id="closePolvorin" style="margin-right:1em;">Cerrar</button>
    <button class="btn btn-embossed btn-primary" id="aceptPolvorin">Aceptar</button>
  </div>
</div>

<?php require "../../script.php" ?>  
<script type="text/javascript" src="app/details.js"></script>
<script type="text/javascript" src="app/index.js"></script>
</body>
</html>
