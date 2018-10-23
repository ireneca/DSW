<?php
session_start();
if (!isset($_SESSION['numero']))$_SESSION['numero'] = 0;
$numero=$_SESSION['numero'];
?>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Irene</title>
    </head>
    <body>
    <form action="numero.php" method="post">
      <p>Haga clic en los botones para modificar el valor:</p>
      <p>
        <input type="submit" name="accion" value="-" style="font-size: 4rem">
        <span style="font-size: 4rem"><?php echo $numero ?></span>
        <input type="submit" name="accion" value="+" style="font-size: 4rem">
      </p>
      <p><input type="submit" name="accion" value="Poner a cero"></p>
    </form>
    </body>
</html>
