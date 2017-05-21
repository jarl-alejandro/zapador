<div class="panel panel-primary panel-materias col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1 col-md-5 col-md-offset-3">
  <div class="panel-heading">
    <h3 class="panel-title text-center">MATERIAS</h3>
  </div>
  <div class="panel-body">
    <table class="col-xs-12 table-striped table-hover table-advance ">
      <thead>
        <tr class="btn-primary">
          <th class="text-center">Nombre</th>
        </tr>
      </thead>
      <tbody>
      <?php
        if($materias->rowCount() == 0){
          echo "<tr><td colspan='2' class='text-center'>No hay materias registrado</td></tr>";
        }
        foreach ($materias as $row):
      ?>
      <tr>
        <td class="text-center">
          <label class="checkbox" for="<?=$row["zm_cod"];?>_materia" style="cursor:pointer">
            <input type="checkbox" data-toggle="checkbox" id="<?=$row["zm_cod"];?>_materia" class="materiasList"
              data-id="<?=$row["zm_cod"];?>" data-name="<?=$row["zm_mat"];?>">
            <?= $row["zm_mat"] ?>
          </label>
        </td>
      </tr>
      <?php endforeach; ?>      
      </tbody>
    </table>
  </div>
  <div class="panel-footer flex-center">
    <button class="btn btn-embossed btn-danger" id="closeMaterias" style="margin-right:1em;">Cerrar</button>
    <button class="btn btn-embossed btn-primary" id="aceptMaterias">Aceptar</button>
  </div>
</div>