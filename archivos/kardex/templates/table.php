<?php
require "../../../conexion.php";
$polvorin = $pdo->query("SELECT * FROM zp_polvorin");
$index = 0;
?>
 <header class="panel-heading bg-info margin-bottom">
   <h5 class="no-margin text-center">LISTA DE POLVORIN</h5>
</header>
<div class="table-responsive">
  <table class="table-striped table-hover table-advance table-bordered col-xs-12" id="TabFilter">
    <thead>
      <tr class="bg-cafe">
        <th class="text-center" width="80%">Polvorin</th>
        <th class="text-center" width="20%">Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php
        if($polvorin->rowCount() == 0){
          echo "<tr><td colspan='2' class='text-center'>No hay polvorin registrado</td></tr>";
        }
        foreach ($polvorin as $row):
      ?>
      <tr>
        <td><?= $row["zp_det"] ?></td>
        <td class="flex-around">
          <button class="btn btn-embossed btn-primary new" data-id="<?=$row["zp_cod"];?>">
            <i class="fui-new"></i>
          </button>
           <button class="btn btn-embossed btn-warning see" data-id="<?=$row["zp_cod"];?>">
            <i class="fui-eye"></i>
          </button>
          <button class="btn btn-embossed btn-inverse imprimir" data-id="<?=$row["zp_cod"];?>">
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
