<?php
session_start();
include "../conexion.php";

$_SESSION["1a0b858b9a63f19d654116c9f37ae04194ccfdd0"] = "";
$_SESSION["b665e217b51994789b02b1838e730d6b93baa30f"] = "";

session_destroy();
$insertGoTo = "../index.php";
header(sprintf("Location: %s", $insertGoTo));
