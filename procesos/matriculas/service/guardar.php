<?php
require "../../../conexion.php";
require "../../../helpers.php";
date_default_timezone_set('America/Guayaquil');

$id = $_POST["id"];
$materias = $_POST["materias"];
$alumnos = $_POST["alumnos"];
$cero = 0;
$codigo = setCode('FC-', 8, 'zp_form_curso', 'zp_cont_formacion');

if($id != ""){

  $detailCurso = $pdo->prepare("INSERT INTO zd_alum_det (zad_curso, zad_mat, zad_alum, nota1, nota2, nota3) 
                                VALUES (?, ?, ?, ?, ?, ?)");

  foreach ($alumnos as $alum) {
    $cedula = $alum["id"];

    foreach ($materias as $mat) {
      $idMateria = $mat["id"];
      $detailCurso->bindParam(1, $id);
      $detailCurso->bindParam(2, $idMateria);
      $detailCurso->bindParam(3, $cedula);
      $detailCurso->bindParam(4, $cero);
      $detailCurso->bindParam(5, $cero);
      $detailCurso->bindParam(6, $cero);
      $detailCurso->execute();
    }
    
  }

  echo 2;
}




