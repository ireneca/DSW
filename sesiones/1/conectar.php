<?php
session_start();
$_SESSION['conectar'] = true;
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
      <h3>Usted se ha conectado</h3>
    </body>
</html>
