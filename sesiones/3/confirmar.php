<?php
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Irene</title>
    </head>
    <body>
    <?php if (isset($_POST['apellidos']) && trim($_POST['apellidos'])!=""){
      $_SESSION['apellidos'] = $_POST['apellidos'];
      $nombre = $_SESSION['nombre'];
      $apellidos = $_SESSION['apellidos'];?>
      <p>Su nombre y apellidos son: <?php echo $nombre." ".$apellidos ?></p>
      <form action="fin.php" method="post">
        <p>¿Es correcto?
          <input name="correcto" value="Sí" type="submit">
          <input name="correcto" value="No" type="submit">
        </p>
      </form>
    <?php } else {
      echo "<p>No ha escrito su nombre.</p>";
    }?>
      <a href="index.php">Volver a la primera página.</a>
    </body>
</html>
