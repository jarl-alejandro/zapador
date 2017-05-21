<?php
session_start();
include "../conexion.php";

$email = $_POST["email"];
$password = sha1($_POST["password"]);

$loginQuery = $pdo->query("SELECT * FROM zp_usuario WHERE zu_ema='$email' AND zu_con='$password'");

if($loginQuery->rowCount() == 1){
  $user = $loginQuery->fetch();

  $_SESSION["1a0b858b9a63f19d654116c9f37ae04194ccfdd0"] = $user["zu_ced"];
  $_SESSION["b665e217b51994789b02b1838e730d6b93baa30f"] = $user["zu_nom"]." ".$user["zu_ape"];

  echo 2;
}
else{
  echo 1;
}