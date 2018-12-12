<?php
require_once("../core/configAPP.php");
class mainModel{
  public function cargaModelo ($modelo) {
      // Carga el modelo
      require_once "../modelos/" . $modelo . ".php";
      //Instanciamos el modelo y lo devuelve
      return new $modelo();
  }

  public function cargaVista ($vista, $datos=[]) {
      // Si el fichero existe lo carga, en caso contrario informa del error y muere
      if (file_exists("../vistas/paginas/" . $vista . ".php") && $vista!="404") {
        require_once "../vistas/paginas/" . $vista . ".php";
      }
      elseif ($vista=="index") {
        require_once "../vistas/paginas/login.php";
      }
      else {
        require_once "../vistas/paginas/404.php";
      }
  }
  //encrptamos y desencriptados la cadena de entrada
  public static function encryption($string){
    $output=FALSE;
    $key=hash('sha256', SECRET_KEY);
    $iv=substr(hash('sha256', SECRET_IV), 0, 16);
    $output=openssl_encrypt($string, METHOD, $key, 0, $iv);
    $output=base64_encode($output);
    return $output;
  }
  protected static function decryption($string){
    $key=hash('sha256', SECRET_KEY);
    $iv=substr(hash('sha256', SECRET_IV), 0, 16);
    $output=openssl_decrypt(base64_decode($string), METHOD, $key, 0, $iv);
    return $output;
  }
  //generamos codigo aleatorio con la letra inicial que pongamos, la longitud especificada y un numero correlativo
  protected function generar_codigo_aleatorio($letra,$longitud,$num){
    for ($i=1; $i <= $longitud; $i++) {
      $numero = rand(0,9);
      $letra.=$numero;
    }
    return $letra.$num;
  }
  //limpiamos la cadena para evitar inyecciones
  protected function limpiar_cadena($cadena){
    $cadena = trim($cadena);//Elimina espacio en blanco (u otro tipo de caracteres) del inicio y el final de la cadena
    $cadena = stripslashes($cadena);//Devuelve un string con las barras invertidas retiradas. (\' se convierte en ') Barras invertidas dobles pasa a sencilla
    $cadena = strip_tags($cadena);//Retira las etiquetas HTML y PHP de un string
    $cadena = str_ireplace("<script>","",$cadena);//buscamos y quitamos las etiquetas script
    $cadena = str_ireplace("</script>","",$cadena);
    $cadena = htmlspecialchars($cadena);//Convierte caracteres especiales en entidades HTML
    return $cadena;
  }
}
