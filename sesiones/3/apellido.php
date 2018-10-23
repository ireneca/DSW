<?php
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Irene</title>
    </head>
    <body>
    <?php if (isset($_POST['nombre']) && trim($_POST['nombre'])!=""){
      $_SESSION['nombre'] = $_POST['nombre'];
      $nombre = $_SESSION['nombre'];?>
      <p>Su nombre es: <?php echo $nombre ?></p>
      <form action="confirmar.php" method="post">
        <p>Escriba sus apellidos:</p>
        <p><strong>Apellidos:</strong> <input name="apellidos" size="20" maxlength="20" type="text"></p>
        <p><input value="Siguiente" type="submit"><input value="Borrar" type="reset"></p>
      </form>
    <?php } else {
      echo "<p>No ha escrito su nombre.</p>";
    }?>
      <a href="index.php">Volver a la primera página.</a>
    </body>
</html>
