<?php
/**
 * Minijuegos: Tragaperras (1) - tragaperras-1.php
 *
 * @author    Irene
 *
 */
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <title>Tragaperras (1). Minijuegos. Irene</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="style.css" rel="stylesheet" type="text/css" title="Color" />
</head>
<body>
  <h1>Tragaperras (1)</h1>
  <?php
  $simbolosNumero = 8;   // Número de frutas
  // Se genera una combinación nueva
  $fruta1 = rand(1, $simbolosNumero);
  $fruta2 = rand(1, $simbolosNumero);
  $fruta3 = rand(1, $simbolosNumero);
  ?>
  <table>
    <tbody>
      <tr>
        <!--Se muestran las tres imágenes de la combinación actual-->
        <td class="img"><img src="img/frutas/<?php print $fruta1 ?>.svg" alt="Imagen" /></td>
        <td class="img"><img src="img/frutas/<?php print $fruta2 ?>.svg" alt="Imagen" /></td>
        <td class="img"><img src="img/frutas/<?php print $fruta3 ?>.svg" alt="Imagen" /></td>
      </tr>
    </tbody>
  </table>
  <footer>
    <p>Irene</p>
  </footer>
</body>
</html>
