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

$materiasQuery = $pdo->query("SELECT * FROM vz_alumnos WHERE zad_curso='$id'");

while($item = $materiasQuery->fetch()){
  $id = $item["zad_id"];
  $codigo = $item["zm_cod"];
  $materia = $item["zm_mat"];
  $cedula = $item["zu_ced"];
  $estudiante = $item["estudiante"];
  $nota1 = $item["nota1"];
  $nota2 = $item["nota2"];
  $nota3 = $item["nota3"];

  $materias[] = array("id"=>$id, "codigo"=>$codigo, "materia"=>$materia, "estudiante"=>$estudiante, 
            "cedula"=>$cedula, "nota1"=>$nota1, "nota2"=>$nota2, "nota3"=>$nota3);
}

$json = array('curso'=>$row, "materias"=>$materias);

print json_encode($json);