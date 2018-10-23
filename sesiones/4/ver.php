<?php
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Irene</title>
    </head>
    <body>
      <p>Datos introducidos:</p>
      <ul>
      <?php foreach ($_SESSION as $key => $value) {
        echo "<li>$key: $value</li>";
      }?>
      </ul>
      <a href="index.php">Volver al inicio.</a>
    </body>
</html>
