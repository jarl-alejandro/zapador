<?php
  $title = "Videos";
  require "../../conexion.php";
  require "../../head.php";
  require "../../menu.php";
  $cursos = $pdo->query("SELECT * FROM zp_form_curso");
?>
<main class="container video__container">
<?php while($curso = $cursos->fetch()){ ?>
  <div class="panel panel-primary col-xs-3 card_video" style="padding:0" data-video="<?= $curso["zf_video"]; ?>">
    <div class="panel-heading" style="padding: 0">
      <h3 class="panel-title text-center card__title"><?= $curso["zf_alias"]; ?></h3>
    </div>
    <div class="panel-body">
      <img src="http://img.youtube.com/vi/<?= $curso["zf_video"]; ?>/0.jpg" class="card__img"  height="150">      
      <span class="fui-play icono-video"></span>      
    </div>
  </div>
<?php } ?>
</main>
<?php
  require "templates/video.php";
  require "../../script.php" ;
?>  
<script type="text/javascript" src="app/index.js"></script>
</body>
</html>
