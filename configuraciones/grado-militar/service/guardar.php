<?php
require "../../../conexion.php";
require "../../../helpers.php";

$id = $_POST["id"];
$grado = $_POST["grado"];
$codigo = setCode('GM-', 8, 'zp_grados', 'zp_cont_grad');

if($grado != ""){
  if($id == ""){
    $gradExist = $pdo->query("SELECT zg_cod FROM zp_grados WHERE zg_cod='$grado'");

    if($gradExist->rowCount() > 0){
      echo 1;
      return false;
    }

    $gradoMilitar = $pdo->prepare("INSERT INTO zp_grados (zg_cod, zg_det) 
                    VALUES (?, ?)");

    $gradoMilitar->bindParam(1, $codigo);
    $gradoMilitar->bindParam(2, $grado);

    $gradoMilitar->execute();
    updateCode("zp_cont_grad");
  }
  else {
    $gradoMilitar = $pdo->query("UPDATE zp_grados SET zg_det='$grado' WHERE zg_cod='$id'");
  }

  if($gradoMilitar) {
    echo 2;
  }
}