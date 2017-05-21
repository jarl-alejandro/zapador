<?php
require "../../../conexion.php";

$id = $_POST["id"];

$eliminar = $pdo->query("DELETE FROM zp_materia WHERE zm_cod='$id'");

if($eliminar){
  echo 2;
}