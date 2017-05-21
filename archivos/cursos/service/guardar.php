<?php
require "../../../conexion.php";
require "../../../helpers.php";

$id = $_POST["id"];
$curso = $_POST["curso"];
$creditos = $_POST["creditos"];
$materias = $_POST["materias"];
$detalle = $_POST["detalle"];
$extra = $_POST["extra"];
$cantEst = $_POST["cantEst"];

$codigo = setCode('CU-', 8, 'zp_curso', 'zp_cont_curso');

if($curso != ""){

  $cursoInsert = $pdo->prepare("INSERT INTO zp_curso (zc_codigo, zc_curso, zc_creditos, zc_materias, zc_extra, zc_est) 
                       VALUES (?, ?, ?, ?, ?, ?)");

  $cursoInsert->bindParam(1, $codigo);
  $cursoInsert->bindParam(2, $curso);
  $cursoInsert->bindParam(3, $creditos);
  $cursoInsert->bindParam(4, $materias);
  $cursoInsert->bindParam(5, $extra);
  $cursoInsert->bindParam(6, $cantEst);

  $cursoInsert->execute();

  $detailCurso = $pdo->prepare("INSERT INTO zd_cur_det (zcd_curso, zcd_polvorin, zcd_cant) 
                                VALUES (?, ?, ?)");

  foreach($detalle as $item){
    $polvorin = $item["id"];
    $detalle = $item["detalle"];
    $cant = $item["cant"];

    $detailCurso->bindParam(1, $codigo);
    $detailCurso->bindParam(2, $polvorin);
    $detailCurso->bindParam(3, $cant);

    $detailCurso->execute();

    // kardex
    $query = $pdo->query("SELECT * FROM zp_kardex WHERE zk_cod='$polvorin' ORDER BY zk_id DESC");
    $fetch = $query->fetch();

    $cant_old = $fetch["zk_cant"];
    $cant_new = $cant_old - $cant; 

    $kardex = $pdo->prepare("INSERT INTO zp_kardex (zk_cod, zk_det, zk_cant) VALUES (?, ?, ?)");

    $informe = "Ingreso de $detalle para el curso $curso";
    $kardex->bindParam(1, $polvorin);
    $kardex->bindParam(2, $informe);
    $kardex->bindParam(3, $cant_new);

    $kardex->execute();

    $pdo->query("UPDATE zp_polvorin SET zp_cant='$cant_new' WHERE zp_cod='$polvorin'");

  }

  if($cursoInsert){
    updateCode('zp_cont_curso');
    echo 2;
  }
  
}