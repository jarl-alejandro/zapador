<?php
require "../../conexion.php";
$nomina = $pdo->query("SELECT * FROM zview_nomina");
$cursos = $pdo->query("SELECT * FROM zp_curso");
date_default_timezone_set('America/Guayaquil');
$hoy = date("Y-m-d");
$fecha = date("d/m/Y");
?>
<header class="panel-heading bg-info margin-bottom">
   <h5 class="no-margin text-center">Regitrar de Nueva Formacion de Curso</h5>
</header>
<form class="">
  <input type="hidden" id="id" />
  <input type="hidden" value="<?= $fecha ?>" id="DateMin">

  <div class="col-xs-12 form-group">
    <input class="form-control" id="curso-alias" placeholder="Escribe el nombre del curso" maxlength="140" />
  </div>

  <div class="col-xs-12 col-md-6 form-group">
    <select class="form-control select select-primary select-block mbl" data-toggle="select" id="curso">
      <option value=''>Selecione el curso</option>
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
    <select class="form-control select select-primary select-block mbl" data-toggle="select" id="nomina">
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
  <div class="col-xs-12 col-md-6 form-group">
    <input type="text" class="form-control fechaPicker" id="fecha-inicio" placeholder="Ingresa la fecha que inica el curso" />
  </div>
  <div class="col-xs-12 col-md-6 form-group">
    <input type="text" class="form-control fechaPicker" id="fecha-final" placeholder="Ingresa la fecha que finaliza el curso" />
  </div>
  <div class="col-xs-12 col-md-6  form-group">
    <input type="text" placeholder="Ingrese el id del video de youtube" class="form-control" id="video" />
  </div>

  <!--<div class="col-xs-12" style="margin-bottom:1em;display: flex;justify-content: space-around;">-->
    <!--<button class="btn btn-embossed btn-info col-xs-5" id="showMaterias">Materias</button>-->
    <!--<button class="btn btn-embossed btn-inverse col-xs-5 col-xs-offset-1" id="showAlumnos">Alumnos</button>-->
  <!--</div>-->

  <!--<div id="alumosContainer">
    <div class="col-xs-offset-8 col-md-offset-10 margin-bottom">
      <button class="btn btn-embossed btn-warning" id="alumnosList">Alumnos</button>
    </div>

    <div class="col-xs-10 col-md-10 col-md-offset-1 col-lg-9 col-lg-offset-1 table-responsive">
      <table class="table-striped table-hover table-advance table-bordered col-xs-10" id="TabFilterAlumnos">
        <thead>
          <tr class="btn-warning">
            <th class="text-center" width="40%">Alumno</th>
            <th class="text-center" width="30%">Eliminar</th>
          </tr>
        </thead>
        <tbody id="alumnosBody">
          <td colspan="3" class="text-center">Ingrese los alumnos</td>
        </tbody>
      </table>
    </div>
  </div>-->

  <div id="materiasContainer">
    <div class="col-xs-offset-8 col-md-offset-10 margin-bottom">
      <button class="btn btn-embossed btn-warning" id="materiasList">Materias</button>
    </div>

    <div class="col-xs-10 col-md-10 col-md-offset-1 col-lg-9 col-lg-offset-1 table-responsive">
      <table class="table-striped table-hover table-advance table-bordered col-xs-10" id="TabFilterMaterias">
        <thead>
          <tr class="btn-warning">
            <th class="text-center" width="40%">Materias</th>
            <th class="text-center" width="30%">Eliminar</th>
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
    <button class="btn btn-embossed btn-primary" id="save" data-action="guardar">Guardar</button>
  </div>
</form>

