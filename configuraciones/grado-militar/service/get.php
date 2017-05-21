<?php
require "../../../conexion.php";

$id = $_POST["id"];

$grado = $pdo->query("SELECT * FROM zp_grados WHERE zg_cod='$id'");
$row = $grado->fetch();

print json_encode($row);