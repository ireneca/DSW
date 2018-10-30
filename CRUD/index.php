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
      $where = "";
      if(isset($_POST['buscar'])){
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
        $execute = [];
        if ($marca != "") {
          $where = " WHERE make LIKE CONCAT('%',:marca,'%')";
          $execute[':marca']=$marca;
        }
        if ($modelo != ""){
          if ($where == "") $where = " WHERE model LIKE CONCAT('%',:model,'%')";
          else $where .= " AND model LIKE CONCAT('%',:model,'%')";
          $execute[':model']=$modelo;
        }
        if ($ano != ""){
          if ($where == "") $where = " WHERE year LIKE CONCAT('%',:ano,'%')";
          else $where .= " AND year LIKE CONCAT('%',:ano,'%')";
          $execute[':ano']=$ano;
        }
        if ($kilometros != ""){
          if ($where == "") $where = " WHERE mileage LIKE CONCAT('%',:kilometros,'%')";
          else $where .= " AND mileage LIKE CONCAT('%',:kilometros,'%')";
          $execute[':kilometros']=$kilometros;
        }
        if($where != ""){
          $sql = "SELECT * FROM autos ".$where;
          $resultado = $pdo->prepare($sql);
          $resultado->execute($execute);
        }
      }
      if($where == ""){
        $sql = "SELECT * FROM autos ";
        $resultado = $pdo->query($sql);
      }
      $numfilas= $resultado->rowCount();
      echo "<h2>Automoviles</h2>";
      if ( isset($_SESSION['error']) ) {
        echo('<p style="color: red;">'.htmlentities($_SESSION['error'])."</p>\n");
        unset($_SESSION['error']);
      }
      if ( isset($_SESSION['success']) ) {
        echo('<p style="color: green;">'.htmlentities($_SESSION['success'])."</p>\n");
        unset($_SESSION['success']);
      }
      ?>
      <form method="post">
        <input type="text" name="marca" placeholder="Marca">
        <input type="text" name="modelo" placeholder="Modelo">
        <input type="text" name="ano" placeholder="Año">
        <input type="text" name="kilometros" placeholder="Kilometros">
        <input type="submit" value="Buscar" name="buscar"/>
      </form>
      </br>
      <?php
      echo "<table border='1'>
        <tr><th>Marca</th><th>Modelo</th><th>Año</th><th>Kilometros</th><th>Accion</th></tr>";
      if ($numfilas) {
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
      }
      else echo "<tr><th colspan='5'>No se encontraron filas</th></tr>";
      echo "</table>";?>
      </br>
      <a href='add.php'>Añadir automovil</a>
      </br>
      <a href='logout.php'>Cerrar sesión</a>
    <?php }
    else {
      ?>
      <h1>PDO: conexión, inserción, modificación y borrado con POST-Redirect-GET-Flash</h1>
      <a href="login2.php">Por favor iniciar sesión</a>
      <?php
    }
  ?>
  </body>
  </html>
  <?php
  $pdo=null;
  ?>
