<?php
include "../conexion.php";

$nombre = "zapador.sql";
$bd = "zapador";
$drop = false;
$tablas = false; //tablas de la bd
// Tipo de compresion.
// Puede ser "gz", "bz2", o false (sin comprimir)
 
$compresion = false;

/* Se busca las tablas en la base de datos */
if ( empty($tablas) ) {
  $respuesta = $pdo->query("SHOW TABLES FROM $bd");

  while ($fila = $respuesta->fetch()) {
      $tablas[] = $fila[0];
  }
}
/* Se crea la cabecera del archivo */
$info['dumpversion'] = "1.1b";
$info['fecha'] = date("d-m-Y");
$info['hora'] = date("h:m:s A");
$info['mysqlver'] = $pdo->getAttribute(PDO::ATTR_SERVER_VERSION);
$info['phpver'] = phpversion();
ob_start();
print_r($tablas);
$representacion = ob_get_contents();
ob_end_clean ();
preg_match_all('/(\[\d+\] => .*)\n/', $representacion, $matches);
$info['tablas'] = implode(";  ", $matches[1]);
$dump = <<<EOT
# +===================================================================
# |
# | Generado el {$info['fecha']} a las {$info['hora']} 
# | Servidor: {$_SERVER['HTTP_HOST']}
# | MySQL Version: {$info['mysqlver']}
# | PHP Version: {$info['phpver']}
# | Base de datos: '$bd'
# | Tablas: {$info['tablas']}
# |
# +-------------------------------------------------------------------
 
EOT;
foreach ($tablas as $tabla) {
    
  $drop_table_query = "";
  $create_table_query = "";
  $insert_into_query = "";
  
  /* Se halla el query que será capaz vaciar la tabla. */
  if ($drop) {
      $drop_table_query = "DROP TABLE IF EXISTS `$tabla`;";
  } else {
      $drop_table_query = "# No especificado.";
  }

  /* Se halla el query que será capaz de recrear la estructura de la tabla. */
  $create_table_query = "";
  $respuesta = $pdo->query("SHOW CREATE TABLE $tabla;");

  while ($fila = $respuesta->fetch()) {
    $create_table_query = $fila[1].";";
  }
  
  /* Se halla el query que será capaz de insertar los datos. */
  $insert_into_query = "";
  $respuesta = $pdo->query("SELECT * FROM $tabla;");
    
  while ($fila = $respuesta->fetch()) {
    $columnas = array_keys($fila);
    foreach ($columnas as $columna) {
      if ( gettype($fila[$columna]) == "NULL" ) {
          $values[] = "NULL";
      } else {
          $values[] = "$fila[$columna]";
      }
    }
    $insert_into_query .= "INSERT INTO `$tabla` VALUES (".implode(", ", $values).");\n";
    unset($values);
  }
    
$dump .= <<<EOT
 
# | Vaciado de tabla '$tabla'
# +------------------------------------->
$drop_table_query
 
 
# | Estructura de la tabla '$tabla'
# +------------------------------------->
$create_table_query
 
 
# | Carga de datos de la tabla '$tabla'
# +------------------------------------->
$insert_into_query
 
EOT;
}
 
/* Envio */
if ( !headers_sent() ) {
  header("Pragma: no-cache");
  header("Expires: 0");
  header("Content-Transfer-Encoding: binary");
  switch ($compresion) {
  case "gz":
      header("Content-Disposition: attachment; filename=$nombre.gz");
      header("Content-type: application/x-gzip");
      echo gzencode($dump, 9);
      break;
  case "bz2": 
      header("Content-Disposition: attachment; filename=$nombre.bz2");
      header("Content-type: application/x-bzip2");
      echo bzcompress($dump, 9);
      break;
  default:
      header("Content-Disposition: attachment; filename=$nombre");
      header("Content-type: application/force-download");
      echo $dump;
  }
} else {
    echo "<b>ATENCION: Probablemente ha ocurrido un error</b><br />\n<pre>\n$dump\n</pre>";
}
 
?>