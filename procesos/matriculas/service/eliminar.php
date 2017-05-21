<?php
require "../../../conexion.php";

$id = $_POST["id"];

$eliminar = $pdo->query("DELETE FROM zp_form_curso WHERE zf_cod='$id'");

$pdo->query("DELETE FROM zd_form_det WHERE zfd_curso='$id'");

if($eliminar){
  echo 2;
}