<?php
require "../../../conexion.php";

$id = $_POST["id"];

$eliminar = $pdo->query("DELETE FROM zp_usuario WHERE zu_ced='$id'");
$eliminar_nomina = $pdo->query("DELETE FROM zn_nomina WHERE zn_ced='$id'");

if($eliminar){
  echo 2;
}