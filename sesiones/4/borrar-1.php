<?php
session_start();
?>
<html>
  <head>
    <meta charset="UTF-8"/>
    <title>Irene</title>
  </head>
  <body>
    <form action="borrar-2.php" method="post">
      <p>Marque los datos a borrar:</p>
      <table>
        <tbody>
          <?php foreach ($_SESSION as $key => $value) {
            echo "<tr><td><input name='c[$key]' value='$value' type='checkbox'></td><td>$key: $value</td></tr>";
          }?>
        </tbody>
      </table>
      <p>
        <input value="Borrar" type="submit">
        <input value="Desmarcar casillas" type="reset">
      </p>
    </form>
    <a href="index.php">Volver al inicio.</a>
  </body>
</html>
