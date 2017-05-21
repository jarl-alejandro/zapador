<?php
require "../../../conexion.php";
require "../../../helpers.php";

$id = $_POST["id"];
$polvorin = $_POST["polvorin"];
$cant = $_POST["cant"];
$max = $_POST["max"];
$min = $_POST["min"];
$categoria = $_POST["categoria"];
$codigo = setCode('MA-', 8, 'zp_polvorin', 'zp_cont_pol');

if($polvorin != ""){
  if($id == ""){
    $polExist = $pdo->query("SELECT zp_det FROM zp_polvorin WHERE zp_det='$polvorin'");

    if($polExist->rowCount() > 0){
      echo 1;
      return false;
    }

    $polvorinNew = $pdo->prepare("INSERT INTO zp_polvorin (zp_cod, zp_det, zp_cant, zp_max, zp_min, zp_cat) 
                    VALUES (?, ?, ?, ?, ?, ?)");

    $polvorinNew->bindParam(1, $codigo);
    $polvorinNew->bindParam(2, $polvorin);
    $polvorinNew->bindParam(3, $cant);
    $polvorinNew->bindParam(4, $max);
    $polvorinNew->bindParam(5, $min);
    $polvorinNew->bindParam(6, $categoria);

    $polvorinNew->execute();

    $kardex = $pdo->prepare("INSERT INTO zp_kardex (zk_cod, zk_det, zk_cant) 
            VALUES (?, ?, ?)");

    $detalle = "Compra de $polvorin con codigo $codigo";

    $kardex->bindParam(1, $codigo);
    $kardex->bindParam(2, $detalle);
    $kardex->bindParam(3, $cant);

    $kardex->execute();

    updateCode("zp_cont_pol");
  }
  else {
    $polvorinNew = $pdo->query("UPDATE zp_polvorin SET zp_det='$polvorin', zp_cant='$cant', zp_max='$max', 
        zp_min='$min', zp_cat='$categoria' WHERE zp_cod='$id'");
  }

  if($polvorinNew) {
    echo 2;
  }
}