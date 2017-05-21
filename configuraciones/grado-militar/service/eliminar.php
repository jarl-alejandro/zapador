<?php
require "../../../conexion.php";

$id = $_POST["id"];

$eliminar = $pdo->query("DELETE FROM zp_grados WHERE zg_cod='$id'");

if($eliminar){
  echo 2;
}