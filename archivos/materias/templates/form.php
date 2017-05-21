<?php
require "../../conexion.php";

$nomina = $pdo->query("SELECT * FROM zview_nomina");
?>
<header class="panel-heading bg-info margin-bottom">
   <h5 class="no-margin text-center">Regitrar Nueva Materia</h5>
</header>
<form class="">
  <input type="hidden" id="id" />
  <div class="col-xs-12 col-md-6 form-group">
    <input type="text" placeholder="Escribe una materia" class="form-control" 
      maxlength="80" onkeypress="letras()" id="materia" />
  </div>
  <div class="col-xs-12 col-md-6 form-group">
    <select class="form-control select select-primary select-block mbl" data-toggle="select" id="nomina">
      <option value=''>Selecione la nomina de usuario</option>
      <?php
        if($nomina->rowCount() == 0){
          echo "<option value=''>No hay nomina de usuario</option>";
        }
        foreach ($nomina as $row):
      ?>
        <option value="<?=$row["zu_ced"];?>"><?= $row["usuario"]; ?></option>
      <?php endforeach; ?>
    </select>
  </div>
 
  <div class="col-xs-12 center-flex__container">
    <button class="btn btn-embossed btn-danger" id="close">Cerrar</button>
    <button class="btn btn-embossed btn-primary" id="save">Guardar</button>
  </div>
</form>