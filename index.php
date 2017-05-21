<?php 
session_start();
include "conexion.php";

function setCode($letra=NULL, $digitos=NULL, $tabla=NULL, $fila){
  global $pdo;

  $query = $pdo->query("SELECT * FROM zp_params");
  $row = $query->fetch();
  $cant = $row[$fila];
  $str_ceros = "";

  $nletra = strlen($letra);
  $ncant = strlen($cant);

  $ceros = $digitos - ($nletra + $ncant);
  $i = 1;

  while($i <= $ceros){
    $str_ceros .= "0";
    $i += 1;
  }

  $cant++;
  $codigo = $letra.$str_ceros.$cant;
  return $codigo;
}

function updateCode($campo) {
  global $pdo;

  $query1 = $pdo->query("SELECT * FROM zp_params WHERE zp_id=1");
  $row1 = $query1->fetch();
  $canta = $row1[$campo];
  $canta = $canta + 1;

  $pdo->query("UPDATE zp_params SET $campo='$canta' WHERE zp_id=1");
}

$usuriosQuery = $pdo->query("SELECT * FROM zp_usuario");
$paramsQuery = $pdo->query("SELECT * FROM zp_params");

if($paramsQuery->rowCount() == 0){
  $pdo->query("INSERT INTO zp_params (zp_id, zp_cont_grad, zp_cont_cant)
      VALUES ('$1', '0', '0')");
}

if($usuriosQuery->rowCount() == 0){
  $codigo = setCode('GM-', 8, 'zp_grados', 'zp_cont_grad');
  $ced = '1234567890';
  $password = sha1($ced);
  updateCode("zp_cont_grad");

  $pdo->query("INSERT INTO zp_grados (zg_cod, zg_det) 
                    VALUES ('$codigo', 'Admin')");

  $nomina = $pdo->query("INSERT INTO zn_nomina (zn_ced, zn_gra, zn_san, zn_eda, zn_sex, zn_civ)
      VALUES ('$ced', '$codigo', 'A+', '25', 'hombre', 'Soltero')");

  $usuario = $pdo->query("INSERT INTO zp_usuario (zu_ced, zu_nom, zu_ape, zu_dir, zu_cel, zu_tel, zu_ema, zu_con) 
        VALUES ('$ced', 'Admin', 'Admin', 'Santo Domingo', '$ced', '$ced', 'admin@admin.com', '$password')");
}

if(isset($_SESSION["1a0b858b9a63f19d654116c9f37ae04194ccfdd0"])){
  header("Location: configuraciones/principal");
}
else {
  header("Location: login.php");
}
?>

