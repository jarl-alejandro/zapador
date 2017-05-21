<?php
require "../../../conexion.php";
require "../../../helpers.php";

$id = $_POST["id"];
$unidad = $_POST["unidad"];
$detalle = $_POST["detalle"];
$codigo = setCode('CT-', 8, 'zp_unidad', 'zp_cont_unidad');

if($unidad != ""){
  if($id == ""){
    $uniExist = $pdo->query("SELECT zu_det FROM zp_unidad WHERE zu_det='$unidad'");

    if($uniExist->rowCount() > 0){
      echo 1;
      return false;
    }

    $unidadNew = $pdo->prepare("INSERT INTO zp_unidad (zu_cod, zu_uni, zu_det) 
                    VALUES (?, ?, ?)");

    $unidadNew->bindParam(1, $codigo);
    $unidadNew->bindParam(2, $unidad);
    $unidadNew->bindParam(3, $detalle);

    $unidadNew->execute();
    updateCode("zp_cont_unidad");
  }
  else {
    $unidadNew = $pdo->query("UPDATE zp_unidad SET zu_uni='$unidad', zu_det='$detalle' 
                                WHERE zu_cod='$id'");
  }

  if($unidadNew) {
    echo 2;
  }
}