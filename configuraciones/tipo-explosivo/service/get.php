<?php
require "../../../conexion.php";

$id = $_POST["id"];

$tipo = $pdo->query("SELECT * FROM zp_tipo WHERE zt_cod='$id'");
$row = $tipo->fetch();

print json_encode($row);