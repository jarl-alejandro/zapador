<?php
require "../../../conexion.php";

$id = $_POST["id"];

$eliminar = $pdo->query("DELETE FROM zp_curso WHERE zc_codigo='$id'");

$pdo->query("DELETE FROM zd_cur_det WHERE zcd_curso='$id'");

if($eliminar){
  echo 2;
}