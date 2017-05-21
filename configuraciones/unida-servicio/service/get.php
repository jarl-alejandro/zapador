<?php
require "../../../conexion.php";

$id = $_POST["id"];

$categoria = $pdo->query("SELECT * FROM zp_unidad WHERE zu_cod='$id'");
$row = $categoria->fetch();

print json_encode($row);