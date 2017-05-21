<header class="panel-heading bg-info margin-bottom">
   <h5 class="no-margin text-center">Regitrar Nuevo Curso</h5>
</header>
<form class="">
  <input type="hidden" id="id" />
  <div class="col-xs-12  form-group">
    <input type="text" placeholder="Ingresa el curso" class="form-control" 
      maxlength="80" id="curso" />
  </div>
  <div class="col-xs-6  form-group">
    <input type="text" placeholder="Ingrese los creditos del curso" class="form-control" 
      maxlength="10" id="creditos" onkeypress="numeros()" />
  </div>
  <div class="col-xs-6  form-group">
    <input type="text" placeholder="Ingrese el numero de materias para cursar" class="form-control" 
      maxlength="10" id="materias" onkeypress="numeros()" />
  </div>
  <div class="col-xs-3  form-group">
    <input type="text" placeholder="Ingrese el numero de estudaintes" class="form-control" 
      maxlength="10" id="numeroEstudiantes" onkeypress="numeros()" />
  </div>
  <div class="col-xs-3  form-group">
    <input type="text" placeholder="Ingrese el numero de materias para cursar" class="form-control" 
      maxlength="10" id="numeroExtra" onkeypress="numeros()" />
  </div>
  <div class="col-xs-offset-8 col-md-offset-10 margin-bottom">
    <button class="btn btn-embossed btn-warning" id="polvorin">Polvorin</button>
  </div>
  <div class="col-xs-10 col-md-10 col-md-offset-1 col-lg-9 col-lg-offset-1 table-responsive">
    <table class="table-striped table-hover table-advance table-bordered col-xs-10" id="TabFilterPolvorin">
      <thead>
        <tr class="btn-warning">
          <th class="text-center" width="30%">Cant</th>
          <th class="text-center" width="40%">Polvorin</th>
          <th class="text-center" width="30%">Eliminar</th>
        </tr>
      </thead>
      <tbody id="polvorinBody">
        <td colspan="3" class="text-center">Ingrese el polvorin</td>
      </tbody>
    </table>
  </div>
  <div class="col-xs-12 center-flex__container">
    <button class="btn btn-embossed btn-danger" id="close">Cerrar</button>
    <button class="btn btn-embossed btn-primary" id="save" data-action="guardar">Guardar</button>
  </div>
</form>

