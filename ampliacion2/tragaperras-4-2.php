<?php
/**
 * Minijuegos: Tragaperras (4) - tragaperras-4-2.php
 *
 * @author    Irene
 *
 */
 session_name("tragaperras-4");
 session_start();
if(isset($_POST['accion'])){
   // Si se ha insertado moneda, se aumenta la cantidad de monedas
  if ($_POST['accion'] == "moneda") {
      $_SESSION["monedas"] += 1;
  }
  if ($_POST['accion'] == "jugar" && $_SESSION["monedas"] > 0) {
      $_SESSION["premio"]=0;
      $simbolosNumero = 8;   // Número de frutas
      // Se genera una combinación nueva
      $_SESSION["fruta1"] = rand(1, $simbolosNumero);
      $_SESSION["fruta2"] = rand(1, $simbolosNumero);
      $_SESSION["fruta3"] = rand(1, $simbolosNumero);
      // Se comprueba cuál es el premio
      $cereza = 1;   // Número de imagen de la cereza (1.svg)

      if ($_SESSION["fruta1"]==$_SESSION["fruta2"] && $_SESSION["fruta2"]==$_SESSION["fruta3"]) {
        // Si salen tres cerezas, se ganan diez monedas.
        if ($_SESSION["fruta1"]==$cereza)$_SESSION["premio"] = 10;
        // Si salen tres frutas iguales que no sean cerezas, se ganan cinco monedas.
        else $_SESSION["premio"] = 5;
      }
      //Si salen dos cerezas, se ganan cuatro monedas.
      elseif ($_SESSION["fruta1"] == $cereza && $_SESSION["fruta2"] == $cereza || $_SESSION["fruta1"] == $cereza && $_SESSION["fruta3"] == $cereza || $_SESSION["fruta2"] == $cereza && $_SESSION["fruta3"] == $cereza) {
        $_SESSION["premio"] = 4;
      }
      else{
        //Si sale una cereza, se gana una moneda
        if ($_SESSION["fruta1"]==$cereza || $_SESSION["fruta2"]==$cereza || $_SESSION["fruta3"]==$cereza) $_SESSION["premio"] = 1;
        if ($_SESSION["fruta1"] == $_SESSION["fruta2"] || $_SESSION["fruta1"] == $_SESSION["fruta3"] || $_SESSION["fruta2"] == $_SESSION["fruta3"]){
          //Si salen dos frutas iguales que no sean cerezas, se ganan dos monedas.
          //Si sale una cereza y dos frutas iguales, se ganan tres monedas.
          $_SESSION["premio"] += 2;
        }
        // En el resto de casos, se pierde una moneda
        if ($_SESSION["premio"] == 0) {
          $_SESSION["premio"] = -1;
        }
      }
      
      // Se añade el premio a las monedas
      $_SESSION["monedas"] += $_SESSION["premio"];
      // Se elige la cara a mostrar
      if ($_SESSION["premio"] > 0) {
          $_SESSION["cara"] = "smile";
      } else {
          $_SESSION["cara"] = "sad";
      }
  }
  header("Location: tragaperras-4.php");
  return;
}
?>
