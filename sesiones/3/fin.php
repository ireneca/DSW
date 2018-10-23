<?php
session_start();
if (isset($_POST['correcto'])){
  $nombre = $_SESSION['nombre'];
  $apellidos = $_SESSION['apellidos'];
  if ( $_POST['correcto'] == 'Sí' ) {
    $mensaje="Su nombre y apellidos son:";
  } else if ( $_POST['correcto'] == 'No' ) {
    $mensaje="Su nombre y apellidos no son:";
  }
}
?>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Irene</title>
    </head>
    <body>
      <p><?php echo $mensaje." ".$nombre." ".$apellidos ?></p>
      <a href="index.php">Volver a la primera página.</a>
    </body>
</html>
