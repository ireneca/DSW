<?php
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
  if (isset($_GET["name"])){
    if (isset($_POST['salir'])){
      header("Location: index.php");
    }
    if ( isset($_POST['anadir'])) {
      function test_input($data) {
        $data = trim($data);//Elimina espacio en blanco (u otro tipo de caracteres) del inicio y el final de la cadena
        $data = stripslashes($data);//Devuelve un string con las barras invertidas retiradas. (\' se convierte en ') Barras invertidas dobles pasa a sencilla
        $data = strip_tags($data);//Retira las etiquetas HTML y PHP de un string
        $data = htmlspecialchars($data);//Convierte caracteres especiales en entidades HTML
        return $data;
      }
      $marca = test_input($_POST['marca']);
      $ano = test_input($_POST['ano']);
      $kilometros = test_input($_POST['kilometros']);
      if (is_numeric($kilometros) && is_numeric($ano)){
        if ($marca == "") echo "<p style='color:red;'>El campo marca es obligatorio</p>";
        else {
          $sql = "INSERT INTO autos(make,year,mileage) VALUES (:marca, :ano, :kilometros)";
          $stmt = $pdo->prepare($sql);
          $stmt->execute(array(
            ':marca' => $marca,
            ':ano' => $ano,
            ':kilometros' => $kilometros
          ));
          echo "<p style='color:green;'>Registro insertado</p>";
        }
      }
      else {
        echo "<p style='color:red;'>Kilometraje y año deben ser numéricos</p>";
      }
    }
    if ( isset($_POST['eliminar'])) {
      $sql = "DELETE FROM autos WHERE auto_id = :id";
      $stmt = $pdo->prepare($sql);
      $stmt->execute(array(':id' => $_POST['id']));
      echo "<p style='color:green;'>Registro borrado</p>";
    }
?>
    <form method="post">
      Marca:<input type="text" name="marca">
      Año:<input type="text" name="ano">
      Kilometros:<input type="text" name="kilometros">
      <input type="submit" value="Añadir" name="anadir"/>
      <input type="submit" value="Cerrar sesión" name="salir"/>
    </form>
    </br>
<?php
    $sql = "select * from autos";
    $resultado = $pdo->query($sql);
    $numfilas= $resultado->rowCount();
    if ($numfilas) {
      echo "<table border='1'>
        <tr><th>Marca</th><th>Año</th><th>Kilometros</th><th></th></tr>";
      while ( $row = $resultado->fetch(PDO::FETCH_ASSOC) ) {
        echo "<tr><td>";
        echo $row['make'];
        echo "</td><td>";
        echo $row['year'];
        echo "</td><td>";
        echo $row['mileage'];
        echo "</td><td>";
        echo('<form method="post"><input type="hidden" ');
        echo('name="id" value="'.$row['auto_id'].'">'."\n");
        echo('<input type="submit" value="Eliminar" name="eliminar">');
        echo("</form>");
        echo("</td></tr>\n");
      }
      echo "</table>";
    }
  }
  else {
    die ("Falta el nombre del parámetro");
  }
?>
</body>
</html>
<?php
$pdo=null;
?>
