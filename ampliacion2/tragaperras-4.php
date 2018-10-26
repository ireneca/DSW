<?php
/**
 * Minijuegos: Tragaperras (4) - tragaperras-4.php
 *
 * @author    Irene
 *
 */
 session_name("tragaperras-4");
 session_start();
 // Valores iniciales variables sesión
 if (!isset($_SESSION["monedas"]) || !isset($_SESSION["fruta1"]) || !isset($_SESSION["fruta2"]) || !isset($_SESSION["fruta3"]) || !isset($_SESSION["cara"]) || !isset($_SESSION["premio"])) {
   $_SESSION["monedas"] = 0;
   $simbolosNumero = 8;   // Número de frutas
   // Se genera una combinación nueva
   $_SESSION["fruta1"] = rand(1, $simbolosNumero);
   $_SESSION["fruta2"] = rand(1, $simbolosNumero);
   $_SESSION["fruta3"] = rand(1, $simbolosNumero);
   $_SESSION["cara"] = "plain";
   $_SESSION["premio"] = 0;
 }
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <title>Tragaperras (4). Minijuegos. Irene</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="style.css" rel="stylesheet" type="text/css" title="Color" />
</head>
<body>
  <h1>Tragaperras (4)</h1>
  <form action="tragaperras-4-2.php" method="post">
    <table>
      <tbody>
        <tr>
          <!--Se muestran las tres imágenes de la combinación actual-->
          <td class="img"><img src="img/frutas/<?php print $_SESSION["fruta1"] ?>.svg" alt="Imagen" /></td>
          <td class="img"><img src="img/frutas/<?php print $_SESSION["fruta2"] ?>.svg" alt="Imagen" /></td>
          <td class="img"><img src="img/frutas/<?php print $_SESSION["fruta3"] ?>.svg" alt="Imagen" /></td>
          <td class="marcador">
            <button type="submit" name="accion" value="moneda">Meter moneda</button>
            <p style="margin: 0;"><?php print $_SESSION["monedas"] ?></p>
            <button type="submit" name="accion" value="jugar">Jugar</button>
            <p style="margin: 1px;"><img src="img/face-<?php print $_SESSION["cara"] ?>.svg" alt="Mal" height="50"><?php print $_SESSION["premio"] ?></p>
          </td>
        </tr>
      </tbody>
    </table>
  </form>
  <footer>
    <p>Irene</p>
  </footer>
</body>
</html>
