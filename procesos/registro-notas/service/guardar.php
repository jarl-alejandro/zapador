<?php
require "../../../conexion.php";

$id = $_POST["id"];
$nota = $_POST["nota"];
$campo = $_POST["campo"];

if($nota != ""){
  $update = $pdo->query("UPDATE zd_alum_det SET $campo='$nota' WHERE zad_id='$id'");

  if($update){
    echo 2;
  }
}