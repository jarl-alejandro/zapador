<?php
require "../../../conexion.php";
$usuarios = $pdo->query("SELECT * FROM v_nomina WHERE zu_ced != '1234567890' AND zn_tipo='administracion'");
$index = 0;
?>
 <header class="panel-heading bg-info margin-bottom">
   <h5 class="no-margin text-center">LISTA DE USUARIOS</h5>
</header>
<div class="table-responsive">
  <table class="table-striped table-hover table-advance table-bordered col-xs-12" id="TabFilter">
    <thead>
      <tr class="bg-cafe">
        <th class="text-center" width="80%">Nombres del Usuario</th>
        <th class="text-center" width="20%">Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php
        if($usuarios->rowCount() == 0){
          echo "<tr><td colspan='2' class='text-center'>No hay usuarios registrado</td></tr>";
        }
        foreach ($usuarios as $row):
      ?>
      <tr>
        <td><?= $row["zu_nom"]." ".$row["zu_ape"] ?></td>
        <td class="flex-around">
          <button class="btn btn-embossed btn-primary editar" data-id="<?=$row["zu_ced"];?>">
            <i class="fui-new"></i>
          </button>
          <button class="btn btn-embossed btn-danger eliminar" data-id="<?=$row["zu_ced"];?>">
            <i class="fui-cross"></i>
          </button>
          <button class="btn btn-embossed btn-inverse imprimir" data-id="<?=$row["zu_ced"];?>">
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
