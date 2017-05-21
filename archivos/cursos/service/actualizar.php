<?php
require "../../../conexion.php";

$id = $_POST["id"];
$curso = $_POST["curso"];
$creditos = $_POST["creditos"];
$materias = $_POST["materias"];
$detalle = $_POST["detalle"];
$extra = $_POST["extra"];
$cantEst = $_POST["cantEst"];

if($curso != ""){

  $cursoUpdate = $pdo->query("UPDATE zp_curso SET zc_curso='$curso', zc_creditos='$creditos',
                zc_materias='$materias', zc_extra='$extra', zc_est='$cantEst' WHERE zc_codigo='$id'");

  $pdo->query("DELETE FROM zd_cur_det WHERE zcd_curso='$id'");

  $detailCurso = $pdo->prepare("INSERT INTO zd_cur_det (zcd_curso, zcd_polvorin, zcd_cant) 
                                VALUES (?, ?, ?)");

  foreach($detalle as $item){
    $polvorin = $item["id"];
    $detalle = $item["detalle"];
    $cant = $item["cant"];

    $detailCurso->bindParam(1, $id);
    $detailCurso->bindParam(2, $polvorin);
    $detailCurso->bindParam(3, $cant);

    $detailCurso->execute();
  }

  if($cursoUpdate){
    echo 2;
  }
}