<?php
require "../../../conexion.php";

$id = $_POST["id"];
$curso = $_POST["curso"];
$nomina = $_POST["nomina"];
$fechaInicio = $_POST["fechaInicio"];
$fechaFinal = $_POST["fechaFinal"];
$video = $_POST["video"];
$materias = $_POST["materias"];
$alias = $_POST["alias"];
$fechaCreacion = date("Y/m/d");
$cero = 0;

if($curso != ""){

  $cursoUpdate = $pdo->query("UPDATE zp_form_curso SET zf_alias='$alias', zf_cur='$curso', zf_nomi='$nomina',
                zf_inic='$fechaInicio', zf_video='$video', zf_fin='$fechaFinal' WHERE zf_cod='$id'");

  $pdo->query("DELETE FROM zd_form_det WHERE zfd_curso='$id'");

   $detailCurso = $pdo->prepare("INSERT INTO zd_form_det (zfd_curso, zfd_mat) 
                                VALUES (?, ?)");

  foreach ($materias as $materia) {
    $idMateria = $materia["id"];

    $detailCurso->bindParam(1, $id);
    $detailCurso->bindParam(2, $idMateria);
    $detailCurso->execute();
  }

  if($cursoUpdate){
    echo 2;
  }
}