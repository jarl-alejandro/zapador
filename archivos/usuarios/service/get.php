<?php
require "../../../conexion.php";

$id = $_POST["id"];

$user = $pdo->query("SELECT * FROM v_nomina WHERE zu_ced='$id'");
$row = $user->fetch();

print json_encode($row);