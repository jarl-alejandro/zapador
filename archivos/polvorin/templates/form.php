<?php
require "../../conexion.php";

$tipo = $pdo->query("SELECT * FROM zp_tipo");
?>
<header class="panel-heading bg-info margin-bottom">
   <h5 class="no-margin text-center">Regitrar Nuevo Polvorin</h5>
</header>
<form class="">
  <input type="hidden" id="id" />
  <div class="col-xs-12 col-md-6 form-group">
    <input type="text" placeholder="Escribe una polvorin" class="form-control" 
      maxlength="80" onkeypress="letras()" id="polvorin" />
  </div>
  <div class="col-xs-12 col-md-6 form-group">
    <input type="text" placeholder="Escribe la cantidad" class="form-control" 
      maxlength="4" onkeypress="numeros()" id="cant" />
  </div>
  <div class="col-xs-12 col-md-6 form-group">
    <input type="text" placeholder="Escribe la cantidad maxima" class="form-control" 
      maxlength="4" onkeypress="numeros()" id="max" />
  </div>
  <div class="col-xs-12 col-md-6 form-group">
    <input type="text" placeholder="Escribe la cantidad minima" class="form-control" 
      maxlength="4" onkeypress="numeros()" id="min" />
  </div>

  <div class="col-xs-12 col-md-6 form-group">
    <select class="form-control select select-primary select-block mbl" data-toggle="select" id="categoria">
      <option value=''>Selecione la el tipo de explosivo</option>
      <?php
        if($tipo->rowCount() == 0){
          echo "<option value=''>No hay tiposde explosivos</option>";
        }
        foreach ($tipo as $row):
      ?>
        <option value="<?=$row["zt_cod"];?>"><?= $row["zt_expl"]; ?></option>
      <?php endforeach; ?>
    </select>
  </div>
 
  <div class="col-xs-12 center-flex__container">
    <button class="btn btn-embossed btn-danger" id="close">Cerrar</button>
    <button class="btn btn-embossed btn-primary" id="save">Guardar</button>
  </div>
</form>