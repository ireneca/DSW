<?php
session_start();
require_once 'conectar.php';
$pdo=conectar();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Irene</title>
</head>
<body>
<?php
  if (isset($_SESSION['name'])){
    $sql = "select * from autos";
    $resultado = $pdo->query($sql);
    $numfilas= $resultado->rowCount();
    echo "<h2>Automoviles</h2>";
    if ( isset($_SESSION['success']) ) {
      echo('<p style="color: green;">'.htmlentities($_SESSION['success'])."</p>\n");
      unset($_SESSION['success']);
    }
    if ($numfilas) {
      echo "<table border='1'>
        <tr><th>Marca</th><th>Modelo</th><th>Año</th><th>Kilometros</th><th></th></tr>";
      while ( $row = $resultado->fetch(PDO::FETCH_ASSOC) ) {
        echo "<tr><td>";
        echo $row['make'];
        echo "</td><td>";
        echo $row['model'];
        echo "</td><td>";
        echo $row['year'];
        echo "</td><td>";
        echo $row['mileage'];
        echo "</td><td>";
        echo "<a href='edit.php?id=".$row['auto_id']."'>Editar</a>";
        echo " / ";
        echo "<a href='del.php?id=".$row['auto_id']."'>Eliminar</a>";
        echo "</td></tr>";
      }
      echo "</table>";
    }?>
    </br>
    <a href='add.php'>Añadir automovil</a>
    </br>
    <a href='logout.php'>Cerrar sesión</a>
  <?php }
  else {
    die("No estas logueado");
  }
?>
</body>
</html>
<?php
$pdo=null;
?>
