<?php
require "../../conexion.php";
$grados = $pdo->query("SELECT * FROM zp_grados");
?>
<header class="panel-heading bg-info margin-bottom">
   <h5 class="no-margin text-center">Regitrar Nuevo Usuario</h5>
</header>
<form class="">
  <input type="hidden" id="id" />
  <div class="col-xs-12 col-md-6 form-group">
    <input type="text" placeholder="Ingresa el numero de cedula" class="form-control" 
      maxlength="13" onkeypress="numeros()" id="cedula" />
  </div>
  <div class="col-xs-12 col-md-6 form-group">
    <input type="text" placeholder="Ingresa el nombre" class="form-control" 
      maxlength="80" onkeypress="letras()" id="nombre" />
  </div>
  <div class="col-xs-12 col-md-6 form-group">
    <input type="text" placeholder="Ingresa el apellido" class="form-control" 
      maxlength="80" onkeypress="letras()" id="apellido" />  
  </div>
  <div class=" col-xs-12 col-md-6 form-group">
    <input type="text" placeholder="Ingresa la direccion" class="form-control" 
      maxlength="80" id="direccion" />  
  </div>
  <div class="col-xs-12 col-md-6 form-group">
    <input type="text" placeholder="Ingresa el celular" class="form-control" 
      maxlength="10" onkeypress="numeros()" id="celular" />  
  </div>
  <div class="col-xs-12 col-md-6 form-group">
    <input type="text" placeholder="Ingresa el telefono" class="form-control" 
      maxlength="10" onkeypress="numeros()" id="telefono" />  
  </div>
  <div class="col-xs-12 col-md-6 form-group">
    <input type="email" placeholder="Ingresa el e-mail" class="form-control" 
      maxlength="80" id="email" />  
  </div>
  <div class="col-xs-12 col-md-3 form-group">
    <input type="text" placeholder="Ingresa el tipo de sangre" class="form-control" 
      maxlength="4" id="sangre" />  
  </div>
  <div class="col-xs-12 col-md-3 form-group">
    <input type="text" placeholder="Ingresa la edad" class="form-control" 
      maxlength="4" id="edad" onkeypress="numeros()" />
  </div>
  <div class="col-xs-12 col-md-6 form-group">
    <select class="form-control select select-primary select-block mbl" data-toggle="select" id="grado">
      <option value=''>Selecione el grado</option>
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
  <div class="col-xs-12 col-md-6 form-group">
    <select class="form-control select select-primary select-block mbl" data-toggle="select" id="sexo">
      <option value=''>Selecione el sexo</option>
      <option value='hombre'>Hombre</option>
      <option value='mujer'>Mujer</option>
    </select>
  </div>
  <div class="col-xs-12 col-md-6 form-group">
    <select class="form-control select select-primary select-block mbl" data-toggle="select" id="estdoCivil">
      <option value=''>Selecione el estado civl</option>
      <option value='Soltero'>Soltero</option>
      <option value='Casado'>Casado</option>
    </select>
  </div>
  <div class="col-xs-12 col-md-6 form-group">
    <select class="form-control select select-primary select-block mbl" data-toggle="select" id="tipoUser">
      <option value=''>Selecione el tipode usuario</option>
      <option value='tropa'>Tropa</option>
      <option value='administracion'>Administracion</option>
    </select>
  </div>
  <div class="col-xs-12 center-flex__container">
    <button class="btn btn-embossed btn-danger" id="close">Cerrar</button>
    <button class="btn btn-embossed btn-primary" id="save">Guardar</button>
  </div>
</form>