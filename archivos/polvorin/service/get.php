<?php
require "../../../conexion.php";

$id = $_POST["id"];

$polvorin = $pdo->query("SELECT * FROM zp_polvorin WHERE zp_cod='$id'");
$row = $polvorin->fetch();

print json_encode($row);