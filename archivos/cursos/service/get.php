<?php
require "../../../conexion.php";

$id = $_GET["id"];
$details = array();

$cursoQuery = $pdo->query("SELECT * FROM zp_curso WHERE zc_codigo='$id'");
$curso = $cursoQuery->fetch();

$row = array('zc_codigo'=>$curso["zc_codigo"], 'zc_curso'=>$curso["zc_curso"], 
            'zc_creditos'=>$curso["zc_creditos"], 'zc_materias'=>$curso["zc_materias"],
            'zc_extra'=>$curso["zc_extra"], 'zc_est'=>$curso["zc_est"]);

$detalleQuery = $pdo->query("SELECT * FROM v_detalle_curso WHERE zcd_curso='$id'");

while($item = $detalleQuery->fetch()){
  $polvorin = $item["zp_cod"];
  $nombre = $item["zp_det"];
  $cant = $item["zcd_cant"];

  $details[] = array("polvorin"=>$polvorin, "nombre"=>$nombre, "cant"=>$cant);
}

$json = array('curso'=>$row, "detalle"=>$details);

print json_encode($json);