<?php
/**
 * Minijuegos: Tragaperras (2) - tragaperras-2-2.php
 *
 * @author    Irene
 *
 */
 session_name("tragaperras-2");
 session_start();
if(isset($_POST['accion'])){
   // Si se ha insertado moneda, se aumenta la cantidad de monedas
  if ($_POST['accion'] == "moneda") {
      $_SESSION["monedas"] += 1;
      header("Location: tragaperras-2.php");
      return;
  }
}
?>
