<?php
require "../../../conexion.php";

$id = $_GET["id"];
$materias = array();

$query = $pdo->query("SELECT * FROM v_formacion_curso WHERE zf_cod='$id'");
$curso = $query->fetch();

$row = array('codigo'=>$curso["zf_cod"], 'curso'=>$curso["zc_codigo"], 
            'nomina'=>$curso["zf_nomi"], 'fecha'=>$curso["zf_inic"], 
            'video'=>$curso["zf_video"], 'alias'=>$curso["zf_alias"],
            'fin'=>$curso["zf_fin"]);

$materiasQuery = $pdo->query("SELECT * FROM v_detalle_formacion WHERE zfd_curso='$id' GROUP BY zm_cod");

while($item = $materiasQuery->fetch()){
  $codigo = $item["zm_cod"];
  $materia = $item["zm_mat"];

  $materias[] = array("codigo"=>$codigo, "materia"=>$materia);
}

$json = array('curso'=>$row, "materias"=>$materias);

print json_encode($json);