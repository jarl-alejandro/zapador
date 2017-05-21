<?php
require "../../conexion.php";
?>
<header class="panel-heading bg-info margin-bottom">
   <h5 class="no-margin text-center">Ingresar Polvorin</h5>
</header>
<form class="">
  <input type="hidden" id="id" />
  <div class="col-xs-12 form-group">
    <input type="text" placeholder="Escribe un pequeño informe" class="form-control" 
      maxlength="80"  id="detalle" />
  </div>
  <div class="col-xs-12 col-md-6 form-group">
    <input type="text" placeholder="Escribe la cantidad" class="form-control" 
      maxlength="4" onkeypress="numeros()" id="cant" />
  </div>

 
  <div class="col-xs-12 center-flex__container">
    <button class="btn btn-embossed btn-danger" id="close">Cerrar</button>
    <button class="btn btn-embossed btn-primary" id="save">Guardar</button>
  </div>
</form>