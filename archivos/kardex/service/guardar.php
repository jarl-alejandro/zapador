<?php
require "../../../conexion.php";
require "../../../helpers.php";

$id = $_POST["id"];
$detalle = $_POST["detalle"];
$cant = $_POST["cant"];

$query = $pdo->query("SELECT * FROM zp_kardex WHERE zk_cod='$id' ORDER BY zk_id DESC");
$fetch = $query->fetch();

$cant_old = $fetch["zk_cant"];
$cant_new = $cant_old + $cant; 

$kardex = $pdo->prepare("INSERT INTO zp_kardex (zk_cod, zk_det, zk_cant) VALUES (?, ?, ?)");


$kardex->bindParam(1, $id);
$kardex->bindParam(2, $detalle);
$kardex->bindParam(3, $cant_new);

$kardex->execute();

$pdo->query("UPDATE zp_polvorin SET zp_cant='$cant_new' WHERE zp_cod='$id'");

if($kardex){
  echo 2;
}