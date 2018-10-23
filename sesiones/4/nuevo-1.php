<?php
session_start();
?>
<html>
  <head>
    <meta charset="UTF-8"/>
    <title>Irene</title>
  </head>
  <body>
    <form action="nuevo-2.php" method="post">
      <p>Escriba el nuevo dato:</p>
      <table>
        <tbody>
          <tr>
            <td><strong>Nombre del dato:</strong></td>
            <td><input name="nombre" size="20" maxlength="20" type="text"></td>
          </tr>
          <tr>
            <td><strong>Valor del dato:</strong></td>
            <td><input name="valor" size="30" maxlength="30" type="text"></td>
          </tr>
        </tbody>
      </table>
      <p>
        <input value="Guardar" type="submit">
        <input value="Borrar" type="reset">
      </p>
    </form>
    <a href="index.php">Volver al inicio.</a>
  </body>
</html>
