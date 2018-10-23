<?php
session_start();
$mensaje = "";
if (isset($_SESSION['conectar'])) $mensaje="Usted esta conectado";
else $mensaje="Usted esta desconectado";
?>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Irene</title>
    </head>
    <body>
      <nav>
        <ul>
          <li><a href="index.php">Inicio</a></li>
          <li><a href="conectar.php">Conectar</a></li>
          <li><a href="desconectar.php">Desconectar</a></li>
          <li><a href="comprobar.php">Comprobar</a></li>
        </ul>
      </nav>
      <h1>Irene Caub&iacute;n Alonso</h1>
      <h3><?php echo $mensaje ?></h3>
    </body>
</html>
