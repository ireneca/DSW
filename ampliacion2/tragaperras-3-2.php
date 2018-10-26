<?php
/**
 * Minijuegos: Tragaperras (3) - tragaperras-3-2.php
 *
 * @author    Irene
 *
 */
 session_name("tragaperras-3");
 session_start();
if(isset($_POST['accion'])){
   // Si se ha insertado moneda, se aumenta la cantidad de monedas
  if ($_POST['accion'] == "moneda") {
      $_SESSION["monedas"] += 1;
  }
  if ($_POST['accion'] == "jugar" && $_SESSION["monedas"] > 0) {
      $simbolosNumero = 8;   // Número de frutas
      // Se genera una combinación nueva
      $_SESSION["fruta1"] = rand(1, $simbolosNumero);
      $_SESSION["fruta2"] = rand(1, $simbolosNumero);
      $_SESSION["fruta3"] = rand(1, $simbolosNumero);
      $_SESSION["monedas"] -= 1;
  }
  header("Location: tragaperras-3.php");
  return;
}
?>
