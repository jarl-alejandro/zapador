<?php
require "../../../conexion.php";

$id = $_POST["id"];
$cedula = $_POST["cedula"];
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$direccion = $_POST["direccion"];
$celular = $_POST["celular"];
$telefono = $_POST["telefono"];
$email = $_POST["email"];
$sangre = $_POST["sangre"];
$edad = $_POST["edad"];
$grado = $_POST["grado"];
$sexo = $_POST["sexo"];
$estdoCivil = $_POST["estdoCivil"];
$tipoUser = $_POST["tipoUser"];
$password = sha1($cedula);


if($cedula != ""){
  if($id == ""){
    $userExist = $pdo->query("SELECT zu_ced FROM zp_usuario WHERE zu_ced='$cedula'");

    if($userExist->rowCount() > 0){
      echo 1;
      return false;
    }

    $nomina = $pdo->prepare("INSERT INTO zn_nomina (zn_ced, zn_gra, zn_san, zn_eda, zn_sex, zn_civ, zn_tipo)
                    VALUES (?, ?, ?, ?, ?, ?, ?)");

    $nomina->bindParam(1, $cedula);
    $nomina->bindParam(2, $grado);
    $nomina->bindParam(3, $sangre);
    $nomina->bindParam(4, $edad);
    $nomina->bindParam(5, $sexo);
    $nomina->bindParam(6, $estdoCivil);
    $nomina->bindParam(7, $tipoUser);

    $nomina->execute();

    $usuario = $pdo->prepare("INSERT INTO zp_usuario (zu_ced, zu_nom, zu_ape, zu_dir, zu_cel, zu_tel, zu_ema, zu_con) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

    $usuario->bindParam(1, $cedula);
    $usuario->bindParam(2, $nombre);
    $usuario->bindParam(3, $apellido);
    $usuario->bindParam(4, $direccion);
    $usuario->bindParam(5, $celular);
    $usuario->bindParam(6, $telefono);
    $usuario->bindParam(7, $email);
    $usuario->bindParam(8, $password);

    $usuario->execute();

  }
  else {
    $nomina = $pdo->query("UPDATE zn_nomina SET zn_gra='$grado', zn_san='$sangre', zn_eda='$edad',
                    zn_sex='$sexo', zn_civ='$estdoCivil', zn_tipo='$tipoUser' WHERE zn_ced='$id'");

    $usuario = $pdo->query("UPDATE zp_usuario SET zu_nom='$nombre', zu_ape='$apellido', zu_dir='$direccion',
       zu_cel='$celular', zu_tel='$telefono', zu_ema='$email' WHERE zu_ced='$id'");
  }

  if($usuario) {
    echo 2;
  }
}