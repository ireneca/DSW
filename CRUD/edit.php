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
    if (isset($_POST['editar'])) {
      function test_input($data) {
        $data = trim($data);//Elimina espacio en blanco (u otro tipo de caracteres) del inicio y el final de la cadena
        $data = stripslashes($data);//Devuelve un string con las barras invertidas retiradas. (\' se convierte en ') Barras invertidas dobles pasa a sencilla
        $data = strip_tags($data);//Retira las etiquetas HTML y PHP de un string
        $data = htmlspecialchars($data);//Convierte caracteres especiales en entidades HTML
        return $data;
      }
      $id = test_input($_POST['id']);
      $marca = test_input($_POST['marca']);
      $modelo = test_input($_POST['modelo']);
      $ano = test_input($_POST['ano']);
      $kilometros = test_input($_POST['kilometros']);
      if (is_numeric($kilometros) && is_numeric($ano)){
        if ($marca == "" || $modelo == "") {
          $_SESSION['error'] = "El campo marca y modelo son obligatorios";
          header("Location: edit.php?id=".$id);
          return;
        }
        else {
          $sql = "UPDATE autos SET make=:marca, model=:model, year=:ano, mileage=:kilometros WHERE auto_id=:id";
          $stmt = $pdo->prepare($sql);
          $stmt->execute(array(
            ':id' => $id,
            ':marca' => $marca,
            ':model' => $modelo,
            ':ano' => $ano,
            ':kilometros' => $kilometros
          ));
          $_SESSION['success'] = "Registro editado";
          header("Location: index.php");
          return;
        }
      }
      else {
        $_SESSION['error'] = "Kilometraje y año son obligatorios y deben ser numéricos";
        header("Location: edit.php?id=".$id);
        return;
      }
    }
    $sql = "SELECT * FROM autos WHERE auto_id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(':id' => $_GET['id']));
    $dato = $stmt->fetch(PDO::FETCH_ASSOC);
    if ( $dato === false ) {
      $_SESSION['error'] = 'Valor incorrecto para id';
      header( 'Location: index.php' ) ;
      return;
    }
    ?>
    <h2>Editar automovil</h2>
    <?php
    if ( isset($_SESSION['error']) ) {
      echo('<p style="color: red;">'.htmlentities($_SESSION['error'])."</p>\n");
      unset($_SESSION['error']);
    }
    ?>
    <form method="post">
      <input type="hidden" name="id" value="<?php echo $dato['auto_id'] ?>">
      Marca:<input type="text" name="marca" value="<?php echo $dato['make']; ?>">
      </br></br>
      Modelo:<input type="text" name="modelo" value="<?php echo $dato['model']; ?>">
      </br></br>
      Año:<input type="text" name="ano" value="<?php echo $dato['year']; ?>">
      </br></br>
      Kilometros:<input type="text" name="kilometros" value="<?php echo $dato['mileage']; ?>">
      </br></br>
      <input type="submit" value="Editar" name="editar"/>&nbsp;&nbsp;&nbsp;
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
