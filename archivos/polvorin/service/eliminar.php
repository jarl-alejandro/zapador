<?php
require "../../../conexion.php";

$id = $_POST["id"];

$eliminar = $pdo->query("DELETE FROM zp_polvorin WHERE zp_cod='$id'");

if($eliminar){
  echo 2;
}