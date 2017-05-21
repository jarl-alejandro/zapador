<?php
require "../../conexion.php";
date_default_timezone_set('America/Guayaquil');

$nomina = $pdo->query("SELECT * FROM zview_nomina");
$cursos = $pdo->query("SELECT * FROM zp_curso");
$formacion = $pdo->query("SELECT * FROM v_formacion_curso");

$hoy = date("Y-m-d");
$fecha = date("d/m/Y");
?>
<header class="panel-heading bg-info margin-bottom">
   <h5 class="no-margin text-center">Regitrar de Nueva Formacion de Curso</h5>
</header>
<form class="">
  <input type="hidden" id="id" />
  <div class="col-xs-12 form-group">
    <!--<input class="form-control" id="curso-alias" placeholder="Escribe el nombre del curso" maxlength="140" />-->
    <select id="formacion" class="form-control select select-primary select-block mbl" data-toggle="select">
      <option value="">Seleciona el cuso</option>
      <?php
        if($formacion->rowCount() == 0){
          echo "<option value=''>No hay curso</option>";
        }
        foreach ($formacion as $row):
      ?>
        <option value="<?=$row["zf_cod"];?>"><?= $row["zf_alias"]; ?></option>
      <?php endforeach; ?>
    </select>
  </div>

  <div class="col-xs-12 col-md-6 form-group">
    <select class="form-control select select-primary select-block mbl" data-toggle="select" id="curso" disabled>
      <option value=''>Selecione el categoria del curso</option>
      <?php
        if($cursos->rowCount() == 0){
          echo "<option value=''>No hay curso</option>";
        }
        foreach ($cursos as $row):
      ?>
        <option value="<?=$row["zc_codigo"];?>"><?= $row["zc_curso"]; ?></option>
      <?php endforeach; ?>
    </select>
  </div>
  <div class="col-xs-12 col-md-6 form-group">
    <select class="form-control select select-primary select-block mbl" data-toggle="select" id="nomina" disabled>
      <option value=''>Selecione el tutor del curso</option>
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
  <div class="col-xs-12 col-md-3  form-group">
    <input type="text" class="form-control fechaPicker" id="fecha-inicio" placeholder="<?= $fecha ?>" disabled />
  </div>
  <div class="col-xs-12 col-md-3 form-group">
    <input type="text" class="form-control fechaPicker" id="fecha-final" placeholder="<?= $fecha ?>" disabled />
  </div>
  <div class="col-xs-12 col-md-6  form-group">
    <button class="btn btn-embossed btn-danger col-xs-offset-9" id="ver-video" data-video="">Ver Video</button>  
    <input type="hidden" placeholder="Ingrese el id del video de youtube" class="form-control fechaPicker" id="video" disabled />
  </div>

   <div id="materiasContainer">
    <div class="col-xs-10 col-md-10 col-md-offset-1 col-lg-9 col-lg-offset-1 table-responsive">
      <table class="table-striped table-hover table-advance table-bordered col-xs-10" id="TabFilterMaterias">
        <thead>
          <tr class="btn-warning">
            <th class="text-center" width="40%">Materias</th>
            <th class="text-center" width="30%">Estudiante</th>
            <th class="text-center" width="10%">Nota 1</th>
            <th class="text-center" width="10%">Nota 2</th>
            <th class="text-center" width="10%">Nota 3</th>
          </tr>
        </thead>
        <tbody id="materiasBody">
          <td colspan="3" class="text-center">Ingrese las materias</td>
        </tbody>
      </table>
    </div>
  </div>

  <div class="col-xs-12 center-flex__container">
    <button class="btn btn-embossed btn-danger" id="close">Cerrar</button>
    <!--<button class="btn btn-embossed btn-primary" id="save" data-action="guardar">Guardar</button>-->
  </div>
</form>

