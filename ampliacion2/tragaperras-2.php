<?php
/**
 * Minijuegos: Tragaperras (2) - tragaperras-2.php
 *
 * @author    Irene
 *
 */
 session_name("tragaperras-2");
 session_start();
 // Valores iniciales variables sesión
 if (!isset($_SESSION["monedas"])) $_SESSION["monedas"] = 0;
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <title>Tragaperras (2). Minijuegos. Irene</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="style.css" rel="stylesheet" type="text/css" title="Color" />
</head>
<body>
  <h1>Tragaperras (2)</h1>
  <?php
  $simbolosNumero = 8;   // Número de frutas
  // Se genera una combinación nueva
  $fruta1 = rand(1, $simbolosNumero);
  $fruta2 = rand(1, $simbolosNumero);
  $fruta3 = rand(1, $simbolosNumero);
  ?>
  <form action="tragaperras-2-2.php" method="post">
    <table>
      <tbody>
        <tr>
          <!--Se muestran las tres imágenes de la combinación actual-->
          <td class="img"><img src="img/frutas/<?php print $fruta1 ?>.svg" alt="Imagen" /></td>
          <td class="img"><img src="img/frutas/<?php print $fruta2 ?>.svg" alt="Imagen" /></td>
          <td class="img"><img src="img/frutas/<?php print $fruta3 ?>.svg" alt="Imagen" /></td>
          <td class="marcador"><button type="submit" name="accion" value="moneda">Meter moneda</button><p style="margin: 0;"><?php print $_SESSION["monedas"] ?></p></td>
        </tr>
      </tbody>
    </table>
  </form>
  <footer>
    <p>Irene</p>
  </footer>
</body>
</html>
