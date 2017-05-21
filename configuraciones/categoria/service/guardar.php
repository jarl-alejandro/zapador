<?php
require "../../../conexion.php";
require "../../../helpers.php";

$id = $_POST["id"];
$categoria = $_POST["categoria"];
$detalle = $_POST["detalle"];
$codigo = setCode('CT-', 8, 'zp_categoria', 'zp_cont_cant');

if($categoria != ""){
  if($id == ""){
    $catExist = $pdo->query("SELECT zc_cat FROM zp_categoria WHERE zc_cat='$categoria'");

    if($catExist->rowCount() > 0){
      echo 1;
      return false;
    }

    $categoriaNew = $pdo->prepare("INSERT INTO zp_categoria (zc_cod, zc_cat, zc_det) 
                    VALUES (?, ?, ?)");

    $categoriaNew->bindParam(1, $codigo);
    $categoriaNew->bindParam(2, $categoria);
    $categoriaNew->bindParam(3, $detalle);

    $categoriaNew->execute();
    updateCode("zp_cont_cant");
  }
  else {
    $categoriaNew = $pdo->query("UPDATE zp_categoria SET zc_cat='$categoria', zc_det='$detalle' 
                                WHERE zc_cod='$id'");
  }

  if($categoriaNew) {
    echo 2;
  }
}