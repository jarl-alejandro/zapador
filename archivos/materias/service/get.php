<?php
require "../../../conexion.php";

$id = $_POST["id"];

$categoria = $pdo->query("SELECT * FROM zp_materia WHERE zm_cod='$id'");
$row = $categoria->fetch();

print json_encode($row);