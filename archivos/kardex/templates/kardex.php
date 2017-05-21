<?php
require "../../../conexion.php";

$id = $_GET["id"];

$query = $pdo->query("SELECT * FROM zp_polvorin WHERE zp_cod='$id'");
$polvorin = $query->fetch();

$kardex = $pdo->query("SELECT * FROM zp_kardex WHERE zk_cod='$id'");
$index = 0;
?>
 <header class="panel-heading bg-info margin-bottom">
   <h5 class="no-margin text-center">Kardex</h5>
</header>
<div class="table-responsive">
  <table class="table-striped table-hover table-advance table-bordered col-xs-12" id="TabFilter">
    <thead>
      <tr class="bg-cafe">
        <th class="text-center" width="10%">#</th>
        <th class="text-center" width="70%">Detalle</th>
        <th class="text-center" width="20%">Cant</th>
      </tr>
    </thead>
    <tbody>
      <?php
        foreach ($kardex as $row):
          $index++;
      ?>
      <tr>
        <td class="text-center"><?= $index ?></td>
        <td><?= $row["zk_det"] ?></td>
        <td class="text-center"><?= $row["zk_cant"] ?></td>
      </tr>
      <?php endforeach; ?>      
    </tbody>
  </table>
</div>
<div class="row">
  <div class="col-xs-12" style="margin-top: 2em;">
      <button class="btn btn-embossed btn-danger col-xs-offset-5" id="closeKardex">Cerrar</button>
  </div>
  <div class="col-lg-12 flex-center">
    <ul id="NavPosicion" class="pagination"></ul>
  </div>
</div>

<script type="text/javascript" src="../../assets/js/paging.js"></script>
<script type="text/javascript" src="../../assets/js/search.js"></script>
<script type="text/javascript">
  var pager = new Pager('TabFilter', 5);
  pager.init();
  pager.showPageNav('pager', 'NavPosicion');
  pager.showPage(1);

  $("#closeKardex").on("click", function () {
    $("#kardex").slideUp()
    $("#tabla_principal").slideDown()
  })
</script>
