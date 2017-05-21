<?php
require "../../../conexion.php";
$materias = $pdo->query("SELECT * FROM zp_materia");
$index = 0;
?>
 <header class="panel-heading bg-info margin-bottom">
   <h5 class="no-margin text-center">LISTA DE MATERIAS</h5>
</header>
<div class="table-responsive">
  <table class="table-striped table-hover table-advance table-bordered col-xs-12" id="TabFilter">
    <thead>
      <tr class="bg-cafe">
        <th class="text-center" width="80%">Materias</th>
        <th class="text-center" width="20%">Acciones</th>
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
        <td><?= $row["zm_mat"] ?></td>
        <td class="flex-around">
          <button class="btn btn-embossed btn-primary editar" data-id="<?=$row["zm_cod"];?>">
            <i class="fui-new"></i>
          </button>
          <button class="btn btn-embossed btn-danger eliminar" data-id="<?=$row["zm_cod"];?>">
            <i class="fui-cross"></i>
          </button>
          <button class="btn btn-embossed btn-inverse imprimir" data-id="<?=$row["zm_cod"];?>">
            <i class="fui-document"></i>
          </button>
        </td>
      </tr>
      <?php endforeach; ?>      
    </tbody>
  </table>
</div>
<div class="row">
  <div class="col-lg-12 flex-center">
    <ul id="NavPosicion" class="pagination"></ul>
  </div>
</div>

<script type="text/javascript" src="../../assets/js/paging.js"></script>
<script type="text/javascript" src="../../assets/js/search.js"></script>
<script type="text/javascript" src="app/app.js"></script>
<script type="text/javascript">
  var pager = new Pager('TabFilter', 5);
  pager.init();
  pager.showPageNav('pager', 'NavPosicion');
  pager.showPage(1);

  (function() {
    theTable = $("#TabFilter");
    $("#searchTerm").keyup(function() {
      $.uiTableFilter(theTable, this.value, 5)
    })
  })()
</script>
