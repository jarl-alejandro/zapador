<?php session_start();
if(!isset($_SESSION["1a0b858b9a63f19d654116c9f37ae04194ccfdd0"])){
  header("Location: ../../login.php");
}
else {
  $id = $_SESSION["1a0b858b9a63f19d654116c9f37ae04194ccfdd0"];
  $nombre = $_SESSION["b665e217b51994789b02b1838e730d6b93baa30f"];
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?= $title ?> | Zapador</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../assets/css/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/css/flat-ui.css" rel="stylesheet">
    <link href="../../assets/css/style.css" rel="stylesheet">
    <link href="../../assets/css/zapador.css" rel="stylesheet">
    <link href="../../assets/css/default.css" rel="stylesheet">
    <link href="../../assets/css/default.date.css" rel="stylesheet">
    <link rel="shortcut icon" href="../../assets/img/favicon.ico">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="js/vendor/html5shiv.js"></script>
      <script src="js/vendor/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="toast">Zapador! v1.0</div>