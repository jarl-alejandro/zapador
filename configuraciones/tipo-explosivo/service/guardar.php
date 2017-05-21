<?php
require "../../../conexion.php";
require "../../../helpers.php";

$id = $_POST["id"];
$tipo = $_POST["tipo"];
$detalle = $_POST["detalle"];
$codigo = setCode('CT-', 8, 'zp_tipo', 'zp_cont_tipo');

if($tipo != ""){
  if($id == ""){
    $tipExist = $pdo->query("SELECT zt_expl FROM zp_tipo WHERE zt_expl='$tipo'");

    if($tipExist->rowCount() > 0){
      echo 1;
      return false;
    }

    $tipoNew = $pdo->prepare("INSERT INTO zp_tipo (zt_cod, zt_expl, zt_det) 
                    VALUES (?, ?, ?)");

    $tipoNew->bindParam(1, $codigo);
    $tipoNew->bindParam(2, $tipo);
    $tipoNew->bindParam(3, $detalle);

    $tipoNew->execute();
    updateCode("zp_cont_tipo");
  }
  else {
    $tipoNew = $pdo->query("UPDATE zp_tipo SET zt_expl='$tipo', zt_det='$detalle' 
                                WHERE zt_cod='$id'");
  }

  if($tipoNew) {
    echo 2;
  }
}