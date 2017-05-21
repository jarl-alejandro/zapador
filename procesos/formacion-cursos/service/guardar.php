<?php
require "../../../conexion.php";
require "../../../helpers.php";
date_default_timezone_set('America/Guayaquil');

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
$codigo = setCode('FC-', 8, 'zp_form_curso', 'zp_cont_formacion');

if($curso != ""){

  $cursoInsert = $pdo->prepare("INSERT INTO zp_form_curso (zf_cod, zf_alias, zf_cur, zf_nomi, zf_inic, zf_crea, 
                                  zf_video, zf_fin) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

  $cursoInsert->bindParam(1, $codigo);
  $cursoInsert->bindParam(2, $alias);
  $cursoInsert->bindParam(3, $curso);
  $cursoInsert->bindParam(4, $nomina);
  $cursoInsert->bindParam(5, $fechaInicio);
  $cursoInsert->bindParam(6, $fechaCreacion);
  $cursoInsert->bindParam(7, $video);
  $cursoInsert->bindParam(8, $fechaFinal);

  $cursoInsert->execute();

  $detailCurso = $pdo->prepare("INSERT INTO zd_form_det (zfd_curso, zfd_mat) 
                                VALUES (?, ?)");

  foreach ($materias as $materia) {
    $idMateria = $materia["id"];

    $detailCurso->bindParam(1, $codigo);
    $detailCurso->bindParam(2, $idMateria);
    $detailCurso->execute();
  }

  if($cursoInsert){
    updateCode('zp_cont_formacion');
    echo 2;
  }
  
}




