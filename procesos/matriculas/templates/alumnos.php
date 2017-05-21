<?php
require "../../conexion.php";
$grados = $pdo->query("SELECT * FROM zp_grados");
?>
<div class="panel panel-primary panel-alumnos col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1 col-md-5 col-md-offset-3">
  <div class="panel-heading">
    <h3 class="panel-title text-center">Alumnos</h3>
  </div>
  <div class="col-xs-12 col-md-7 col-md-offset-3" style="margin-top:1em;">
    <select class="form-control select select-primary select-block mbl" data-toggle="select" 
            id="grado-panel">
      <option value=''>Todos los grados</option>
      <?php
        if($grados->rowCount() == 0){
          echo "<option value=''>No hay grados</option>";
        }
        foreach ($grados as $row):
      ?>
        <option value="<?=$row["zg_cod"];?>"><?= $row["zg_det"]; ?></option>
      <?php endforeach; ?>
    </select>
  </div>
  <div class="panel-body">
    <table class="col-xs-12 table-striped table-hover table-advance ">
      <thead>
        <tr class="btn-primary">
          <th class="text-center">Nomina</th>
        </tr>
      </thead>
      <tbody>
      <?php
        if($alumnos->rowCount() == 0){
          echo "<tr><td colspan='2' class='text-center'>No hay nomina registrado</td></tr>";
        }
        foreach ($alumnos as $row):
      ?>
      <tr>
        <td class="text-center alumnoPanel" data-grado="<?=$row["zg_cod"];?>">
          <label class="checkbox" for="<?=$row["zu_ced"];?>_alumno" style="cursor:pointer">
            <input type="checkbox" data-toggle="checkbox" id="<?=$row["zu_ced"];?>_alumno" class="alumnosList"
              data-id="<?=$row["zu_ced"];?>" data-name="<?=$row["usuario"];?>">
            <?= $row["usuario"] ?>
          </label>
        </td>
      </tr>
      <?php endforeach; ?>      
      </tbody>
    </table>
  </div>
  <div class="panel-footer flex-center">
    <button class="btn btn-embossed btn-danger" id="closeAlumnos" style="margin-right:1em;">Cerrar</button>
    <button class="btn btn-embossed btn-primary" id="aceptAlumnos">Aceptar</button>
  </div>
</div>