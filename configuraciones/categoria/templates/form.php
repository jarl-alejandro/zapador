<header class="panel-heading bg-info margin-bottom">
   <h5 class="no-margin text-center">Regitrar Nuevo Categoria</h5>
</header>
<form class="">
  <input type="hidden" id="id" />
  <div class="col-xs-12 col-md-6 form-group">
    <input type="text" placeholder="Escribe una categoria" class="form-control" 
      maxlength="80" onkeypress="letras()" id="categoria" />
  </div>
  <div class="col-xs-12 col-md-6 form-group">
    <input type="text" placeholder="Escribe un detalle" class="form-control" 
      maxlength="140" id="detalle" />
  </div>
 
  <div class="col-xs-12 center-flex__container">
    <button class="btn btn-embossed btn-danger" id="close">Cerrar</button>
    <button class="btn btn-embossed btn-primary" id="save">Guardar</button>
  </div>
</form>