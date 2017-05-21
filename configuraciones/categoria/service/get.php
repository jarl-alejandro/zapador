<?php
require "../../../conexion.php";

$id = $_POST["id"];

$categoria = $pdo->query("SELECT * FROM zp_categoria WHERE zc_cod='$id'");
$row = $categoria->fetch();

print json_encode($row);