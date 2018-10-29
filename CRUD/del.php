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
      header("Location: index.php");
      return;
    }
    if ( isset($_POST['eliminar'])) {
      $sql = "DELETE FROM autos WHERE auto_id = :id";
      $stmt = $pdo->prepare($sql);
      $stmt->execute(array(':id' => $_POST['id']));
      $_SESSION['success'] = "Registro borrado";
      header("Location: index.php");
      return;
    }
    $stmt2 = $pdo->prepare("SELECT auto_id,make,model FROM autos where auto_id = :id");
    $stmt2->execute(array(":id" => $_GET['id']));
    $row = $stmt2->fetch(PDO::FETCH_ASSOC);
    if ( $row === false ) {
      $_SESSION['error'] = 'Valor incorrecto para id';
      header( 'Location: index.php' ) ;
      return;
    }
    ?>
    <h2>Eliminar automovil</h2>
    <h4>Confirmación eliminar <?php echo $row['make']." -> ".$row['model'] ?></h4>
    <form method="post">
      <input type="hidden" name="id" value="<?php echo $row['auto_id'] ?>">
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
