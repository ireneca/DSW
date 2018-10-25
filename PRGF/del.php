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
    if (isset($_POST['cancelar'])){
      header("Location: view.php");
      return;
    }
    if ( isset($_POST['eliminar'])) {
      $sql = "DELETE FROM autos WHERE auto_id = :id";
      $stmt = $pdo->prepare($sql);
      $stmt->execute(array(':id' => $_GET['id']));
      $_SESSION['success'] = "Registro borrado";
      header("Location: view.php");
      return;
    }
    ?>
    <h2>Eliminar automovil</h2>
    <h4>Confirmación</h4>
    <form method="post">
      <input type="submit" value="Eliminar" name="eliminar"/>&nbsp;&nbsp;&nbsp;
      <input type="submit" value="Cancelar" name="cancelar"/>
    </form>
    <?php
  }
  else {
    die("No estas logueado");
  }
?>
</body>
</html>
<?php
$pdo=null;
?>
