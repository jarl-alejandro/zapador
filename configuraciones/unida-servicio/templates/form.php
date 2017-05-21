<header class="panel-heading bg-info margin-bottom">
   <h5 class="no-margin text-center">Regitrar Nueva Unidad de Servisio</h5>
</header>
<form class="">
  <input type="hidden" id="id" />
  <div class="col-xs-12 col-md-6 form-group">
    <input type="text" placeholder="Escribe una unidad de servicio" class="form-control" 
      maxlength="80" onkeypress="letras()" id="unidad" />
  </div>
  <div class="col-xs-12 col-md-6 form-group">
    <input type="text" placeholder="Escribe la ciudad" class="form-control" 
      maxlength="140" id="detalle" />
  </div>
 
  <div class="col-xs-12 center-flex__container">
    <button class="btn btn-embossed btn-danger" id="close">Cerrar</button>
    <button class="btn btn-embossed btn-primary" id="save">Guardar</button>
  </div>
</form>