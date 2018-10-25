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
    if (isset($_POST['anadir'])) {
      function test_input($data) {
        $data = trim($data);//Elimina espacio en blanco (u otro tipo de caracteres) del inicio y el final de la cadena
        $data = stripslashes($data);//Devuelve un string con las barras invertidas retiradas. (\' se convierte en ') Barras invertidas dobles pasa a sencilla
        $data = strip_tags($data);//Retira las etiquetas HTML y PHP de un string
        $data = htmlspecialchars($data);//Convierte caracteres especiales en entidades HTML
        return $data;
      }
      $marca = test_input($_POST['marca']);
      $modelo = test_input($_POST['modelo']);
      $ano = test_input($_POST['ano']);
      $kilometros = test_input($_POST['kilometros']);
      if (is_numeric($kilometros) && is_numeric($ano)){
        if ($marca == "" && $modelo == "") {
          $_SESSION['error'] = "El campo marca y modelo son obligatorios";
          header("Location: add.php");
          return;
        }
        else {
          $sql = "INSERT INTO autos(make,model,year,mileage) VALUES (:marca, :model, :ano, :kilometros)";
          $stmt = $pdo->prepare($sql);
          $stmt->execute(array(
            ':marca' => $marca,
            ':model' => $modelo,
            ':ano' => $ano,
            ':kilometros' => $kilometros
          ));
          $_SESSION['success'] = "Registro insertado";
          header("Location: view.php");
          return;
        }
      }
      else {
        $_SESSION['error'] = "Kilometraje y año deben ser numéricos";
        header("Location: add.php");
        return;
      }
    }
    ?>
    <h2>Añadir automovil</h2>
    <?php
    if ( isset($_SESSION['error']) ) {
      echo('<p style="color: red;">'.htmlentities($_SESSION['error'])."</p>\n");
      unset($_SESSION['error']);
    }
    ?>
    <form method="post">
      Marca:<input type="text" name="marca">
      </br></br>
      Modelo:<input type="text" name="modelo">
      </br></br>
      Año:<input type="text" name="ano">
      </br></br>
      Kilometros:<input type="text" name="kilometros">
      </br></br>
      <input type="submit" value="Añadir" name="anadir"/>&nbsp;&nbsp;&nbsp;
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
