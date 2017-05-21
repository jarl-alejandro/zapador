<?php
require "../../../conexion.php";
require "../../../helpers.php";

$id = $_POST["id"];
$materia = $_POST["materia"];
$nomina = $_POST["nomina"];
$codigo = setCode('MA-', 8, 'zp_materia', 'zp_cont_mat');

if($materia != ""){
  if($id == ""){
    $matExist = $pdo->query("SELECT zm_mat FROM zp_materia WHERE zm_mat='$materia'");

    if($matExist->rowCount() > 0){
      echo 1;
      return false;
    }

    $materiaNew = $pdo->prepare("INSERT INTO zp_materia (zm_cod, zm_mat, zm_nom) 
                    VALUES (?, ?, ?)");

    $materiaNew->bindParam(1, $codigo);
    $materiaNew->bindParam(2, $materia);
    $materiaNew->bindParam(3, $nomina);

    $materiaNew->execute();
    updateCode("zp_cont_mat");
  }
  else {
    $materiaNew = $pdo->query("UPDATE zp_materia SET zm_mat='$materia', zm_nom='$nomina' 
                                WHERE zm_cod='$id'");
  }

  if($materiaNew) {
    echo 2;
  }
}