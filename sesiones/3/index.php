<?php
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Irene</title>
    </head>
    <body>
      <form action="apellido.php" method="post">
        <p>Escriba su nombre:</p>
        <p><strong>Nombre:</strong> <input name="nombre" size="20" maxlength="20" type="text"></p>
        <p><input value="Siguiente" type="submit"><input value="Borrar" type="reset"></p>
      </form>
    </body>
</html>
